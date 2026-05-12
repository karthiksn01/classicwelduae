import './cart.js';

const BACKEND_URL = import.meta.env.VITE_API_URL || (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1' 
    ? `http://${window.location.hostname}:8000` 
    : '');
const API_BASE_URL = `${BACKEND_URL}/api`;

window.resolveImagePath = (path) => {
    if (!path) return 'https://placehold.co/600x400/222/orange?text=ClassicWeld';
    if (path.startsWith('http')) return path;
    if (path.startsWith('products/')) return `${BACKEND_URL}/storage/${path}`;
    return `${BACKEND_URL}/storage/products/${path}`;
};

// --- NEW: Wishlist State ---
window.userWishlist = [];

async function fetchWishlistIds() {
    try {
        const stored = localStorage.getItem('user_wishlist');
        if (stored) {
            window.userWishlist = JSON.parse(stored);
            updateWishlistIcons();
        }
    } catch (err) { console.error("Wishlist fetch error:", err); }
}

window.toggleWishlist = async (productId, event) => {
    if (event) {
        event.stopPropagation();
        event.preventDefault();
    }

    try {
        const id = parseInt(productId);
        if (window.userWishlist.includes(id)) {
            window.userWishlist = window.userWishlist.filter(item => item !== id);
            showToast("Removed from wishlist", "info");
        } else {
            window.userWishlist.push(id);
            showToast("Added to wishlist!", "success");
        }
        localStorage.setItem('user_wishlist', JSON.stringify(window.userWishlist));
        updateWishlistIcons();
    } catch (err) {
        console.error("Wishlist toggle error:", err);
        showToast("Failed to update wishlist", "error");
    }
};

function updateWishlistIcons() {
    document.querySelectorAll(`[data-wishlist-id]`).forEach(btn => {
        const id = parseInt(btn.getAttribute('data-wishlist-id'));
        const icon = btn.querySelector('i');
        if (window.userWishlist.includes(id)) {
            icon.className = 'ph-fill ph-heart text-red-500';
            btn.classList.remove('opacity-0'); // Stay visible if active
            btn.classList.add('opacity-100');
        } else {
            icon.className = 'ph ph-heart text-white';
            if (!btn.parentElement.matches(':hover')) {
                btn.classList.add('opacity-0');
            }
        }
    });
}

// Global Toast System
window.showToast = (message, type = 'success') => {
    const existing = document.querySelector('.toast-container');
    if (existing) existing.remove();

    const colors = {
        success: 'border-green-500/50 text-green-400 bg-green-500/10',
        error: 'border-red-500/50 text-red-400 bg-red-500/10',
        warning: 'border-yellow-500/50 text-yellow-400 bg-yellow-500/10',
        info: 'border-blue-500/50 text-blue-400 bg-blue-500/10'
    };

    const icons = {
        success: 'ph-check-circle',
        error: 'ph-x-circle',
        warning: 'ph-warning',
        info: 'ph-info'
    };

    const toastHTML = `
        <div class="toast-container fixed bottom-8 right-8 z-[1000] animate-slide-up">
            <div class="flex items-center gap-3 px-6 py-4 rounded-2xl border backdrop-blur-xl shadow-2xl ${colors[type]}">
                <i class="ph-bold ${icons[type]} text-2xl"></i>
                <p class="font-bold tracking-wide">${message}</p>
            </div>
        </div>
    `;
    document.body.insertAdjacentHTML('beforeend', toastHTML);
    setTimeout(() => {
        const toast = document.querySelector('.toast-container');
        if (toast) {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(20px)';
            toast.style.transition = 'all 0.5s ease';
            setTimeout(() => toast.remove(), 500);
        }
    }, 3000);
};


// Shared Image Resolver
window.resolveImagePath = (path) => {
    if (!path || path === 'default.png') return '/logo.png';
    let finalPath = path;
    
    if (path.startsWith('http')) {
        finalPath = path;
    } else if (path.startsWith('/api/uploads/')) {
        finalPath = path;
    } else if (path.startsWith('/storage/')) {
        finalPath = `${BACKEND_URL}${path}`;
    } else if (path.startsWith('products/')) {
        finalPath = `${BACKEND_URL}/storage/${path}`;
    } else if (!path.includes('/')) {
        // If it's a single filename, check if it looks like a Laravel storage hash
        if (path.length > 30) {
            finalPath = `${BACKEND_URL}/storage/products/${path}`;
        } else {
            finalPath = `/assets/products/${path}`;
        }
    }

    // Add cache buster for storage images
    if (finalPath.includes('/storage/')) {
        return `${finalPath}?t=${new Date().getTime()}`;
    }
    return finalPath;
};

// Fetch Interceptor for CSRF Tokens
const originalFetch = window.fetch;
window.fetch = async function() {
    let [resource, config] = arguments;
    if (config && ['POST', 'PUT', 'DELETE', 'PATCH'].includes(config.method)) {
        const match = document.cookie.match(new RegExp('(^| )XSRF-TOKEN=([^;]+)'));
        if (match) {
            config.headers = {
                ...config.headers,
                'X-XSRF-TOKEN': decodeURIComponent(match[2])
            };
        }
    }
    return originalFetch.apply(this, arguments);
};
const featuredLoop = document.getElementById("featured-products-loop");

