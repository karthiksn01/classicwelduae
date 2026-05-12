<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Wishlist - CLASSICWELD</title>
    <link rel="icon" type="image/png" href="/favicon.png" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
      body { visibility: hidden; }
      .glass {
        background: rgba(24, 24, 27, 0.7);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
      }
      .logo-glow {
        position: relative;
        display: inline-block;
        z-index: 1;
        isolation: isolate;
      }
      .logo-glow::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 160%;
        height: 100%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.6) 40%, rgba(255, 255, 255, 0.2) 70%, transparent 90%);
        filter: blur(12px);
        z-index: -1;
        pointer-events: none;
        border-radius: 100px;
        animation: logo-pulse 4s ease-in-out infinite;
      }
      @keyframes logo-pulse {
        0%, 100% { opacity: 0.6; transform: translate(-50%, -50%) scale(1); }
        50% { opacity: 0.9; transform: translate(-50%, -50%) scale(1.1); }
      }
    </style>
    @vite(['resources/css/style.css', 'resources/js/main.js'])
    <script>
      window.addEventListener("load", () => {
        document.body.style.visibility = "visible";
      });
    </script>
  </head>
  <body class="bg-weld-dark text-white font-sans antialiased">
    <div id="app" class="min-h-screen flex flex-col">
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
                <div id="nav-search-suggestions" class="absolute top-full left-0 md:left-auto md:right-0 mt-2 w-64 md:w-80 bg-zinc-900 border border-white/10 rounded-xl shadow-2xl overflow-hidden hidden z-50"></div>
              </div>
              <a href="/cart" class="text-gray-300 hover:text-white transition-colors relative hidden md:block cursor-pointer">
                <i class="ph ph-shopping-cart text-xl"></i>
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

      <main class="flex-grow pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2 tracking-tight">My Wishlist</h1>
                    <p class="text-gray-400">Products you've saved for later viewing.</p>
                </div>
                <a href="/products" class="bg-zinc-900 hover:bg-zinc-800 text-white font-bold py-3 px-6 rounded-xl border border-white/5 transition-all flex items-center gap-2 w-fit">
                    <i class="ph ph-shopping-bag"></i> Continue Shopping
                </a>
            </div>

            <div id="wishlist-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Loading State -->
                <div class="col-span-full py-20 text-center">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-weld-orange mx-auto mb-4"></div>
                    <p class="text-gray-500 font-medium">Loading your saved items...</p>
                </div>
            </div>
        </div>
      </main>

      <!-- Mobile Fixed Bottom Navigation -->
      <div class="md:hidden fixed bottom-0 left-0 w-full bg-zinc-950/90 backdrop-blur-xl border-t border-white/5 py-3 px-6 z-50 flex items-center justify-between shadow-2xl">
          <a href="/" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
              <i class="ph ph-house text-2xl"></i>
              <span class="text-[10px] font-bold">Home</span>
          </a>
          <a href="/products" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
              <i class="ph ph-package text-2xl"></i>
              <span class="text-[10px] font-bold">Products</span>
          </a>
          <a href="/cart" class="relative bg-weld-orange text-black w-14 h-14 rounded-full flex items-center justify-center -mt-8 border-4 border-zinc-950 shadow-lg shadow-weld-orange/20 transition-transform active:scale-90">
              <i class="ph ph-shopping-cart text-2xl font-bold"></i>
              <span id="mobile-cart-count" class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] rounded-full h-5 w-5 flex items-center justify-center font-bold border-2 border-zinc-950">0</span>
          </a>
          <a href="/about" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
              <i class="ph ph-info text-2xl"></i>
              <span class="text-[10px] font-bold">About</span>
          </a>
          <button id="mobile-more-btn" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors relative">
              <i class="ph ph-caret-circle-up text-2xl"></i>
              <span class="text-[10px] font-bold">More</span>
          </button>
          
          <!-- Dropup Menu -->
          <div id="mobile-more-menu" class="absolute bottom-full right-4 mb-4 w-48 bg-zinc-900/95 backdrop-blur-2xl rounded-2xl border border-white/10 shadow-2xl overflow-hidden hidden animate-fade-in-up z-[60]">
              <div class="p-2 space-y-1">
                  <a href="/products" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-magnifying-glass text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium">Search</span>
                  </a>
                  <a href="/about" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-info text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium">About</span>
                  </a>
                  <a href="/feedback" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-chat-centered-dots text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium">Feedback</span>
                  </a>
                  <a href="/contact" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-envelope text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium">Contact</span>
                  </a>
              </div>
          </div>
      </div>

      <div class="pb-24 md:pb-0">
      <!-- Footer -->
      <footer class="bg-zinc-950 border-t border-white/5 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <img src="/logo.png" alt="ClassicWeld" class="h-8 mx-auto mb-6 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
          <p class="text-gray-500 text-sm">© 2026 ClassicWeld Trading LLC. All rights reserved.</p>
        </div>
        </div>
    </footer>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', async () => {
        const grid = document.getElementById('wishlist-grid');

        try {
            // Wait a moment for main.js to initialize window.userWishlist
            await new Promise(r => setTimeout(r, 100));
            const wishlistIds = window.userWishlist || [];

            if (wishlistIds.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-20 text-center glass rounded-2xl border border-white/5">
                        <div class="bg-zinc-800 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 border border-white/5 text-gray-500">
                            <i class="ph ph-heart-break text-4xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-4">Your wishlist is empty</h2>
                        <p class="text-gray-400 mb-8 max-w-md mx-auto leading-relaxed">Explore our catalog and click the heart icon on any product to save it here for later.</p>
                        <a href="/products" class="bg-weld-orange hover:bg-amber-600 text-white font-bold py-4 px-10 rounded-xl transition-all shadow-lg shadow-amber-500/20 inline-block">
                            Browse Products
                        </a>
                    </div>
                `;
                return;
            }

            // Fetch all products (unauthenticated)
            const BACKEND_URL = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1' 
                ? `http://${window.location.hostname}:8000` 
                : '';
            const response = await fetch(`${BACKEND_URL}/api/products`);
            if (!response.ok) throw new Error('Failed to fetch products');
            
            const result = await response.json();
            const allProducts = result.data || [];
            
            // Filter products
            const products = allProducts.filter(p => wishlistIds.includes(p.id));

            if (products.length === 0) {
                // IDs exist but no matching products
                localStorage.setItem('user_wishlist', '[]');
                location.reload();
                return;
            }

            grid.innerHTML = products.map(p => {
                const imgSrc = window.resolveImagePath(p.image);
                const rating = (4.0 + (p.id % 10) / 10).toFixed(1);
                
                return `
                    <div class="glass rounded-xl overflow-hidden group border border-white/5 hover:border-weld-orange/50 transition-all duration-300 flex flex-col h-full relative" id="wishlist-item-${p.id}">
                        <div class="relative h-48 overflow-hidden bg-zinc-800 cursor-pointer" onclick="window.location.href='product-detail.html?id=${p.id}'">
                            <img src="${imgSrc}" alt="${p.name}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            <!-- Remove from Wishlist -->
                            <button onclick="removeItem(${p.id}, event)" 
                                    class="absolute top-4 left-4 z-40 bg-red-600/80 backdrop-blur-md w-10 h-10 rounded-full border border-red-500/20 transition-all duration-300 hover:scale-110 hover:bg-red-600 flex items-center justify-center">
                                <i class="ph-fill ph-heart text-white text-xl"></i>
                            </button>

                            <div class="absolute top-4 right-4 bg-black/80 backdrop-blur-sm text-xs font-bold px-3 py-1 rounded-full border border-white/10 uppercase tracking-wider text-gray-300 z-30">
                                ${p.category ? p.category.name : 'Equipment'}
                            </div>
                        </div>
                        <div class="p-5 flex-1 flex flex-col">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-xs text-weld-orange font-bold uppercase tracking-wider">ClassicWeld</span>
                                <div class="flex items-center text-xs text-yellow-500"><i class="ph-fill ph-star mr-1"></i> ${rating}</div>
                            </div>
                            <h3 class="text-lg font-bold mb-4 group-hover:text-weld-orange transition-colors cursor-pointer truncate" onclick="window.location.href='product-detail.html?id=${p.id}'">${p.name}</h3>
                            
                            <div class="grid grid-cols-2 gap-2 mt-auto">
                                <button onclick="window.location.href='product-detail.html?id=${p.id}'" class="w-full bg-zinc-800 hover:bg-zinc-700 text-white text-sm font-bold py-2 rounded-lg transition-colors border border-zinc-700">Details</button>
                                <button onclick="addToCart(${p.id}, '${p.name.replace(/'/g, "\\'")}', 0, '${imgSrc}')" class="w-full bg-weld-orange hover:bg-amber-600 text-white text-sm font-bold py-2 rounded-lg transition-colors flex items-center justify-center gap-1">
                                    <i class="ph-bold ph-shopping-cart"></i> Cart
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

        } catch (err) {
            console.error(err);
            grid.innerHTML = '<p class="col-span-full text-center text-red-500 py-20">Failed to load wishlist.</p>';
        }
      });

      async function removeItem(id, event) {
          event.stopPropagation();
          const card = document.getElementById(`wishlist-item-${id}`);
          
          // Use the global toggle function
          await window.toggleWishlist(id);
          
          // If it was removed (not in global list anymore), hide the card
          if (!window.userWishlist.includes(id)) {
              card.style.opacity = '0';
              card.style.transform = 'scale(0.9)';
              card.style.transition = 'all 0.5s ease';
              setTimeout(() => {
                  card.remove();
                  // Check if empty
                  if (document.querySelectorAll('[id^="wishlist-item-"]').length === 0) {
                      location.reload();
                  }
              }, 500);
          }
      }
    </script>
  </body>
</html>


