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
  productsGrid.innerHTML = "" // clear old products

  const products = [
    { name: "Premium Body Frame", category: "Rikshaw" },
    { name: "Engine Mount Kit", category: "Rikshaw" },
    { name: "LED Headlight Set", category: "Rikshaw" },
    { name: "Comfort Seat Set", category: "Rikshaw" },
    { name: "Dashboard Panel", category: "Rikshaw" },
    { name: "Wheel Assembly", category: "Rikshaw" },
    { name: "Side Mirror Set", category: "Rikshaw" },
    { name: "Brake System Kit", category: "Rikshaw" },
    { name: "Suspension Kit", category: "Rikshaw" },
    { name: "Electrical Wiring", category: "Rikshaw" },
    { name: "Fuel Tank", category: "Rikshaw" },
    { name: "Exhaust System", category: "Rikshaw" },
  ]

  const perPage = 6
  const totalPages = Math.ceil(products.length / perPage)

  // slice products for current page
  const start = (page - 1) * perPage
  const end = start + perPage
  const currentProducts = products.slice(start, end)

  currentProducts.forEach((product) => {
    const productCard = document.createElement("div")
    productCard.className = "product-card"
    productCard.innerHTML = `
      <div class="product-image">
          <img src="assets/img/profile/rikshaw-mumbai.png" alt="${product.name}">
      </div>
      <div class="product-info">
          <h3>${product.name}</h3>
          <p class="product-category">${product.category}</p>
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


// Add product card styles
const productStyles = `
.product-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

.product-image {
    position: relative;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.1);
}

.product-info {
    padding: 1.5rem;
}

.product-info h3 {
    font-size: 1.2rem;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

.product-category {
    font-size: 12px;
    font-weight: 400;
    color: gray;
    border: 1px solid gray;
    display: inline-block;
    padding: 0.2rem 0.5rem;
    border-radius: 16px;
    border: 1px solid var(--secondary);
    margin-bottom: 1rem;
    background: var(--secondary);
    color: var(--primary);
}

.product-actions {
    display: flex;
    gap: 0.5rem;
}

.whatsapp-btn,
.call-btn {
    flex: 1;
    padding: 0.8rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.whatsapp-btn {
    background: #25D366;
    color: white;
}

.whatsapp-btn:hover {
    background: #128C7E;
}

.call-btn {
    background: var(--primary);
    color: white;
}

.call-btn:hover {
    background: var(--accent);
}
`

// Add styles to head
const styleSheet = document.createElement("style")
styleSheet.textContent = productStyles
document.head.appendChild(styleSheet)

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