// Theme Management
const initTheme = () => {
  const theme = localStorage.getItem("theme") || "dark";
  if (theme === "light") {
    document.documentElement.classList.add("light");
  }
};
initTheme();

window.toggleTheme = () => {
  const isLight = document.documentElement.classList.toggle("light");
  localStorage.setItem("theme", isLight ? "light" : "dark");
  
  // Update icons if toggle buttons exist
  const themeIcons = document.querySelectorAll(".theme-toggle-icon");
  themeIcons.forEach(icon => {
    icon.className = isLight ? "ph ph-moon theme-toggle-icon text-xl" : "ph ph-sun theme-toggle-icon text-xl";
  });
};

// Navbar scroll effect
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {
  if (window.scrollY > 50) {
    navbar.classList.add("bg-black/80", "backdrop-blur-md", "shadow-lg");
    navbar.classList.remove("glass");
    if(document.documentElement.classList.contains('light')) {
        navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
    } else {
        navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    }
  } else {
    navbar.classList.remove("bg-black/80", "backdrop-blur-md", "shadow-lg");
    navbar.classList.add("glass");
    navbar.style.backgroundColor = '';
  }
});

// Profile dropdown removed as user login is simplified to admin-only.

// --- NEW: Global Logout Modal Injection ---
function injectLogoutModal() {
  if (document.getElementById("logout-modal")) return;
  
  const modalHTML = `
    <div id="logout-modal" class="fixed inset-0 z-[200] hidden">
      <div class="absolute inset-0 bg-black/80 backdrop-blur-md" id="logout-backdrop-global"></div>
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-sm bg-zinc-900 border border-zinc-800 rounded-2xl p-8 shadow-[0_0_50px_rgba(220,38,38,0.15)] animate-fade-in text-center">
          <div class="w-16 h-16 bg-red-600/10 rounded-full flex items-center justify-center mx-auto mb-6 border border-red-600/20">
              <i class="ph-bold ph-sign-out text-3xl text-red-600"></i>
          </div>
          <h3 class="text-2xl font-bold text-white mb-2">Confirm Logout</h3>
          <p class="text-gray-400 text-sm mb-8 leading-relaxed">Are you sure you want to end your session?</p>
          <div class="flex gap-4">
              <button id="cancel-logout-global" class="flex-1 bg-zinc-800 hover:bg-zinc-700 text-white py-3 rounded-xl font-bold transition-all border border-zinc-700">Cancel</button>
              <button id="confirm-logout-global" class="flex-1 bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl font-bold shadow-lg shadow-red-600/20 transition-all">Logout</button>
          </div>
      </div>
    </div>
  `;
  document.body.insertAdjacentHTML('beforeend', modalHTML);
  
  document.getElementById("cancel-logout-global").onclick = () => document.getElementById("logout-modal").classList.add("hidden");
  document.getElementById("logout-backdrop-global").onclick = () => document.getElementById("logout-modal").classList.add("hidden");
  document.getElementById("confirm-logout-global").onclick = performLogout;
}

function setupLogoutAction() {
    document.getElementById("logout-action")?.addEventListener("click", () => {
        document.getElementById("logout-modal").classList.remove("hidden");
    });
}

async function performLogout() {
  try {
    await fetch(`${API_BASE_URL}/logout`, { 
        method: 'POST', 
        credentials: 'include',
        headers: { Accept: 'application/json' }
    });
  } catch (e) { console.error(e); }
  localStorage.clear();
  window.location.href = '/';
}

// Run injection immediately
injectLogoutModal();

// --- End Global Logout Logic ---

// Hamburger Menu
const menuBtn = document.getElementById("mobile-menu-btn");
const mobileMenu = document.getElementById("mobile-menu");

if (menuBtn && mobileMenu) {
  menuBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    mobileMenu.classList.remove("hidden");
    document.body.style.overflow = "hidden";
  });

  // Handle close button explicitly
  document.addEventListener("click", (e) => {
    const closeBtn = e.target.closest("#close-menu-btn");
    if (closeBtn) {
      mobileMenu.classList.add("hidden");
      document.body.style.overflow = "";
      return;
    }

    // Close if clicking outside the menu content when open
    if (!mobileMenu.classList.contains("hidden") && !e.target.closest("#mobile-menu")) {
      mobileMenu.classList.add("hidden");
      document.body.style.overflow = "";
    }
  });
}

// Simple animation observer (if not using a library)
const observerOptions = {
  root: null,
  rootMargin: "0px",
  threshold: 0.1,
};

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("animate-fade-in");
      observer.unobserve(entry.target);
    }
  });
}, observerOptions);

document.querySelectorAll(".animate-on-scroll").forEach((el) => {
  observer.observe(el);
});

