<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart - CLASSICWELD</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
      <style>
      body { visibility: hidden; }
    </style>
    @vite('resources/css/style.css')
    <script>
      window.addEventListener("DOMContentLoaded", () => {
        document.body.style.visibility = "visible";
      });
    </script>
  </head>
  <body class="bg-weld-dark text-white overflow-x-hidden font-sans flex flex-col min-h-screen">
    <div id="app" class="flex flex-col flex-1">
      <!-- Navbar -->
      <nav class="fixed top-0 w-full z-50 glass transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-20">
            <div class="flex-shrink-0">
              <a href="/" class="text-2xl font-bold tracking-wider text-white logo-glow inline-block">
                <img src="/logo.png" alt="CLASSICWELD" class="h-10 md:h-12 w-auto">
              </a>
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-8">
                <a href="/" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="/products" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Products</a>
                <a href="/#services" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="/about" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">About</a>
                <a href="/contact" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="/feedback" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Feedback</a>
              </div>
            </div>
            <div class="flex items-center space-x-4">
                            <div class="relative group hidden md:block" id="nav-search-container">
                <div class="flex items-center bg-zinc-900/50 border border-white/10 rounded-full px-4 py-1.5 focus-within:border-weld-orange transition-all duration-300">
                  <i class="ph ph-magnifying-glass text-gray-400 mr-2"></i>
                  <input type="text" id="nav-search-input" placeholder="Search..." class="bg-transparent border-none focus:outline-none text-sm w-24 md:w-40 transition-all duration-300 focus:w-40 md:focus:w-64">
                </div>
                <!-- Suggestions Dropdown -->
                <div id="nav-search-suggestions" class="absolute top-full left-0 md:left-auto md:right-0 mt-2 w-64 md:w-80 bg-zinc-900 border border-white/10 rounded-xl shadow-2xl overflow-hidden hidden z-50">
                </div>
              </div>
              <a href="/cart" class="text-weld-orange transition-colors relative hidden md:block cursor-pointer">
                <i class="ph-fill ph-shopping-cart text-xl"></i>
                <span id="cart-count" class="absolute -top-2 -right-2 bg-weld-orange text-xs rounded-full h-4 w-4 flex items-center justify-center text-white font-bold">0</span>
              </a>
              <a href="/admin/login" class="text-gray-300 hover:text-white transition-colors hidden md:block" title="Admin Login"><i class="ph ph-user text-xl"></i></a><button onclick="toggleTheme()" class="text-gray-300 hover:text-white transition-colors hidden md:block" title="Toggle Theme"><i class="ph ph-sun theme-toggle-icon text-xl"></i></button>
            </div>
            <div class="flex md:hidden items-center space-x-4">
              <button onclick="toggleTheme()" class="text-gray-400 hover:text-white transition-colors" title="Toggle Theme">
                <i class="ph ph-sun theme-toggle-icon text-3xl"></i>
              </button>
              <a href="/admin/login" class="text-gray-400 hover:text-white transition-colors" title="Admin Login">
                <i class="ph ph-user text-3xl"></i>
              </a>
            </div>
          </div>
        </div>
        

      </nav>

      <!-- Cart Section -->
      <section class="flex-1 pt-32 pb-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <h1 class="text-3xl font-bold mb-8">Your <span class="text-weld-orange">Cart</span></h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div id="cart-container" class="space-y-4">
                    <!-- Dynamic Cart Items go here -->
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="glass rounded-xl p-6 h-fit border border-white/5">
                <h2 class="text-xl font-bold mb-6 border-b border-white/10 pb-4">Request Summary</h2>
                
                <div class="space-y-4 mb-6 text-gray-300">
                    <div class="flex justify-between">
                        <span>Total Items</span>
                        <span id="summary-items-count" class="font-bold text-white">0</span>
                    </div>
                    <p class="text-sm text-gray-500">Your request will be sent to our team for a formal quotation.</p>
                </div>

                <!-- Contact Information Form -->
                <div class="mb-6 p-4 bg-zinc-900/50 rounded-lg border border-white/5">
                    <h3 class="text-sm font-bold text-weld-orange uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="ph ph-user-focus"></i> Contact Information
                    </h3>
                    <div class="space-y-3">
                        <div>
                            <input type="text" id="cust-name" placeholder="Full Name" class="w-full bg-black border border-white/10 rounded-lg px-3 py-2 text-sm focus:border-weld-orange outline-none transition-all" required>
                        </div>
                        <div>
                            <input type="email" id="cust-email" placeholder="Email Address" class="w-full bg-black border border-white/10 rounded-lg px-3 py-2 text-sm focus:border-weld-orange outline-none transition-all" required>
                        </div>
                        <div>
                            <input type="tel" id="cust-phone" placeholder="Phone Number" class="w-full bg-black border border-white/10 rounded-lg px-3 py-2 text-sm focus:border-weld-orange outline-none transition-all">
                        </div>
                    </div>
                </div>

                <div id="checkout-actions">
                    <button id="checkout-btn" class="w-full bg-weld-orange hover:bg-amber-600 text-white font-bold py-3 rounded-lg transition-colors flex justify-center items-center gap-2">
                        <i class="ph-bold ph-paper-plane-tilt"></i> Send Request for Products
                    </button>
                </div>
            </div>
        </div>
      </section>

      <!-- Mobile Fixed Bottom Navigation -->
      <div class="md:hidden fixed bottom-0 left-0 w-full bg-zinc-950/90 backdrop-blur-xl border-t border-white/5 py-3 px-6 z-50 flex items-center justify-between shadow-2xl">
          <a href="/" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
              <i class="ph ph-house text-2xl" style="color: white !important;"></i>
              <span class="text-[10px] font-bold" style="color: white !important;">Home</span>
          </a>
          <a href="/products" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
              <i class="ph ph-package text-2xl" style="color: white !important;"></i>
              <span class="text-[10px] font-bold" style="color: white !important;">Products</span>
          </a>
          <a href="/cart" class="relative bg-weld-orange text-black w-14 h-14 rounded-full flex items-center justify-center -mt-8 border-4 border-zinc-950 shadow-lg shadow-weld-orange/20 transition-transform active:scale-90">
              <i class="ph ph-shopping-cart text-2xl font-bold"></i>
              <span id="mobile-cart-count" class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] rounded-full h-5 w-5 flex items-center justify-center font-bold border-2 border-zinc-950">0</span>
          </a>
          <a href="/about" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
              <i class="ph ph-info text-2xl" style="color: white !important;"></i>
              <span class="text-[10px] font-bold" style="color: white !important;">About</span>
          </a>
          <button id="mobile-more-btn" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors relative">

              <i class="ph ph-caret-circle-up text-2xl" style="color: white !important;"></i>
              <span class="text-[10px] font-bold" style="color: white !important;">More</span>
          </button>
          
          <!-- Dropup Menu -->
          <div id="mobile-more-menu" class="absolute bottom-full right-4 mb-4 w-48 bg-zinc-900/95 backdrop-blur-2xl rounded-2xl border border-white/10 shadow-2xl overflow-hidden hidden animate-fade-in-up z-[60]">
              <div class="p-2 space-y-1">
                  <a href="/products" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-magnifying-glass text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium" style="color: white !important;">Search</span>
                  </a>

                  <a href="/feedback" id="mobile-feedback-link" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-chat-centered-dots text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium" style="color: white !important;">Feedback</span>
                  </a>
                  <a href="https://g.page/r/CdS2YysBt4TjEBM/review" target="_blank" id="mobile-google-review-link" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-google-logo text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium font-bold" style="color: white !important;">Write a Review</span>
                  </a>
                  <a href="/contact" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-envelope text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium" style="color: white !important;">Contact</span>
                  </a>
              </div>
          </div>
      </div>

      <div class="pb-24 md:pb-0">
      <!-- Footer -->
      <footer class="bg-black py-12 border-t border-zinc-900 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
              <a href="/" class="text-2xl font-bold tracking-wider text-white mb-6 inline-block logo-glow-sm">
                <img src="/logo.png" alt="CLASSICWELD" class="h-10 md:h-12 w-auto">
              </a>
              <p class="text-gray-500 text-sm leading-relaxed">
                Your Trusted Partner for Bulk Welding Supplies, Committed to Fast Delivery, Consistent Quality, and Long-Term Business Relationships.
              </p>
            </div>
            <div>
              <h5 class="text-white font-bold mb-4">Quick Links</h5>
              <ul class="space-y-2 text-gray-500 text-sm">
                <li><a href="/about" class="hover:text-weld-orange transition-colors">About Us</a></li>
                <li><a href="/catalog.pdf" target="_blank" class="hover:text-weld-orange transition-colors">Catalog (PDF)</a></li>
                <li><a href="#" class="hover:text-weld-orange transition-colors">Distributors</a></li>
                <li><a href="/feedback" class="hover:text-weld-orange transition-colors">Feedback</a></li>
              </ul>
            </div>
            <div>
              <h5 class="text-white font-bold mb-4">Support</h5>
              <ul class="space-y-2 text-gray-500 text-sm">
                <li><a href="#" class="hover:text-weld-orange transition-colors">Help Center</a></li>
                <li><a href="#" class="hover:text-weld-orange transition-colors">Warranty</a></li>
                <li><a href="#" class="hover:text-weld-orange transition-colors">Shipping Info</a></li>
                <li><a href="#" class="hover:text-weld-orange transition-colors">Returns</a></li>
              </ul>
            </div>
            </div>
          <div class="mt-12 pt-8 border-t border-zinc-900 flex flex-col md:flex-row justify-between items-center text-gray-600 text-sm">
            <p>&copy; 2025 CLASSICWELD Industries. All rights reserved. | <a href="/admin/login" class="hover:text-weld-orange transition-colors">Admin Login</a></p>
            <div class="flex space-x-6 mt-4 md:mt-0">
              <a href="#" class="hover:text-white transition-colors"><i class="ph ph-facebook-logo text-xl"></i></a>
              <a href="#" class="hover:text-white transition-colors"><i class="ph ph-twitter-logo text-xl"></i></a>
              <a href="#" class="hover:text-white transition-colors"><i class="ph ph-instagram-logo text-xl"></i></a>
              <a href="#" class="hover:text-white transition-colors"><i class="ph ph-linkedin-logo text-xl"></i></a>
            </div>
          </div>
        </div>
        </div>
    </footer>
    </div>
    
    @vite('resources/js/main.js')
    <script type="module">
        
        window.renderCart = function() {
            const container = document.getElementById('cart-container');
            const items = window.Cart.items;
            
            const checkoutBtn = document.getElementById('checkout-btn');
            
            if (items.length === 0) {
                container.innerHTML = `
                    <div class="glass rounded-xl p-12 text-center border border-white/5">
                        <i class="ph-light ph-shopping-cart text-6xl text-gray-600 mb-4 inline-block"></i>
                        <h2 class="text-2xl font-bold mb-2">Your request list is empty</h2>
                        <p class="text-gray-400 mb-6">Looks like you haven't added anything to your request yet.</p>
                        <a href="/products" class="inline-block bg-weld-orange hover:bg-amber-600 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                            Browse Products
                        </a>
                    </div>
                `;
                document.getElementById('summary-items-count').innerText = '0';
                
                if (checkoutBtn) {
                    checkoutBtn.disabled = true;
                    checkoutBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
                return;
            }
            
            if (checkoutBtn) {
                checkoutBtn.disabled = false;
                checkoutBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            }
            
            container.innerHTML = items.map(item => `
                <div class="glass rounded-xl p-3 md:p-4 flex flex-col md:flex-row items-start md:items-center gap-4 md:gap-6 border border-white/5 animate-fade-in relative">
                    <!-- Product Info Area -->
                    <div class="flex items-center gap-4 w-full md:flex-1">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-lg overflow-hidden bg-zinc-800 flex-shrink-0 border border-white/5">
                            <img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-sm md:text-lg mb-1 line-clamp-2 md:line-clamp-none leading-tight text-white">${item.name}</h3>
                            <p class="text-gray-500 text-[10px] md:text-sm uppercase tracking-wider font-medium">Industrial Grade</p>
                        </div>
                    </div>
                    
                    <!-- Controls Area -->
                    <div class="flex items-center justify-between w-full md:w-auto md:ml-auto gap-4 pt-3 md:pt-0 border-t md:border-t-0 border-white/5">
                        <div class="flex items-center gap-2 bg-black/40 rounded-xl p-1 border border-white/10 shadow-inner">
                            <button onclick="window.Cart.updateQuantity(${item.id}, -1)" class="w-8 h-8 rounded-lg hover:bg-zinc-800 flex items-center justify-center text-gray-400 hover:text-white transition-all active:scale-90">
                                <i class="ph-bold ph-minus text-xs"></i>
                            </button>
                            <span class="w-8 text-center font-bold text-sm text-weld-orange">${item.quantity}</span>
                            <button onclick="window.Cart.updateQuantity(${item.id}, 1)" class="w-8 h-8 rounded-lg hover:bg-zinc-800 flex items-center justify-center text-gray-400 hover:text-white transition-all active:scale-90">
                                <i class="ph-bold ph-plus text-xs"></i>
                            </button>
                        </div>
                        
                        <button onclick="window.Cart.remove(${item.id})" class="text-gray-500 hover:text-red-500 hover:bg-red-500/10 transition-all p-2.5 rounded-xl border border-transparent hover:border-red-500/20" title="Remove item">
                            <i class="ph-bold ph-trash text-lg md:text-xl"></i>
                        </button>
                    </div>
                </div>
            `).join('');
            
            const totalCount = items.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('summary-items-count').innerText = totalCount;
        };
        
        // Initial render
        document.addEventListener('DOMContentLoaded', () => {
            window.renderCart();
            
            // Auto-fill if logged in
            const userName = localStorage.getItem('user_name');
            const userEmail = localStorage.getItem('user_email');
            const userPhone = localStorage.getItem('user_phone');
            if(userName) document.getElementById('cust-name').value = userName;
            // Removed auto-fill for email to prevent fixed admin email from appearing
            // if(userEmail) document.getElementById('cust-email').value = userEmail;
            if(userPhone) document.getElementById('cust-phone').value = userPhone;

            document.getElementById('checkout-btn')?.addEventListener('click', async () => {
                if(window.Cart.items.length === 0) return;
                
                const name = document.getElementById('cust-name').value.trim();
                const email = document.getElementById('cust-email').value.trim();
                const phone = document.getElementById('cust-phone').value.trim();

                if(!name || !email) {
                    window.Cart.showToast("Please provide your name and email.", "error");
                    return;
                }

                const btn = document.getElementById('checkout-btn');
                const originalText = btn.innerHTML;
                
                try {
                    btn.disabled = true;
                    btn.innerHTML = '<i class="ph-bold ph-spinner animate-spin"></i> Sending Request...';
                    
                    const API_URL = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1' 
                        ? `http://${window.location.hostname}:8000/api` 
                        : '/api';

                    const response = await fetch(`${API_URL}/quotes`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            customer_name: name,
                            customer_email: email,
                            customer_phone: phone,
                            items: window.Cart.items.map(item => ({
                                name: item.name,
                                quantity: item.quantity
                            }))
                        })
                    });

                    // Business emails (Primary and Forwarding)
                    const primaryEmail = "classicwelduae@gmail.com";
                    const forwardingEmail = "santhoshmangadan@gmail.com"; // Updated forwarding email
                    const businessEmails = `${primaryEmail},${forwardingEmail}`;
                    
                    const subject = encodeURIComponent(`Product Quote Request - ${name}`);
                    
                    let bodyText = `New Product Quote Request from ClassicWeld\n`;
                    bodyText += `===========================================\n\n`;
                    bodyText += `CUSTOMER DETAILS:\n`;
                    bodyText += `- Name: ${name}\n`;
                    bodyText += `- Email: ${email}\n`;
                    bodyText += `- Phone: ${phone || 'N/A'}\n\n`;
                    bodyText += `REQUESTED PRODUCTS:\n`;
                    
                    window.Cart.items.forEach((item, index) => {
                        bodyText += `${index + 1}. ${item.name} (Quantity: ${item.quantity})\n`;
                    });
                    
                    bodyText += `\n-------------------------------------------\n`;
                    bodyText += `Sent via ClassicWeld Portal\n`;
                    
                    const mailtoLink = `mailto:${businessEmails}?subject=${subject}&body=${encodeURIComponent(bodyText)}`;

                    // Redirect to Email Client
                    window.location.href = mailtoLink;
                    
                    window.Cart.showToast("Opening your email client...", 'success');
                    window.Cart.clear();
                    
                    btn.innerHTML = '<i class="ph-bold ph-check-circle"></i> Redirecting...';
                    btn.classList.add('bg-green-600');
                    btn.classList.remove('bg-weld-orange');
                    
                    setTimeout(() => {
                        window.location.href = '/products';
                    }, 3000);

                } catch (error) {
                    console.error("RFQ Error:", error);
                    window.Cart.showToast("Failed to send request. Please try again.", "error");
                    btn.disabled = false;
                    btn.innerHTML = originalText;
                }
            });
        });
    </script>
  </body>
</html>


