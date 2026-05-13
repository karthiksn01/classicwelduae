<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback - CLASSICWELD</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
         .text-gradient {
            background: linear-gradient(to right, #FFCC00, #FFD700);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
      <style>
      body { visibility: hidden; }
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
                <a href="/feedback" class="text-weld-orange px-3 py-2 rounded-md text-sm font-bold">Feedback</a>
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

      <!-- Feedback Section -->
      <section class="min-h-screen py-32 relative overflow-hidden flex items-center justify-center">
         <div class="absolute inset-0 z-0 bg-black">
             <div class="absolute top-0 right-0 w-96 h-96 bg-weld-orange blur-[150px] opacity-10 rounded-full"></div>
             <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500 blur-[150px] opacity-10 rounded-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="animate-fade-in-up">
              <h1 class="text-3xl md:text-6xl font-bold mb-6 leading-tight">Rate Your <br><span class="text-gradient">Experience</span></h1>
              <p class="text-base md:text-lg text-gray-400 mb-8 leading-relaxed">
                We build our equipment for professionals like you. Tell us what we got right and where we can improve to help us serve you better.
              </p>
              
              <div class="space-y-6 md:space-y-8 mt-12">
                <div class="glass p-5 md:p-6 rounded-xl border border-white/5">
                    <div class="flex items-center gap-4 mb-2">
                         <div class="bg-weld-orange/10 p-2.5 md:p-3 rounded-full text-weld-orange">
                            <i class="ph-fill ph-google-logo text-xl md:text-2xl"></i>
                         </div>
                         <h4 class="text-lg md:text-xl font-bold text-white">⭐ Rated 4.8 on Google</h4>
                    </div>
                    <p class="text-gray-400 text-xs md:text-sm leading-relaxed">Based on real customer reviews from professional welders worldwide.</p>
                </div>
                
                <div class="glass p-5 md:p-6 rounded-xl border border-white/5">
                    <div class="flex items-center gap-4 mb-2">
                         <div class="bg-blue-500/10 p-2.5 md:p-3 rounded-full text-blue-500">
                            <i class="ph-fill ph-shield-check text-xl md:text-2xl"></i>
                         </div>
                         <h4 class="text-lg md:text-xl font-bold text-white">Verified Trust</h4>
                    </div>
                    <p class="text-gray-400 text-xs md:text-sm leading-relaxed">Your identity is managed by Google for transparent and authentic feedback.</p>
                </div>

                <div class="glass p-5 md:p-6 rounded-xl border border-white/5">
                    <div class="flex items-center gap-4 mb-2">
                         <div class="bg-green-500/10 p-2.5 md:p-3 rounded-full text-green-500">
                            <i class="ph-fill ph-check-circle text-xl md:text-2xl"></i>
                         </div>
                         <h4 class="text-lg md:text-xl font-bold text-white">We Listen</h4>
                    </div>
                    <p class="text-gray-400 text-xs md:text-sm leading-relaxed">Every piece of feedback is reviewed by our product development team.</p>
                </div>
              </div>
            </div>

            <div class="glass p-6 md:p-10 rounded-2xl border border-white/10 shadow-2xl animate-fade-in-up" style="animation-delay: 0.2s;">
              <div class="bg-weld-orange text-black p-4 md:p-5 rounded-xl text-center mb-8 shadow-lg shadow-weld-orange/20">
                <h3 class="text-lg md:text-xl font-bold">Loved our service?</h3>
                <p class="text-xs md:text-sm opacity-90">Help others by sharing your experience on Google</p>
                <a href="https://g.page/r/CdS2YysBt4TjEBM/review" target="_blank"
                   class="inline-block mt-3 bg-black text-weld-orange px-5 py-2 rounded-lg text-sm md:text-base font-bold hover:scale-105 transition-transform">
                   ⭐ Leave a Google Review
                </a>
              </div>

              <h3 class="text-xl md:text-2xl font-bold mb-6 flex items-center justify-between gap-3 leading-tight">
                  <span class="flex items-center gap-3"><i class="ph ph-chat-centered-text text-weld-orange mb-1"></i> Private Feedback</span>
                  <a href="https://share.google/90LNyzY4odtR3JAQo" target="_blank" class="text-xs md:text-sm text-weld-orange underline flex items-center gap-1 font-medium">
                    View on Google
                  </a>
              </h3>
              
              <form id="feedback-form" class="space-y-5 md:space-y-6">
                
                <div>
                   <label class="block text-sm md:text-base text-gray-400 mb-2 font-medium">Rating</label>
                   <div class="flex space-x-2 text-zinc-600 text-2xl md:text-3xl" id="rating-stars">
                     <button type="button" class="hover:text-amber-500 transition-colors transform hover:scale-110 duration-200" data-rating="1"><i class="ph-fill ph-star"></i></button>
                     <button type="button" class="hover:text-amber-500 transition-colors transform hover:scale-110 duration-200" data-rating="2"><i class="ph-fill ph-star"></i></button>
                     <button type="button" class="hover:text-amber-500 transition-colors transform hover:scale-110 duration-200" data-rating="3"><i class="ph-fill ph-star"></i></button>
                     <button type="button" class="hover:text-amber-500 transition-colors transform hover:scale-110 duration-200" data-rating="4"><i class="ph-fill ph-star"></i></button>
                     <button type="button" class="hover:text-amber-500 transition-colors transform hover:scale-110 duration-200" data-rating="5"><i class="ph-fill ph-star"></i></button>
                   </div>
                   <input type="hidden" name="rating" id="rating-input" value="5">
                </div>

                <div>
                  <label class="block text-sm md:text-base text-gray-400 mb-2 font-medium">Message</label>
                  <textarea name="message" required rows="4" class="w-full bg-zinc-900 border border-zinc-700 text-white rounded-lg px-4 py-2.5 md:py-3 focus:outline-none focus:border-weld-orange focus:ring-1 focus:ring-weld-orange transition-all placeholder-gray-600 text-sm md:text-base" placeholder="What did you like? What can we do better?"></textarea>
                </div>

                <div id="form-message" class="hidden text-sm p-4 rounded-lg flex items-center gap-2"></div>

                <button type="submit" class="w-full bg-weld-orange hover:bg-amber-600 text-black font-bold py-3.5 md:py-4 rounded-lg transition-all shadow-lg shadow-weld-orange/30 flex items-center justify-center gap-2 group text-base md:text-lg">
                  ⭐ Write a Google Review <i class="ph ph-arrow-square-out font-bold group-hover:translate-x-1 transition-transform"></i>
                </button>
              </form>
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
                Your Trusted Partner for Bulk Welding Supplies, Committed to Fast Delivery, Consistent Quality, and Long-Term Business Relationships.
              </p>
            </div>
            <div>
              <h5 class="text-white font-bold mb-4">Quick Links</h5>
              <ul class="space-y-2 text-gray-500 text-sm">
                <li><a href="/about" class="hover:text-weld-orange transition-colors">About Us</a></li>
                <li><a href="/catalog.pdf" target="_blank" class="hover:text-weld-orange transition-colors">Catalog (PDF)</a></li>
                <li><a href="#" class="hover:text-weld-orange transition-colors">Distributors</a></li>
                <li><a href="/feedback" class="text-weld-orange transition-colors">Feedback</a></li>
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
      </footer>
      </div>
    </div>
    @vite('resources/js/main.js')
  </body>
</html>