// Feedback Form Handler
const feedbackForm = document.getElementById("feedback-form");
if (feedbackForm) {
  // Star Rating Logic
  const ratingInput = document.getElementById("rating-input");
  const stars = document.querySelectorAll("#rating-stars button");

  // Set initial state
  updateStars(5);

  stars.forEach((star) => {
    star.addEventListener("click", () => {
      const rating = parseInt(star.dataset.rating);
      ratingInput.value = rating;
      updateStars(rating);
      
      // Update button text based on rating
      const submitBtn = feedbackForm.querySelector("button[type=submit]");
      if (rating >= 4) {
        submitBtn.innerHTML = `⭐ Write a Google Review <i class="ph ph-arrow-square-out font-bold group-hover:translate-x-1 transition-transform"></i>`;
        submitBtn.classList.remove('bg-zinc-800', 'text-white');
        submitBtn.classList.add('bg-weld-orange', 'text-black');
      } else {
        submitBtn.innerHTML = `Submit Private Feedback <i class="ph ph-paper-plane-right font-bold group-hover:translate-x-1 transition-transform"></i>`;
        submitBtn.classList.add('bg-zinc-800', 'text-white');
        submitBtn.classList.remove('bg-weld-orange', 'text-black');
      }
    });
  });

  function updateStars(rating) {
    stars.forEach((s) => {
      const starRating = parseInt(s.dataset.rating);
      if (starRating <= rating) {
        s.classList.remove("text-zinc-600");
        s.classList.add("text-amber-500");
      } else {
        s.classList.add("text-zinc-600");
        s.classList.remove("text-amber-500");
      }
    });
  }

  // Form Submission
  feedbackForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const rating = parseInt(ratingInput.value);
    const submitBtn = feedbackForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Sending...";

    const formData = new FormData(feedbackForm);
    const data = Object.fromEntries(formData.entries());

    try {
        console.log("Sending feedback to:", `${BACKEND_URL}/api/messages`);
        
        // Save to Database
        const res = await fetch(`${BACKEND_URL}/api/messages`, {
            method: "POST",
            headers: { 
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                name: "Anonymous User", // Feedback form might not have name
                email: "feedback@classicweld.com",
                message: data.message,
                type: "feedback",
                rating: rating
            })
        });

        if (!res.ok) {
            const errData = await res.json();
            let errorMsg = errData.message;
            if (errData.errors) {
                const firstKey = Object.keys(errData.errors)[0];
                errorMsg = errData.errors[firstKey][0];
            }
            throw new Error(errorMsg || "Failed to save feedback");
        }

        // REDIRECT LOGIC: 4-5 stars go to Google
        if (rating >= 4) {
            window.open("https://g.page/r/CdS2YysBt4TjEBM/review", "_blank");
        }
        
        showToast("Feedback received! Thank you.", "success");
        feedbackForm.reset();
        updateStars(5);
    } catch (err) {
        console.error(err);
        showToast(err.message || "Error sending feedback.", "error");
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
  });
}

// Contact Form Handler
const contactForm = document.getElementById("contact-form");
if (contactForm) {
  contactForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const submitBtn = contactForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = "Sending...";

    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData.entries());
    
    try {
        console.log("Sending message to:", `${BACKEND_URL}/api/messages`);
        console.log("Data:", data);
        
        // Save to Database
        const res = await fetch(`${BACKEND_URL}/api/messages`, {
            method: "POST",
            headers: { 
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify({
                name: data.name,
                email: data.email,
                phone: data.phone || '',
                subject: data.subject || 'General Inquiry',
                message: data.message,
                type: "contact"
            })
        });

        if (!res.ok) {
            const errData = await res.json();
            let errorMsg = errData.message;
            if (errData.errors) {
                // Get the first validation error
                const firstKey = Object.keys(errData.errors)[0];
                errorMsg = errData.errors[firstKey][0];
            }
            throw new Error(errorMsg || "Failed to save message");
        }

        showToast("Message sent successfully!", "success");
        contactForm.reset();
    } catch (err) {
        console.error(err);
        showToast(err.message || "Error sending message.", "error");
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
  });
}

// --- NEW AUTHENTICATION & PRODUCT LOGIC ---

// Auth: Login Handler
const loginForm = document.getElementById("login-form");
if (loginForm) {
  loginForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const submitBtn = loginForm.querySelector("button[type=submit]");
    const originalText = submitBtn.innerText;
    submitBtn.disabled = true;
    submitBtn.innerText = "Signing in...";

    const formData = new FormData(loginForm);
    const data = Object.fromEntries(formData.entries());

    try {
      console.log("Attempting login with data:", data);
      // CSRF protection for Sanctum
      await fetch(`${BACKEND_URL}/sanctum/csrf-cookie`, { credentials: 'include' });

      const response = await fetch(`${API_BASE_URL}/login`, {
        method: "POST",
        credentials: 'include', 
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify({
            ...data,
            remember: data.remember === 'on'
        }),
      });
      
      console.log("Login response status:", response.status);

      if (response.ok) {
        const result = await response.json();
        localStorage.setItem("is_logged_in", "true");
        localStorage.setItem("user_role", result.role);
        localStorage.setItem("user_name", result.user.name);
        localStorage.setItem("user_email", result.user.email);
        localStorage.setItem("user_phone", result.user.phone || "");
        if (result.role === "admin") {
          window.location.href = "/admin/dashboard";
        } else {
          window.location.href = "/";
        }
      } else {
        const error = await response.json();
        alert(error.message || "Login failed");
      }
    } catch (err) {
      console.error(err);
      alert("Login error: " + err.message);
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerText = originalText;
    }
  });
}

