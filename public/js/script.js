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
          <span>${product.code}</span>
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
// Utility function to strip HTML tags
function stripTags(input) {
  let div = document.createElement("div")
  div.innerHTML = input
  return div.textContent || div.innerText || ""
}

// Show error under field
function showError(field, message) {
  let errorEl = field.nextElementSibling
  if (errorEl && errorEl.classList.contains("error")) {
    errorEl.innerText = message
    errorEl.style.display = "block"
  }
  field.classList.add("error-input")
  field.focus()
}

// Clear errors
function clearError(field) {
  let errorEl = field.nextElementSibling
  if (errorEl && errorEl.classList.contains("error")) {
    errorEl.innerText = ""
    errorEl.style.display = "none"
  }
  field.classList.remove("error-input")
}

document.querySelector(".contact-form form").addEventListener("submit", function (e) {
  e.preventDefault()

  let form = this
  let nameField = form.querySelector('input[type="text"]')
  let emailField = form.querySelector('input[type="email"]')
  let phoneField = form.querySelector('input[type="tel"]')
  let messageField = form.querySelector("textarea")

  let name = stripTags(nameField.value.trim())
  let email = stripTags(emailField.value.trim())
  let phone = stripTags(phoneField.value.trim())
  let message = stripTags(messageField.value.trim())

  // Clear old errors
  ;[nameField, emailField, phoneField, messageField].forEach(clearError)

  // === Frontend Validation ===
  if (!/^[A-Za-z\s]{1,50}$/.test(name)) {
    showError(nameField, "Name must contain only letters and spaces (max 50 chars).")
    return
  }

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) || email.length > 50) {
    showError(emailField, "Enter a valid email address (max 50 chars).")
    return
  }

  phone = phone.replace(/\D/g, "") // remove non-digits
  phone = phone.replace(/^(91|0)/, "") // remove +91 or 0 at start
  if (!/^\d{10}$/.test(phone)) {
    showError(phoneField, "Phone number must be exactly 10 digits.")
    return
  }

  if (message.length < 1 || message.length > 500) {
    showError(messageField, "Message must be between 1 and 500 characters.")
    return
  }

  // === Submit to backend ===
  let formData = new FormData(form)

  fetch(location.origin + "/inquiry", {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
    },
    body: formData
  })
    .then(async res => {
      if (!res.ok) {
        // Handle Laravel validation errors (422)
        if (res.status === 422) {
          let errorData = await res.json()
          let errors = errorData.errors

          if (errors.name) showError(nameField, errors.name[0])
          if (errors.email) showError(emailField, errors.email[0])
          if (errors.mobile) showError(phoneField, errors.mobile[0])
          if (errors.description) showError(messageField, errors.description[0])
        } else {
          alert("Something went wrong. Please try again.")
        }
        return
      }

      return res.json()
    })
    .then(data => {
      if (data && data.status === "success") {
        alert(data.message)
        form.reset()
      }
    })
    .catch(err => {
      console.error("Error:", err)
      alert("Server error. Please try again later.")
    })
})


// Handle paste events for phone: strip +91 or 0 automatically
document.querySelector('input[type="tel"]').addEventListener("paste", function (e) {
  e.preventDefault()
  let pasted = (e.clipboardData || window.clipboardData).getData("text")
  pasted = pasted.replace(/\D/g, "")
  pasted = pasted.replace(/^(91|0)/, "")
  this.value = pasted
})

// Newsletter subscription
document.querySelector(".subscribe-form").addEventListener("submit", function (e) {
  e.preventDefault()
  alert("Thank you for subscribing to our newsletter!")
  this.reset()
})

// Add scroll effect to navbar
// window.addEventListener("scroll", () => {
//   const navbar = document.querySelector(".navbar")
//   if (window.scrollY > 100) {
//     navbar.style.background = "var(--primary)"
//     navbar.style.backdropFilter = "blur(10px)"
//   } else {
//     navbar.style.background = "linear-gradient(135deg, var(--light) 0%, rgba(255, 241, 202, 0.8) 100%)"
//     navbar.style.backdropFilter = "none"
//   }
// })



 // Testimonials Swiper
       var testimonialSwiper = new Swiper(".testimonial-slider", {
          loop: true,
          loopedSlides: 1, // adjust based on number of slides you have
          grabCursor: true,
          spaceBetween: 30,
          centeredSlides: true,
          slidesPerView: 'auto',
          breakpoints: {
            320: { slidesPerView: 1, spaceBetween: 20 },
            768: { slidesPerView: 2, spaceBetween: 25 },
            1024: { slidesPerView: 2, spaceBetween: 30 },
          },
          autoplay: {
            delay: 2000,
            disableOnInteraction: false, // ensures autoplay continues after swipe
            // pauseOnMouseEnter: true, 
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });

