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
function generateProductCards() {
  const productsGrid = document.querySelector(".products-grid")
  const products = [
    { name: "Premium Body Frame", price: "₹15,000", image: "autorikshaw body frame product" },
    { name: "Engine Mount Kit", price: "₹3,500", image: "autorikshaw engine mount" },
    { name: "LED Headlight Set", price: "₹2,800", image: "autorikshaw LED headlights" },
    { name: "Comfort Seat Set", price: "₹8,500", image: "autorikshaw passenger seats" },
    { name: "Dashboard Panel", price: "₹4,200", image: "autorikshaw dashboard" },
    { name: "Wheel Assembly", price: "₹6,800", image: "autorikshaw wheel set" },
    { name: "Side Mirror Set", price: "₹1,200", image: "autorikshaw side mirrors" },
    { name: "Brake System Kit", price: "₹5,500", image: "autorikshaw brake parts" },
    { name: "Suspension Kit", price: "₹7,200", image: "autorikshaw suspension" },
    { name: "Electrical Wiring", price: "₹2,100", image: "autorikshaw wiring harness" },
    { name: "Fuel Tank", price: "₹4,800", image: "autorikshaw fuel tank" },
    { name: "Exhaust System", price: "₹3,200", image: "autorikshaw exhaust pipe" },
  ]

  products.forEach((product) => {
    const productCard = document.createElement("div")
    productCard.className = "product-card"
    productCard.innerHTML = `
            <div class="product-image">
                <img src="/--product-image-.jpg" alt="${product.name}">
            </div>
            <div class="product-info">
                <h3>${product.name}</h3>
                <p class="product-price">${product.price}</p>
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
}

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

.product-price {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--secondary);
    margin-bottom: 1rem;
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