// Auth: Logout Handler
const logoutBtn = document.getElementById("logout-btn");
const mobileLogoutBtn = document.getElementById("mobile-logout-btn");
const logoutModal = document.getElementById("logout-modal");
const confirmLogoutBtn = document.getElementById("confirm-logout");
const cancelLogoutBtn = document.getElementById("cancel-logout");

const handleLogout = async () => {
    try {
        await fetch(`${BACKEND_URL}/api/logout`, {
            method: "POST",
            credentials: 'include',
            headers: { Accept: "application/json" }
        });
    } catch (err) { console.error("Logout error:", err); }

    localStorage.removeItem("is_logged_in");
    localStorage.removeItem("user_role");
    localStorage.removeItem("user_name");
    window.location.href = "/";
};

if (logoutBtn) logoutBtn.addEventListener("click", () => logoutModal?.classList.remove("hidden"));
if (mobileLogoutBtn) mobileLogoutBtn.addEventListener("click", () => logoutModal?.classList.remove("hidden"));
if (cancelLogoutBtn) cancelLogoutBtn.addEventListener("click", () => logoutModal?.classList.add("hidden"));
if (confirmLogoutBtn) confirmLogoutBtn.addEventListener("click", handleLogout);
if (logoutModal) {
    document.getElementById("logout-backdrop")?.addEventListener("click", () => logoutModal.classList.add("hidden"));
}

// Signup removed as per requirements.

// Products: Dynamic Fetching
let productGrid;

let currentPage = 1;
let currentCategory = 'All';
let currentSearch = '';

async function fetchProducts(page = 1) {
  try {
    // Build query params
    const params = new URLSearchParams({
        page: page,
        category: currentCategory,
        search: currentSearch
    });

    const response = await fetch(`${API_BASE_URL}/products?${params.toString()}`, { 
        credentials: 'include',
        headers: { Accept: 'application/json' }
    });
    if (!response.ok) throw new Error("Failed to fetch products");

    const result = await response.json();
    const products = result.data; // Laravel paginator

    productGrid.innerHTML = "";

    if (products.length === 0) {
      productGrid.innerHTML = '<p class="col-span-full text-center text-gray-500">No products found.</p>';
      const pc = document.getElementById('pagination-container');
      if(pc) pc.innerHTML = '';
      return;
    }

    products.forEach((product) => {
      // Mock visual data as requested
      const brand = "ClassicWeld";
      const rating = (4.0 + (product.id % 10) / 10).toFixed(1);

      const isDealer = product.is_dealer_price;
      const imgSrc = window.resolveImagePath(product.image);

      const isSoldOut = product.is_sold_out;
      const soldOutOverlay = isSoldOut ? `<div class="absolute inset-0 bg-black/60 backdrop-blur-[2px] z-20 flex items-center justify-center"><span class="bg-red-600 text-white font-bold px-4 py-2 rounded uppercase tracking-widest rotate-[-15deg] shadow-lg border border-red-500/50">Sold Out</span></div>` : '';
      const cartButton = isSoldOut 
        ? `<button disabled class="w-full bg-zinc-800 text-gray-500 text-sm font-bold py-2 rounded-lg cursor-not-allowed border border-zinc-800 flex items-center justify-center gap-1"><i class="ph-bold ph-prohibit"></i> Out of Stock</button>`
        : `<button onclick="addToCart(${product.id}, '${product.name.replace(/'/g, "\\'")}', 0, '${imgSrc}')" data-product-id="${product.id}" class="add-to-cart-btn w-full bg-weld-orange hover:bg-amber-600 text-white text-sm font-bold py-2 rounded-lg transition-colors flex items-center justify-center gap-1">
              <i class="ph-bold ph-shopping-cart"></i> Add to Cart
           </button>`;

      const card = `
          <div class="glass rounded-xl overflow-hidden group border border-white/5 hover:border-weld-orange/50 transition-all duration-300 flex flex-col h-full relative ${isSoldOut ? 'opacity-75 grayscale-[0.5]' : ''}">
              
              <div class="relative h-40 md:h-48 overflow-hidden bg-zinc-800 cursor-pointer" onclick="window.location.href='/product-detail?id=${product.id}'">
                  ${soldOutOverlay}
                  <img src="${imgSrc}" alt="${product.name}" class="w-full h-full object-cover ${isSoldOut ? '' : 'group-hover:scale-110'} transition-transform duration-500">
                  
                  <!-- Wishlist Button -->
                  <button onclick="window.toggleWishlist(${product.id}, event)" 
                          data-wishlist-id="${product.id}"
                          class="absolute top-2 left-2 md:top-4 md:left-4 z-40 bg-black/60 backdrop-blur-md w-8 h-8 md:w-10 md:h-10 rounded-full border border-white/10 flex items-center justify-center ${window.userWishlist.includes(product.id) ? 'opacity-100' : 'opacity-0'} group-hover:opacity-100 transition-all duration-300 hover:scale-110 hover:bg-black/80">
                      <i class="${window.userWishlist.includes(product.id) ? 'ph-fill ph-heart text-red-500' : 'ph ph-heart text-white'} text-lg md:text-xl"></i>
                  </button>


              </div>
              <div class="p-3 md:p-5 flex-1 flex flex-col">
                  <div class="flex justify-between items-start mb-1 md:mb-2">
                      <span class="text-[10px] md:text-xs text-weld-orange font-bold uppercase tracking-wider">${brand}</span>
                      <div class="flex items-center text-[10px] md:text-xs text-yellow-500"><i class="ph-fill ph-star mr-1"></i> ${rating}</div>
                  </div>
                  <h3 class="text-base md:text-lg font-bold mb-1 ${isSoldOut ? '' : 'group-hover:text-weld-orange'} transition-colors cursor-pointer line-clamp-2 leading-tight" onclick="window.location.href='/product-detail?id=${product.id}'">${product.name}</h3>
                  <p class="text-[10px] text-gray-500 italic mb-3 line-clamp-1">${product.short_description || ''}</p>
                  
                  ${isDealer ? `<div class="mb-3 text-[10px] md:text-xs text-weld-orange flex items-center gap-1"><i class="ph-fill ph-check-circle"></i> MOQ: ${product.moq} Units</div>` : ""}
                  
                  <div class="flex flex-col md:grid md:grid-cols-2 gap-2 mt-auto relative z-30">
                      <button onclick="window.location.href='/product-detail?id=${product.id}'" class="w-full bg-zinc-800 hover:bg-zinc-700 text-white text-xs md:text-sm font-bold py-2 rounded-lg transition-colors border border-zinc-700">Details</button>
                      <div class="w-full">
                        ${cartButton}
                      </div>
                  </div>
              </div>
          </div>
      `;
      productGrid.innerHTML += card;
    });

    renderPagination(result);

  } catch (error) {
    console.error("Error fetching products:", error);
    productGrid.innerHTML = '<p class="col-span-full text-center text-red-500">Failed to load products. Please ensure Backend is running.</p>';
  }
}

