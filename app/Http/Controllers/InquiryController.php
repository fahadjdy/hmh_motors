<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->headers->set('Accept', 'application/json');

        // Server-side validation
        $validated = $request->validate([
            'name' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'mobile' => ['required', 'digits:10'],
            'description' => ['required', 'string', 'max:500'],
        ]);

        // Save to DB
        Inquiry::create([
            'name'        => $validated['name'],
            'email'       => $validated['email'],
            'mobile'      => $validated['mobile'],
            'description' => $validated['description'],
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Your inquiry has been submitted successfully!',
        ]);
    }
}
