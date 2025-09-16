// Mobile Navigation Toggle
const hamburger = document.querySelector(".hamburger")
const navMenu = document.querySelector(".nav-menu")

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active")
  navMenu.classList.toggle("active")
})

// Close mobile menu when clicking on a link
document.querySelectorAll(".nav-link").forEach((n) =>
  n.addEventListener("click", () => {
    hamburger.classList.remove("active")
    navMenu.classList.remove("active")
  }),
)

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      })
    }
  })
})

// Generate product cards
// Generate product cards with pagination
function generateProductCards(page = 1) {
  const productsGrid = document.querySelector(".products-grid")
  productsGrid.innerHTML = ""

  // ✅ Use products from backend
  const products = window.products || []

  if (products.length === 0) {
    productsGrid.innerHTML = `
      <div class="no-products">
        <p>No products found</p>
      </div>
    `
    // Clear pagination if no products
    document.querySelector(".pagination").innerHTML = ""
    return
  }

  const perPage = 6
  const totalPages = Math.ceil(products.length / perPage)

  const start = (page - 1) * perPage
  const end = start + perPage
  const currentProducts = products.slice(start, end)

  currentProducts.forEach((product) => {
    const productCard = document.createElement("div")
    productCard.className = "product-card"
    productCard.innerHTML = `
      <div class="product-image">
          <img loading="lazy" src="${window.location.origin}/storage/${product.primary_image}" alt="${product.name}">
      </div>
      <div class="product-info">
          <h3>${product.name}</h3>
          <p class="product-category">${product.category?.name ?? "Uncategorized"}</p>
          <div class="product-actions">
              <button class="whatsapp-btn">
                  <i class="fab fa-whatsapp"></i>
                  WhatsApp
              </button>
              <button class="call-btn">
                  <i class="fas fa-phone"></i>
                  Call Now
              </button>
          </div>
      </div>
    `
    productsGrid.appendChild(productCard)
  })

  generatePagination(totalPages, page)
}


// Dynamic pagination
function generatePagination(totalPages, currentPage) {
  const pagination = document.querySelector(".pagination")
  pagination.innerHTML = ""

  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button")
    btn.className = "page-btn"
    btn.textContent = i
    if (i === currentPage) btn.classList.add("active")

    btn.addEventListener("click", () => {
      generateProductCards(i)

       // 👇 Scroll to products section
      document.querySelector(".products").scrollIntoView({
        behavior: "smooth",
        block: "start"
      })
    })

    pagination.appendChild(btn)
  }

  // Add next button
  if (currentPage < totalPages) {
    const nextBtn = document.createElement("button")
    nextBtn.className = "page-btn"
    nextBtn.textContent = "Next"
    nextBtn.addEventListener("click", () => {
      generateProductCards(currentPage + 1)
       // 👇 Scroll to products section
      document.querySelector(".products").scrollIntoView({
        behavior: "smooth",
        block: "start"
      })
    })
    pagination.appendChild(nextBtn)
  }
}

// Initialize products when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  generateProductCards(1)
})



// Initialize products when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  generateProductCards()
})

// Contact form submission
document.querySelector(".contact-form form").addEventListener("submit", function (e) {
  e.preventDefault()
  alert("Thank you for your message! We will get back to you soon.")
  this.reset()
})

// Newsletter subscription
document.querySelector(".subscribe-form").addEventListener("submit", function (e) {
  e.preventDefault()
  alert("Thank you for subscribing to our newsletter!")
  this.reset()
})

// Add scroll effect to navbar
window.addEventListener("scroll", () => {
  const navbar = document.querySelector(".navbar")
  if (window.scrollY > 100) {
    navbar.style.background = "rgba(255, 241, 202, 0.95)"
    navbar.style.backdropFilter = "blur(10px)"
  } else {
    navbar.style.background = "linear-gradient(135deg, var(--light) 0%, rgba(255, 241, 202, 0.8) 100%)"
    navbar.style.backdropFilter = "none"
  }
})



 // Testimonials Swiper
        var testimonialSwiper = new Swiper(".testimonial-slider", {
            loop: true,
            grabCursor: true,
            spaceBetween: 30,
            centeredSlides: true,
            slidesPerView: 'auto',
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                }
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