function renderPagination(paginator) {
    const container = document.getElementById('pagination-container');
    if (!container) return;
    
    let html = '';
    
    if (paginator.current_page > 1) {
        html += `<button onclick="fetchProducts(${paginator.current_page - 1})" class="w-10 h-10 rounded-lg bg-zinc-800 border border-zinc-700 flex items-center justify-center text-white hover:bg-weld-orange transition-colors"><i class="ph-bold ph-caret-left"></i></button>`;
    }
    
    for(let i = 1; i <= paginator.last_page; i++) {
        const isActive = i === paginator.current_page;
        const activeClass = isActive ? 'bg-weld-orange text-white border-weld-orange' : 'bg-zinc-800 text-gray-400 border-zinc-700 hover:bg-zinc-700 hover:text-white';
        html += `<button onclick="fetchProducts(${i})" class="w-10 h-10 rounded-lg border flex items-center justify-center font-bold transition-colors ${activeClass}">${i}</button>`;
    }

    if (paginator.current_page < paginator.last_page) {
        html += `<button onclick="fetchProducts(${paginator.current_page + 1})" class="w-10 h-10 rounded-lg bg-zinc-800 border border-zinc-700 flex items-center justify-center text-white hover:bg-weld-orange transition-colors"><i class="ph-bold ph-caret-right"></i></button>`;
    }

    container.innerHTML = html;
}

// Ensure fetchProducts is globally available for pagination clicks
window.fetchProducts = fetchProducts;

async function fetchCategoriesAndRender() {
    const categoryFilterList = document.getElementById('category-filter');
    const mobileCategoryScroll = document.getElementById('mobile-category-scroll');
    if (!categoryFilterList) return;
    
    try {
        const res = await fetch(`${API_BASE_URL}/categories`, {
            headers: { 'Accept': 'application/json' }
        });
        if (res.ok) {
            const categories = await res.json();
            
            // Render Desktop Sidebar
            categoryFilterList.innerHTML = `<li><a href="#" class="text-weld-orange font-bold flex justify-between items-center category-link" data-category="All">All Products</a></li>`;
            
            // Render Mobile Scroll
            let mobileHtml = '<button class="category-link flex-shrink-0 px-6 py-2 rounded-full bg-weld-orange text-white font-bold text-xs transition-all border border-weld-orange shadow-lg shadow-weld-orange/20" data-category="All">All</button>';
            
            categories.forEach(cat => {
                categoryFilterList.innerHTML += `<li><a href="#" class="text-gray-400 hover:text-white transition-colors flex justify-between items-center text-sm category-link" data-category="${cat.name}">${cat.name}</a></li>`;
                mobileHtml += `<button class="category-link flex-shrink-0 px-6 py-2 rounded-full bg-zinc-900 text-gray-400 font-bold text-xs transition-all border border-white/5 whitespace-nowrap" data-category="${cat.name}">${cat.name}</button>`;
            });
            
            if (mobileCategoryScroll) mobileCategoryScroll.innerHTML = mobileHtml;
            bindCategoryEvents();
        }
    } catch (e) {
        console.error("Error fetching categories:", e);
    }
}

