<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OptimizeImages extends Command
{
    protected $signature = 'images:optimize {--webp-quality=80}';

    protected $description = 'Resize oversized public images, recompress them in place, and generate WebP siblings';

    /**
     * Folders to process (relative to public/) with a max width for each.
     * Product/category images only ever render as small cards, so 600px is plenty.
     */
    private array $targets = [
        ['dir' => 'storage/products',   'max' => 600],
        ['dir' => 'storage/categories', 'max' => 600],
        ['dir' => 'storage/company',    'max' => 400],
        ['dir' => 'img/profile',        'max' => 900],
    ];

    public function handle(): int
    {
        if (! function_exists('imagecreatefrompng')) {
            $this->error('PHP GD extension is required.');
            return self::FAILURE;
        }

        $quality = (int) $this->option('webp-quality');
        $totalOrig = $totalPng = $totalWebp = $count = 0;

        foreach ($this->targets as $target) {
            $base = public_path($target['dir']);
            if (! is_dir($base)) {
                continue;
            }

            $files = array_merge(
                glob($base . '/*.png'),
                glob($base . '/*.jpg'),
                glob($base . '/*.jpeg'),
            );

            foreach ($files as $src) {
                $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
                $size = @getimagesize($src);
                if (! $size) {
                    continue;
                }
                [$w, $h] = $size;

                $img = $ext === 'png' ? @imagecreatefrompng($src) : @imagecreatefromjpeg($src);
                if (! $img) {
                    $this->warn('skip (unreadable): ' . basename($src));
                    continue;
                }

                $max = $target['max'];
                if ($w > $max) {
                    $nw = $max;
                    $nh = (int) round($h * $max / $w);
                    $dst = imagecreatetruecolor($nw, $nh);
                    imagealphablending($dst, false);
                    imagesavealpha($dst, true);
                    imagecopyresampled($dst, $img, 0, 0, 0, 0, $nw, $nh, $w, $h);
                } else {
                    $dst = $img;
                }

                $orig = filesize($src);

                // Overwrite the original as the optimised fallback.
                if ($ext === 'png') {
                    imagepng($dst, $src, 9);
                } else {
                    imagejpeg($dst, $src, 85);
                }
                clearstatcache(true, $src);
                $newSize = filesize($src);

                // WebP sibling (same name, .webp extension).
                $webp = preg_replace('/\.[^.]+$/', '.webp', $src);
                imagewebp($dst, $webp, $quality);
                $webpSize = filesize($webp);

                $totalOrig += $orig;
                $totalPng  += $newSize;
                $totalWebp += $webpSize;
                $count++;

                $this->line(sprintf(
                    '%-46s %6.0fKB  ->  %5.0fKB / webp %5.0fKB',
                    basename($src), $orig / 1024, $newSize / 1024, $webpSize / 1024
                ));
            }
        }

        $this->newLine();
        $this->info(sprintf(
            '%d images: %0.1fMB -> %0.1fMB (fallback) / %0.1fMB (webp)',
            $count, $totalOrig / 1048576, $totalPng / 1048576, $totalWebp / 1048576
        ));

        return self::SUCCESS;
    }
}
