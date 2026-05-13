<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/png" href="/favicon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Products - CLASSICWELD</title>
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <style>
    body {
      visibility: hidden;
    }
  </style>
  @vite('resources/css/style.css')
  <script>
    window.addEventListener("load", () => {
      document.body.style.visibility = "visible";
    });
  </script>
</head>

<body class="bg-weld-dark text-white overflow-x-hidden font-sans">
  <div id="app">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 glass transition-all duration-300" id="navbar">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <div class="flex-shrink-0">
            <a href="/" class="text-2xl font-bold tracking-wider text-white logo-glow inline-block">
              <img src="/logo.png" alt="CLASSICWELD" class="h-8 md:h-12 w-auto">
            </a>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-8">
              <a href="/"
                class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Home</a>
              <a href="/products" class="text-weld-orange px-3 py-2 rounded-md text-sm font-bold">Products</a>
              <a href="/#services"
                class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Services</a>
              <a href="/about"
                class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">About</a>
              <a href="/contact"
                class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Contact</a>
              <a href="/feedback"
                class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Feedback</a>
            </div>
          </div>
          <div class="flex items-center space-x-4">
            <div class="relative group hidden md:block" id="nav-search-container">
              <div
                class="flex items-center bg-zinc-900/50 border border-white/10 rounded-full px-4 py-1.5 focus-within:border-weld-orange transition-all duration-300">
                <i class="ph ph-magnifying-glass text-gray-400 mr-2"></i>
                <input type="text" id="nav-search-input" placeholder="Search..."
                  class="bg-transparent border-none focus:outline-none text-sm w-24 md:w-40 transition-all duration-300 focus:w-40 md:focus:w-64">
              </div>
              <!-- Suggestions Dropdown -->
              <div id="nav-search-suggestions"
                class="absolute top-full left-0 md:left-auto md:right-0 mt-2 w-64 md:w-80 bg-zinc-900 border border-white/10 rounded-xl shadow-2xl overflow-hidden hidden z-50">
              </div>
            </div>
            <a href="/cart"
              class="text-gray-300 hover:text-white transition-colors relative hidden md:block cursor-pointer">
              <i class="ph ph-shopping-cart text-xl"></i>
              <span id="cart-count"
                class="absolute -top-2 -right-2 bg-weld-orange text-xs rounded-full h-4 w-4 flex items-center justify-center text-white font-bold">0</span>
            </a>
            <a href="/admin/login" class="text-gray-300 hover:text-white transition-colors hidden md:block"
              title="Admin Login"><i class="ph ph-user text-xl"></i></a><button onclick="toggleTheme()"
              class="text-gray-300 hover:text-white transition-colors hidden md:block" title="Toggle Theme"><i
                class="ph ph-sun theme-toggle-icon text-xl"></i></button>
          </div>
          <div class="flex md:hidden items-center space-x-4">
            <button onclick="toggleTheme()" class="text-gray-400 hover:text-white transition-colors" title="Toggle Theme">
              <i class="ph ph-sun theme-toggle-icon text-3xl"></i>
            </button>
            <a href="/wishlist" class="text-gray-400 hover:text-white transition-colors" title="Wishlist">
              <i class="ph ph-heart text-3xl"></i>
            </a>
            <a href="/admin/login" class="text-gray-400 hover:text-white transition-colors" title="Admin Login">
              <i class="ph ph-user text-3xl"></i>
            </a>
          </div>
        </div>
      </div>


    </nav>

    <!-- Products Hero -->
    <section class="relative pt-32 pb-14 md:pt-48 md:pb-24 hero-gradient">
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-weld-orange blur-[150px] opacity-10 rounded-full"></div>
      </div>
      <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Industrial Grade <span class="text-gradient">Equipment</span>
        </h1>
        <p class="text-gray-400 text-sm md:text-base max-w-2xl mx-auto px-4">Browse our complete catalog of
          high-performance welding machines, safety gear, and consumables.</p>
      </div>
    </section>

    <!-- Shop Layout (Sidebar + Grid) -->
    <section class="py-6 md:py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Mobile Sticky Container (Fixed under Navbar) -->
        <div
          class="lg:hidden sticky top-20 z-40 -mx-4 px-4 py-2 bg-zinc-950/80 backdrop-blur-md border-b border-white/5">
          <!-- Mobile Horizontal Scroll -->
          <div class="flex overflow-x-auto no-scrollbar gap-2 mb-3" id="mobile-category-scroll">
            <!-- Categories injected by JS -->
          </div>

          <!-- Compact Mobile Search/Sort Row -->
          <div class="flex gap-2">
            <div class="relative flex-1">
              <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
              <input type="text" id="mobile-search-input-alt" placeholder="Search..."
                class="w-full theme-input border border-white/10 rounded-lg pl-8 pr-3 py-1.5 text-xs focus:outline-none focus:border-weld-orange">
            </div>
            <select id="mobile-sort-select"
              class="theme-input border border-white/10 rounded-lg px-2 py-1.5 text-[10px] focus:outline-none focus:border-weld-orange cursor-pointer">
              <option value="newest">Newest</option>
              <option value="popular">Popular</option>
            </select>
          </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
          <!-- LEFT SIDEBAR -->
          <div class="w-full lg:w-1/4">
            
            <!-- Desktop Sticky Sidebar (Unchanged) -->
            <div class="hidden lg:block glass p-6 rounded-xl sticky top-20">
              <h3 class="text-xl font-bold mb-4 text-white">Categories</h3>
              <ul class="space-y-3 mb-8" id="category-filter">
                <li><a href="#" class="text-weld-orange font-bold flex justify-between items-center category-link"
                    data-category="All">All Products</a></li>
              </ul>

              <div class="mt-8 mb-8 border-t border-zinc-800 pt-8">
                <a href="/wishlist"
                  class="flex items-center justify-center gap-2 w-full bg-weld-orange/10 hover:bg-weld-orange text-weld-orange hover:text-white border border-weld-orange/30 hover:border-weld-orange font-bold py-3 px-4 rounded-xl transition-all">
                  <i class="ph-bold ph-heart text-xl"></i> View My Wishlist
                </a>
              </div>
            </div>
          </div>

          <!-- MAIN CONTENT -->
          <div class="w-full lg:w-3/4">

            <!-- Desktop Top Bar (Hidden on Mobile) -->
            <div
              class="hidden md:flex flex-col md:flex-row justify-between items-center mb-6 gap-3 md:gap-4 glass p-3 md:p-4 rounded-xl border border-white/5">
              <div class="relative w-full md:w-64">
                <i class="ph ph-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="search-input" placeholder="Search products..."
                  class="w-full theme-input border border-white/10 rounded-lg pl-10 pr-4 py-2 text-sm focus:outline-none focus:border-weld-orange">
              </div>
              <div class="flex items-center justify-between w-full md:w-auto gap-2 text-sm text-gray-400">
                <span class="whitespace-nowrap">Sort by:</span>
                <select id="sort-select"
                  class="theme-input border border-white/10 rounded-lg px-3 py-2 text-xs md:text-sm focus:outline-none focus:border-weld-orange cursor-pointer flex-1 md:flex-none">
                  <option value="newest">Newest Arrivals</option>
                  <option value="popular">Most Popular</option>
                </select>
              </div>
            </div>

            <!-- Product Grid -->
            <div id="product-grid" class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
              <!-- Loading State -->
              <div class="col-span-full text-center py-20">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-weld-orange mx-auto mb-4"></div>
                <p class="text-gray-500">Loading catalog...</p>
              </div>
            </div>

            <!-- Pagination Area -->
            <div id="pagination-container" class="mt-12 flex justify-center gap-2">
              <!-- Injected by JS -->
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- Mobile Fixed Bottom Navigation -->
    <div
      class="md:hidden fixed bottom-0 left-0 w-full bg-zinc-950/90 backdrop-blur-xl border-t border-white/5 py-3 px-6 z-50 flex items-center justify-between shadow-2xl">
        <a href="/" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
          <i class="ph ph-house text-2xl" style="color: white !important;"></i>
          <span class="text-[10px] font-bold" style="color: white !important;">Home</span>
        </a>
      <a href="/products"
        class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
        <i class="ph ph-package text-2xl" style="color: white !important;"></i>
        <span class="text-[10px] font-bold" style="color: white !important;">Products</span>
      </a>
      <a href="/cart"
        class="relative bg-weld-orange text-black w-14 h-14 rounded-full flex items-center justify-center -mt-8 border-4 border-zinc-950 shadow-lg shadow-weld-orange/20 transition-transform active:scale-90">
        <i class="ph ph-shopping-cart text-2xl font-bold"></i>
        <span id="mobile-cart-count"
          class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] rounded-full h-5 w-5 flex items-center justify-center font-bold border-2 border-zinc-950">0</span>
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

                  <a href="/feedback" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
                      <i class="ph ph-chat-centered-dots text-weld-orange text-lg"></i>
                      <span class="text-sm font-medium" style="color: white !important;">Feedback</span>
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
    <footer class="bg-black py-12 border-t border-zinc-900">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
          <div>
            <a href="/" class="text-2xl font-bold tracking-wider text-white mb-6 inline-block logo-glow-sm">
              <img src="/logo.png" alt="CLASSICWELD" class="h-10 md:h-12 w-auto">
            </a>
            <p class="text-gray-500 text-sm leading-relaxed">
              Your Trusted Partner for Bulk Welding Supplies, Committed to Fast Delivery, Consistent Quality, and
              Long-Term Business Relationships.
            </p>
          </div>
          <div>
            <h5 class="text-white font-bold mb-4">Quick Links</h5>
            <ul class="space-y-2 text-gray-500 text-sm">
              <li><a href="/about" class="hover:text-weld-orange transition-colors">About Us</a></li>
              <li><a href="/catalog.pdf" target="_blank" class="hover:text-weld-orange transition-colors">Catalog
                  (PDF)</a></li>
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
        <div
          class="mt-12 pt-8 border-t border-zinc-900 flex flex-col md:flex-row justify-between items-center text-gray-600 text-sm">
          <p>&copy; 2025 CLASSICWELD Industries. All rights reserved. | <a href="/admin/login"
              class="hover:text-weld-orange transition-colors">Admin Login</a></p>
          <div class="flex space-x-6 mt-4 md:mt-0">
            <a href="#" class="hover:text-white transition-colors"><i class="ph ph-facebook-logo text-xl"></i></a>
            <a href="#" class="hover:text-white transition-colors"><i class="ph ph-twitter-logo text-xl"></i></a>
            <a href="#" class="hover:text-white transition-colors"><i class="ph ph-instagram-logo text-xl"></i></a>
            <a href="#" class="hover:text-white transition-colors"><i class="ph ph-linkedin-logo text-xl"></i></a>
          </div>
        </div>
      </div>
    </footer>
  </div>
  @vite('resources/js/main.js')
</body>

</html>