function bindCategoryEvents() {
    const categoryLinks = document.querySelectorAll('.category-link');
    if(categoryLinks.length > 0) {
        categoryLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const selectedCat = link.getAttribute('data-category') || link.dataset.category || 'All';
                
                // Update Desktop Active Styles
                document.querySelectorAll('#category-filter .category-link').forEach(l => {
                    l.classList.remove('text-weld-orange', 'font-bold');
                    l.classList.add('text-gray-400');
                });
                
                // Update Mobile Active Styles
                document.querySelectorAll('#mobile-category-scroll .category-link').forEach(l => {
                    l.classList.remove('bg-weld-orange', 'text-white', 'border-weld-orange', 'shadow-lg', 'shadow-weld-orange/20');
                    l.classList.add('bg-zinc-900', 'text-gray-400', 'border-white/5');
                });

                // Apply Active to matching items across both
                document.querySelectorAll(`.category-link[data-category="${selectedCat}"]`).forEach(activeEl => {
                    if (activeEl.tagName === 'A') {
                        activeEl.classList.add('text-weld-orange', 'font-bold');
                        activeEl.classList.remove('text-gray-400');
                    } else {
                        activeEl.classList.add('bg-weld-orange', 'text-white', 'border-weld-orange', 'shadow-lg', 'shadow-weld-orange/20');
                        activeEl.classList.remove('bg-zinc-900', 'text-gray-400', 'border-white/5');
                    }
                });

                currentCategory = selectedCat;
                fetchProducts(1);
            });
        });
    }
}

// Setup Filters
document.addEventListener('DOMContentLoaded', () => {
    // Dynamically fetch and render categories
    fetchCategoriesAndRender();

    const searchInput = document.getElementById('search-input');
    const mobileSearchAlt = document.getElementById('mobile-search-input-alt');
    
    const handleSearchInput = (e) => {
        currentSearch = e.target.value;
        fetchProducts(1);
    };

    if (searchInput) {
        let timeout = null;
        searchInput.addEventListener('input', (e) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => handleSearchInput(e), 500);
        });
    }

    if (mobileSearchAlt) {
        let timeout = null;
        mobileSearchAlt.addEventListener('input', (e) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => handleSearchInput(e), 500);
        });
    }

    const sortSelect = document.getElementById('sort-select');
    const mobileSortSelect = document.getElementById('mobile-sort-select');
    
    if (sortSelect) {
        sortSelect.addEventListener('change', () => fetchProducts(1));
    }
    if (mobileSortSelect) {
        mobileSortSelect.addEventListener('change', () => fetchProducts(1));
    }

    // Initial Fetch
    productGrid = document.getElementById("product-grid");
    if (productGrid) {
        fetchProducts(1);
    }

    // Featured Products Carousel
    if (featuredLoop) {
        fetchFeaturedProducts();
    }

    initNavSearch();
    
    // Sync cart badge
    if (window.Cart) {
        window.Cart.updateBadge();
    }

    // Mobile More Menu Toggle
    const initMobileMore = () => {
        const moreBtn = document.getElementById('mobile-more-btn');
        const moreMenu = document.getElementById('mobile-more-menu');
        
        if (moreBtn && moreMenu) {
            console.log("Mobile More Menu Initialized");
            moreBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                moreMenu.classList.toggle('hidden');
                moreBtn.classList.toggle('text-weld-orange');
            });
            
            document.addEventListener('click', (e) => {
                if (!moreMenu.contains(e.target) && !moreBtn.contains(e.target)) {
                    moreMenu.classList.add('hidden');
                    moreBtn.classList.remove('text-weld-orange');
                }
            });
        }
    };
    initMobileMore();
});

// --- COOKIE CONSENT ---
function initCookieConsent() {
    if (localStorage.getItem('cookie_consent')) return;
    
    if (!document.body) {
        setTimeout(initCookieConsent, 100);
        return;
    }

    const banner = document.createElement('div');
    banner.className = 'fixed bottom-0 left-0 w-full bg-zinc-900/95 backdrop-blur-md border-t border-white/10 p-6 z-[100] animate-slide-up';
    banner.innerHTML = `
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="bg-weld-orange/20 p-3 rounded-xl text-weld-orange">
                    <i class="ph-fill ph-cookie text-2xl"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold">Cookie Policy</h4>
                    <p class="text-gray-400 text-sm">We use cookies to enhance your experience, remember your login session, and manage your cart. By continuing to use our site, you agree to our use of cookies.</p>
                </div>
            </div>
            <div class="flex gap-4 w-full md:w-auto">
                <button id="accept-cookies" class="flex-1 md:flex-none bg-weld-orange hover:bg-amber-600 text-white font-bold py-2 px-8 rounded-lg transition-colors">
                    Accept
                </button>
                <button id="decline-cookies" class="flex-1 md:flex-none bg-zinc-800 hover:bg-zinc-700 text-white font-bold py-2 px-8 rounded-lg transition-colors">
                    Decline
                </button>
            </div>
        </div>
    `;

    document.body.appendChild(banner);

    document.getElementById('accept-cookies').addEventListener('click', () => {
        localStorage.setItem('cookie_consent', 'true');
        banner.remove();
    });

    document.getElementById('decline-cookies').addEventListener('click', () => {
        banner.remove();
    });
}

