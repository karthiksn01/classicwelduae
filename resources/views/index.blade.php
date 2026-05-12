<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/png" href="/favicon.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CLASSICWELD - Premium Welding Supplies</title>
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

<body class="bg-weld-dark text-white overflow-x-hidden">
  <div id="app">
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 glass transition-all duration-300" id="navbar">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <div class="flex-shrink-0">
            <a href="#" class="text-2xl font-bold tracking-wider text-white logo-glow inline-block">
              <img src="/logo.png" alt="CLASSICWELD" class="h-8 md:h-12 w-auto">
            </a>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-8">
              <a href="#home"
                class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Home</a>
              <a href="/products"
                class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Products</a>
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
            <button onclick="toggleTheme()" class="text-gray-400 hover:text-white transition-colors"
              title="Toggle Theme">
              <i class="ph ph-sun theme-toggle-icon text-3xl"></i>
            </button>
            <a href="/admin/login" class="text-gray-400 hover:text-white transition-colors" title="Admin Login">
              <i class="ph ph-user text-3xl"></i>
            </a>
          </div>
        </div>
      </div>


    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative h-screen flex items-center justify-center overflow-hidden">
      <div class="absolute inset-0 z-0">
        <img src="/hero.png" alt="Welding Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-[#000000] via-[#000000]/70 to-transparent"></div>
      </div>

      <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pt-48 md:pt-64">
        <div class="max-w-5xl animate-fade-in-up text-left">
          <h1 class="text-4xl sm:text-5xl md:text-8xl font-bold tracking-tight mb-4 md:mb-8 leading-tight always-white">
            Embrace the <br>
            <span class="text-gradient">Future of Industrial Excellence</span>
          </h1>
          <p class="text-lg md:text-2xl always-white opacity-80 mb-6 md:mb-8 font-light">
            Premium welding equipment for professionals who demand precision, power, and performance.
          </p>
          <div class="flex flex-col sm:flex-row gap-3 md:gap-4 justify-start">
            <button onclick="window.location.href='products.html'"
              class="bg-weld-orange hover:bg-amber-600 text-white px-8 py-4 rounded-full font-bold transition-all transform hover:scale-105 shadow-lg shadow-amber-500/30 flex items-center justify-center gap-2">
              Shop Now <i class="ph ph-arrow-right font-bold"></i>
            </button>
            <a href="/catalog.pdf" target="_blank"
              class="glass hover:bg-white/10 text-white px-8 py-4 rounded-full font-bold transition-all flex items-center justify-center gap-2">
              View Catalog <i class="ph ph-file-pdf"></i>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Categories -->
    <section id="products" class="py-20 bg-weld-dark">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
          <p class="mt-4 text-gray-400">Explore our premium range of industrial-grade equipment</p>
        </div>

        <!-- Banner Carousel Container -->
        <div class="relative w-full h-[400px] bg-zinc-900 rounded-2xl overflow-hidden group border border-white/5">
          <!-- Arrows -->
          <button id="carousel-prev"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-20 text-white/50 hover:text-white text-5xl transition-colors drop-shadow-md"><i
              class="ph ph-caret-left"></i></button>
          <button id="carousel-next"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 text-white/50 hover:text-white text-5xl transition-colors drop-shadow-md"><i
              class="ph ph-caret-right"></i></button>

          <!-- Slides Wrapper -->
          <div id="featured-products-loop" class="flex w-full h-full transition-transform duration-500 ease-out">
            <!-- Loading State -->
            <div class="w-full h-full flex-shrink-0 flex items-center justify-center">
              <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-weld-orange"></div>
            </div>
          </div>

          <!-- Pagination Dots -->
          <div id="carousel-dots" class="absolute bottom-4 left-0 right-0 z-20 flex justify-center gap-2"></div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-weld-dark border-t border-zinc-900 relative overflow-hidden">
      <!-- Decorational Blurs -->
      <div class="absolute top-0 left-0 w-96 h-96 bg-weld-orange/5 rounded-full blur-[128px] pointer-events-none"></div>
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/5 rounded-full blur-[128px] pointer-events-none">
      </div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
          <span class="text-weld-orange font-bold tracking-wider uppercase text-sm">Why Choose Us</span>
          <h2 class="text-3xl md:text-5xl font-bold mt-2 mb-6">World-Class Services</h2>
          <p class="text-gray-400 max-w-2xl mx-auto text-lg">
            We go beyond just selling tools. We provide end-to-end solutions to ensure your operations run smoothly,
            safely, and efficiently.
          </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
          <!-- 1. Welding Equipment Supply -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-amber-500/10 flex items-center justify-center text-weld-orange text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-gear"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Equipment Supply</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              High-quality welding machines, consumables, and accessories.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-weld-orange"></i> MIG / TIG / ARC</li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-weld-orange"></i> Safety Gear</li>
            </ul>
          </div>

          <!-- 2. Bulk & Industrial Supply -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-400 text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-package"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Bulk Supply</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              Bulk and industrial supply with competitive pricing.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-blue-400"></i> Factory Supply</li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-blue-400"></i> Dealer Partnerships
              </li>
            </ul>
          </div>

          <!-- 3. Custom Orders & RFQ -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-green-500/10 flex items-center justify-center text-green-400 text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-receipt"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Custom Orders</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              Customized quotations for specialized welding requirements.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-green-400"></i> Custom Machine Specs
              </li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-green-400"></i> Project-based Pricing
              </li>
            </ul>
          </div>

          <!-- 4. Welding Consumables -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-red-500/10 flex items-center justify-center text-red-400 text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-fire"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Consumables</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              Complete range of consumables for uninterrupted production.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-red-400"></i> Electrodes & Wires</li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-red-400"></i> Quality Flux & Gas</li>
            </ul>
          </div>

          <!-- 5. Equipment Consultation -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400 text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-wrench"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Expert Help</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              Experts to help you choose the right tools for maximum efficiency.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-purple-400"></i> Selection Guide</li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-purple-400"></i> Recommendations</li>
            </ul>
          </div>

          <!-- 6. After-Sales Support -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-400 text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-arrows-clockwise"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Support</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              Reliable after-sales support and spare parts assistance.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-teal-400"></i> Warranty Support</li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-teal-400"></i> Spare Parts</li>
            </ul>
          </div>

          <!-- 7. Safety & Training -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-yellow-500/10 flex items-center justify-center text-yellow-400 text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-shield-check"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Safety First</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              Operational guidance and safety recommendations for all teams.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-yellow-400"></i> Best Practices</li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-yellow-400"></i> Usage Training</li>
            </ul>
          </div>

          <!-- 8. Logistics & Delivery -->
          <div
            class="group p-5 md:p-8 rounded-2xl bg-zinc-900 border border-zinc-800/50 hover:bg-zinc-800/50 hover:border-zinc-700 transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
            <div
              class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-pink-500/10 flex items-center justify-center text-pink-400 text-2xl md:text-3xl mb-4 md:mb-6 group-hover:scale-110 transition-transform">
              <i class="ph-fill ph-truck"></i>
            </div>
            <h3 class="text-base md:text-xl font-bold mb-2 md:mb-3 text-white">Logistics</h3>
            <p class="text-gray-400 text-xs md:text-sm leading-relaxed mb-4 flex-grow">
              Fast, secure delivery across the UAE and international shipping.
            </p>
            <ul class="text-[10px] md:text-xs text-gray-500 space-y-1 mt-auto">
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-pink-400"></i> Domestic Delivery</li>
              <li class="flex items-center gap-2"><i class="ph-bold ph-check text-pink-400"></i> Export Support</li>
            </ul>
          </div>

        </div>
      </div>

      <!-- Stats Section -->
      <section class="py-20 bg-zinc-900 border-y border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="p-4">
              <h4 class="text-4xl font-bold text-weld-orange mb-2">50+</h4>
              <p class="text-gray-400">Countries Served</p>
            </div>
            <div class="p-4">
              <h4 class="text-4xl font-bold text-weld-orange mb-2">10k+</h4>
              <p class="text-gray-400">Products</p>
            </div>
            <div class="p-4">
              <h4 class="text-4xl font-bold text-weld-orange mb-2">24/7</h4>
              <p class="text-gray-400">Expert Support</p>
            </div>
            <div class="p-4">
              <h4 class="text-4xl font-bold text-weld-orange mb-2">100%</h4>
              <p class="text-gray-400">Satisfaction</p>
            </div>
          </div>
        </div>
      </section>



      <!-- Mobile Fixed Bottom Navigation -->
      <div
        class="md:hidden fixed bottom-0 left-0 w-full bg-zinc-950/90 backdrop-blur-xl border-t border-white/5 py-3 px-6 z-50 flex items-center justify-between shadow-2xl">
        <a href="/" class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
          <i class="ph ph-house text-2xl"></i>
          <span class="text-[10px] font-bold">Home</span>
        </a>
        <a href="/products"
          class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
          <i class="ph ph-package text-2xl"></i>
          <span class="text-[10px] font-bold">Products</span>
        </a>
        <a href="/cart"
          class="relative bg-weld-orange text-black w-14 h-14 rounded-full flex items-center justify-center -mt-8 border-4 border-zinc-950 shadow-lg shadow-weld-orange/20 transition-transform active:scale-90">
          <i class="ph ph-shopping-cart text-2xl font-bold"></i>
          <span id="mobile-cart-count"
            class="absolute -top-1 -right-1 bg-red-600 text-white text-[10px] rounded-full h-5 w-5 flex items-center justify-center font-bold border-2 border-zinc-950">0</span>
        </a>
        <a href="/about"
          class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors">
          <i class="ph ph-info text-2xl"></i>
          <span class="text-[10px] font-bold">About</span>
        </a>
        <button id="mobile-more-btn"
          class="flex flex-col items-center gap-1 text-gray-400 hover:text-weld-orange transition-colors relative">
          <i class="ph ph-caret-circle-up text-2xl"></i>
          <span class="text-[10px] font-bold">More</span>
        </button>

        <!-- Dropup Menu -->
        <div id="mobile-more-menu"
          class="absolute bottom-full right-4 mb-4 w-48 bg-zinc-900/95 backdrop-blur-2xl rounded-2xl border border-white/10 shadow-2xl overflow-hidden hidden animate-fade-in-up z-[60]">
          <div class="p-2 space-y-1">
            <a href="/products"
              class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
              <i class="ph ph-magnifying-glass text-weld-orange text-lg"></i>
              <span class="text-sm font-medium">Search</span>
            </a>
            <a href="/about" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
              <i class="ph ph-info text-weld-orange text-lg"></i>
              <span class="text-sm font-medium">About</span>
            </a>
            <a href="/feedback"
              class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-zinc-800 transition-colors">
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
        <footer class="bg-black py-12 border-t border-zinc-900">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
              <div>
                <a href="#" class="text-2xl font-bold tracking-wider text-white mb-6 inline-block logo-glow-sm">
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
      </div>
      </footer>
  </div>
  @vite('resources/js/main.js')
</body>

</html>