// Initializations
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCookieConsent);
} else {
    initCookieConsent();
}

let carouselIndex = 0;
let carouselMax = 0;

async function fetchFeaturedProducts() {
    console.log("Fetching featured products...");
    try {
        const response = await fetch(`${API_BASE_URL}/products?featured=true&page=1`, { 
            credentials: 'include',
            headers: { Accept: "application/json" } 
        });
        
        if (!response.ok) {
            console.error("Featured products response not OK:", response.status);
            throw new Error("Failed to fetch featured products");
        }
        
        const result = await response.json();
        console.log("Featured products result:", result);
        
        const products = result.data ? result.data : (Array.isArray(result) ? result : []);
        const slicedProducts = products.slice(0, 5);
        
        if (slicedProducts.length === 0) {
            console.log("No featured products found");
            featuredLoop.innerHTML = `
                <div class="w-full h-full flex items-center justify-center bg-zinc-900/50">
                    <div class="text-center">
                        <i class="ph ph-shopping-bag text-4xl text-gray-600 mb-2"></i>
                        <p class="text-gray-500">No featured products available at the moment.</p>
                    </div>
                </div>
            `;
            return;
        }
        
        carouselMax = slicedProducts.length - 1;
        let html = '';
        
        slicedProducts.forEach((product) => {
            const imgSrc = window.resolveImagePath(product.image);
            const brand = "ClassicWeld";
            
            html += `
                <div class="w-full h-full flex-shrink-0 flex flex-col md:flex-row bg-zinc-900 relative overflow-hidden group/carousel">
                    <!-- IMAGE (Mobile: Full background, Desktop: Side half) -->
                    <div class="absolute inset-0 md:relative md:w-1/2 h-full cursor-pointer z-0 md:z-10" onclick="window.location.href='/product-detail?id=${product.id}'">
                       <img src="${imgSrc}" alt="${product.name}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                       <div class="absolute inset-0 bg-black/40 md:hidden"></div> <!-- Dark overlay for mobile text readability -->
                       <div class="absolute inset-y-0 left-0 bg-gradient-to-r from-zinc-900 via-zinc-900/50 to-transparent z-10 hidden md:block w-32"></div>
                    </div>

                    <!-- TEXT CONTENT -->
                    <!-- Desktop: 1/2 width side content -->
                    <!-- Mobile: Absolute bottom bar -->
                    <div class="relative md:w-1/2 p-6 md:p-12 flex flex-col justify-end md:justify-center z-20 h-full pointer-events-none">
                       <!-- Mobile only compact bar container -->
                       <div class="bg-black/60 md:bg-transparent backdrop-blur-md md:backdrop-blur-none -mx-6 -mb-6 p-6 md:p-0 md:m-0 rounded-t-3xl md:rounded-none pointer-events-auto">
                           <h4 class="text-weld-orange font-bold uppercase tracking-widest mb-1 text-[10px] md:text-sm">${brand}</h4>
                           <h2 class="text-lg md:text-4xl font-bold text-white mb-2 leading-tight line-clamp-1 md:line-clamp-none">${product.name}</h2>
                           <p class="text-gray-300 md:text-gray-400 mb-4 line-clamp-2 md:line-clamp-3 text-xs md:text-base font-light">${product.description || 'Premium industrial welding equipment.'}</p>
                           <div class="flex gap-4">
                               <button onclick="window.location.href='/product-detail?id=${product.id}'" class="bg-weld-orange hover:bg-amber-600 text-white px-5 py-2 md:px-8 md:py-4 rounded-lg font-bold transition-all shadow-lg shadow-amber-500/30 flex items-center gap-2 text-xs md:text-base">
                                   View Details <i class="ph ph-arrow-right"></i>
                               </button>
                           </div>
                       </div>
                    </div>

                    <!-- Wishlist Button -->
                    <button onclick="window.toggleWishlist(${product.id}, event)" 
                            data-wishlist-id="${product.id}"
                            class="absolute top-6 right-6 z-30 bg-black/60 backdrop-blur-md w-12 h-12 rounded-full border border-white/10 flex items-center justify-center ${window.userWishlist.includes(product.id) ? 'opacity-100' : 'opacity-0'} group-hover/carousel:opacity-100 transition-all duration-300 hover:scale-110 hover:bg-black/80">
                        <i class="${window.userWishlist.includes(product.id) ? 'ph-fill ph-heart text-red-500' : 'ph ph-heart text-white'} text-2xl"></i>
                    </button>
                </div>
            `;
        });
        
        featuredLoop.innerHTML = html;
        
        // Render Dots
        const dotsContainer = document.getElementById('carousel-dots');
        if (dotsContainer) {
            let dotsHtml = '';
            for (let i = 0; i <= carouselMax; i++) {
                dotsHtml += `<button class="carousel-dot w-2.5 h-2.5 rounded-full transition-all ${i === 0 ? 'bg-weld-orange w-8' : 'bg-white/30 hover:bg-white/50'}" data-index="${i}"></button>`;
            }
            dotsContainer.innerHTML = dotsHtml;
            
            // Add click listeners to dots
            document.querySelectorAll('.carousel-dot').forEach(dot => {
                dot.addEventListener('click', (e) => {
                    carouselIndex = parseInt(e.target.dataset.index);
                    updateCarousel();
                });
            });
        }
        
        // Setup buttons
        document.getElementById('carousel-prev')?.addEventListener('click', () => {
            carouselIndex = carouselIndex > 0 ? carouselIndex - 1 : carouselMax;
            updateCarousel();
        });
        
        document.getElementById('carousel-next')?.addEventListener('click', () => {
            carouselIndex = carouselIndex < carouselMax ? carouselIndex + 1 : 0;
            updateCarousel();
        });
        
        // Auto-play loop
        if (window.carouselTimer) clearInterval(window.carouselTimer);
        window.carouselTimer = setInterval(() => {
            carouselIndex = carouselIndex < carouselMax ? carouselIndex + 1 : 0;
            updateCarousel();
        }, 5000);
        
    } catch (error) {
        console.error("Featured loop error:", error);
        featuredLoop.innerHTML = `
            <div class="w-full h-full flex items-center justify-center bg-zinc-900/50">
                <div class="text-center p-8">
                    <i class="ph ph-warning-circle text-4xl text-red-500 mb-2"></i>
                    <p class="text-gray-400">Unable to load featured products at this time.</p>
                    <button onclick="fetchFeaturedProducts()" class="mt-4 text-xs font-bold text-weld-orange hover:underline">Try Again</button>
                </div>
            </div>
        `;
    }
}

function updateCarousel() {
    if (featuredLoop) {
        featuredLoop.style.transform = `translateX(-${carouselIndex * 100}%)`;
        
        // Update dots
        document.querySelectorAll('.carousel-dot').forEach((dot, index) => {
            if (index === carouselIndex) {
                dot.classList.remove('bg-white/30', 'hover:bg-white/50');
                dot.classList.add('bg-weld-orange');
            } else {
                dot.classList.remove('bg-weld-orange');
                dot.classList.add('bg-white/30', 'hover:bg-white/50');
            }
        });
    }
}

function initNavSearch() {
    const input = document.getElementById('nav-search-input');
    const mobileInput = document.getElementById('mobile-search-input');
    const suggestions = document.getElementById('nav-search-suggestions');
    if (!input && !mobileInput) return;

    const setupInput = (inp, suggestionsId) => {
        if (!inp) return;
        const suggestions = document.getElementById(suggestionsId);
        if (!suggestions) return;
        
        let timeout = null;
        inp.addEventListener('input', (e) => {
            const query = e.target.value.trim();
            clearTimeout(timeout);

            if (query.length < 1) {
                suggestions.classList.add('hidden');
                return;
            }

            timeout = setTimeout(async () => {
                try {
                    const response = await fetch(`${API_BASE_URL}/products?search=${encodeURIComponent(query)}&page=1`, {
                        credentials: 'include', headers: { Accept: "application/json" }
                    });
                    const result = await response.json();
                    const products = result.data ? result.data.slice(0, 5) : [];

                    if (products.length > 0) {
                        let html = '';
                        products.forEach(p => {
                            const imgSrc = p.image && p.image.startsWith("http") ? p.image : `https://placehold.co/100x100/222/orange?text=${encodeURIComponent(p.name[0])}`;
                            html += `
                                <a href="/product-detail?id=${p.id}" class="flex items-center gap-3 p-3 hover:bg-zinc-800 transition-colors border-b border-white/5 last:border-0 no-underline">
                                    <img src="${imgSrc}" class="w-10 h-10 object-cover rounded shadow" alt="${p.name}">
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-bold text-white truncate">${p.name}</div>
                                        <div class="text-xs text-gray-500">${p.category}</div>
                                    </div>
                                </a>
                            `;
                        });
                        html += `
                            <a href="/products?search=${encodeURIComponent(query)}" class="block p-3 text-center text-xs font-bold text-weld-orange hover:bg-zinc-800 transition-colors bg-black/20 no-underline">
                                See all results
                            </a>
                        `;
                        suggestions.innerHTML = html;
                        suggestions.classList.remove('hidden');
                    } else {
                        suggestions.innerHTML = '<div class="p-4 text-center text-sm text-gray-500">No matches found</div>';
                        suggestions.classList.remove('hidden');
                    }
                } catch (err) {
                    console.error("Nav search error:", err);
                }
            }, 300);
        });

        inp.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                window.location.href = `/products?search=${encodeURIComponent(inp.value.trim())}`;
            }
        });
        
        // Close suggestions when clicking outside
        document.addEventListener('click', (e) => {
            if (!inp.contains(e.target) && !suggestions.contains(e.target)) {
                suggestions.classList.add('hidden');
            }
        });
    };

    setupInput(input, 'nav-search-suggestions');
    setupInput(mobileInput, 'mobile-search-suggestions');
}

// Init search and Wishlist on load
// initNavSearch is already called in DOMContentLoaded
fetchWishlistIds();



