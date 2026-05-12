<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us - CLASSICWELD</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
      /* Inline overrides if needed, but mostly relying on style.css */
      .timeline-line::before {
        content: "";
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #333;
        transform: translateX(-50%);
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
      <nav
        class="fixed top-0 w-full z-50 glass transition-all duration-300"
        id="navbar"
      >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-20">
            <div class="flex-shrink-0">
              <a
                href="/"
                class="text-2xl font-bold tracking-wider text-white logo-glow inline-block"
              >
                <img src="/logo.png" alt="CLASSICWELD" class="h-10 md:h-12 w-auto">
              </a>
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-8">
                <a
                  href="/"
                  class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium"
                  >Home</a
                >
                <a
                  href="/products"
                  class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium"
                  >Products</a
                >
                <a
                  href="/#services"
                  class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium"
                  >Services</a
                >
                <a
                  href="/about"
                  class="text-weld-orange px-3 py-2 rounded-md text-sm font-bold"
                  >About</a
                >
                <a
                  href="/contact"
                  class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium"
                  >Contact</a
                >
                <a
                  href="/feedback"
                  class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium"
                  >Feedback</a
                >
              </div>
            </div>
            <div class="flex items-center space-x-4">
              <div class="relative group" id="nav-search-container">
                <div class="flex items-center bg-zinc-900/50 border border-white/10 rounded-full px-4 py-1.5 focus-within:border-weld-orange transition-all duration-300">
                  <i class="ph ph-magnifying-glass text-gray-400 mr-2"></i>
                  <input type="text" id="nav-search-input" placeholder="Search..." class="bg-transparent border-none focus:outline-none text-sm w-24 md:w-40 transition-all duration-300 focus:w-40 md:focus:w-64">
                </div>
                <!-- Suggestions Dropdown -->
                <div id="nav-search-suggestions" class="absolute top-full left-0 md:left-auto md:right-0 mt-2 w-64 md:w-80 bg-zinc-900 border border-white/10 rounded-xl shadow-2xl overflow-hidden hidden z-50">
                </div>
              </div>
              <button
                class="text-gray-300 hover:text-white transition-colors relative"
              >
                <i class="ph ph-shopping-cart text-xl"></i>
                <span
                  class="absolute -top-2 -right-2 bg-weld-orange text-xs rounded-full h-4 w-4 flex items-center justify-center text-white font-bold"
                  >0</span
                >
              </button>
              <a href="/admin/login" class="text-gray-300 hover:text-white transition-colors" title="Admin Login"><i class="ph ph-user text-xl"></i></a><button onclick="toggleTheme()" class="text-gray-300 hover:text-white transition-colors" title="Toggle Theme"><i class="ph ph-sun theme-toggle-icon text-xl"></i></button>
            </div>
            <div class="-mr-2 flex md:hidden">
              <button type="button" id="mobile-menu-btn" class="bg-zinc-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <span class="sr-only">Open main menu</span>
                <i class="ph ph-list text-2xl"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden md:hidden bg-zinc-900 border-t border-zinc-800" id="mobile-menu">
          <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="text-gray-300 hover:text-white hover:bg-zinc-800 block px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="/products" class="text-gray-300 hover:text-white hover:bg-zinc-800 block px-3 py-2 rounded-md text-base font-medium">Products</a>
            <a href="/#services" class="text-gray-300 hover:text-white hover:bg-zinc-800 block px-3 py-2 rounded-md text-base font-medium">Services</a>
            <a href="/about" class="text-gray-300 hover:text-white hover:bg-zinc-800 block px-3 py-2 rounded-md text-base font-medium">About</a>
            <a href="/contact" class="text-gray-300 hover:text-white hover:bg-zinc-800 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
            <a href="/feedback" class="text-gray-300 hover:text-white hover:bg-zinc-800 block px-3 py-2 rounded-md text-base font-medium">Feedback</a>
          <a href="/admin/login" class="text-gray-300 hover:text-white hover:bg-zinc-800 block px-3 py-2 rounded-md text-base font-medium">Admin Login</a></div>
        </div>
      </nav>

      <!-- About Hero -->
      <section
        class="relative py-32 flex items-center justify-center overflow-hidden"
      >
        <div class="absolute inset-0 z-0">
          <div
            class="absolute inset-0 hero-gradient opacity-90"
          ></div>
          <!-- Decorative sparks -->
          <div
            class="absolute top-20 left-10 w-64 h-64 bg-weld-orange blur-[100px] opacity-20 rounded-full"
          ></div>
          <div
            class="absolute bottom-20 right-10 w-64 h-64 bg-blue-500 blur-[100px] opacity-10 rounded-full"
          ></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 text-center">
          <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in-up">
            Building Trust in <br /><span class="text-gradient"
              >Every Spark</span
            >
          </h1>
          <p
            class="text-xl text-gray-400 max-w-2xl mx-auto animate-fade-in-up"
            style="animation-delay: 0.2s"
          >
            Since 2025, CLASSICWELD has been the backbone of industrial
            fabrication, providing world-class welding solutions for all
            over the world.
          </p>
        </div>
      </section>

      <!-- Our Story -->
      <section class="py-20 bg-zinc-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="relative">
              <div
                class="absolute -inset-4 bg-weld-orange/20 blur-xl rounded-2xl"
              ></div>
              <img
                src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=2070&auto=format&fit=crop"
                class="relative rounded-2xl shadow-2xl skew-y-3 transform transition-transform hover:skew-y-0 duration-500"
                alt="Welder working"
              />
            </div>
            <div>
              <h2
                class="text-3xl font-bold mb-6 border-l-4 border-weld-orange pl-6"
              >
                Forging a Legacy
              </h2>
              <p class="text-gray-400 mb-6 leading-relaxed">
                What started as a small workshop in Dubai has grown into a
                global powerhouse. We understood early on that welding isn't
                just about joining metals; it's about structural integrity,
                safety, and the art of creation.
              </p>
              <p class="text-gray-400 mb-6 leading-relaxed">
                Our precision-engineered equipment is trusted by aerospace
                engineers, automotive manufacturers, and construction giants
                alike.
              </p>
              <div class="grid grid-cols-1">
                <div>
                  <h3 class="text-weld-orange text-4xl font-bold">5M+</h3>
                  <p
                    class="text-sm text-gray-500 uppercase tracking-widest mt-1"
                  >
                    Happy Welders
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Values -->
      <section class="py-20 bg-zinc-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h2 class="text-3xl font-bold mb-16">Core Values</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
              class="glass p-8 rounded-xl hover:bg-zinc-800 transition-colors"
            >
              <div
                class="bg-weld-orange/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6"
              >
                <i class="ph ph-shield-check text-3xl text-weld-orange"></i>
              </div>
              <h3 class="text-xl font-bold mb-3">Safety First</h3>
              <p class="text-gray-400 text-sm">
                We compromise on nothing when it comes to the safety of the
                operator. Every helmet, every glove is tested to extremes.
              </p>
            </div>
            <div
              class="glass p-8 rounded-xl hover:bg-zinc-800 transition-colors"
            >
              <div
                class="bg-weld-orange/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6"
              >
                <i class="ph ph-atom text-3xl text-weld-orange"></i>
              </div>
              <h3 class="text-xl font-bold mb-3">Innovation</h3>
              <p class="text-gray-400 text-sm">
                Constantly pushing the boundaries of arc stability and energy
                efficiency in our inverter designs.
              </p>
            </div>
            <div
              class="glass p-8 rounded-xl hover:bg-zinc-800 transition-colors"
            >
              <div
                class="bg-weld-orange/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6"
              >
                <i class="ph ph-handshake text-3xl text-weld-orange"></i>
              </div>
              <h3 class="text-xl font-bold mb-3">Integrity</h3>
              <p class="text-gray-400 text-sm">
                Honest pricing, transparent warranties, and a commitment to
                sustainability in manufacturing.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Management Team Section -->
      <section class="py-24 bg-black relative overflow-hidden">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-weld-orange/30 to-transparent"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl font-bold mb-4 tracking-tight">Our <span class="text-weld-orange">Leadership</span></h2>
            <p class="text-gray-500 mb-12 max-w-2xl mx-auto">The expertise and dedication driving ClassicWeld's global industrial excellence.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-5xl mx-auto">
                <!-- Card 1 -->
                <div class="group relative rounded-2xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/5 transition-all duration-500 hover:border-weld-orange/30 hover:shadow-weld-orange/10">
                    <div class="aspect-[1.75/1] overflow-hidden">
                        <img src="/assets/management-card-1.jpg" alt="Santhosh G. Mangadan - Marketing Manager" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <!-- Download Button -->
                    <a href="/assets/management-card-1.jpg" download="Santhosh_G_Mangadan_Card.jpg" class="absolute top-4 right-4 z-20 bg-black/50 backdrop-blur-md text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-weld-orange hover:scale-110" title="Download Card">
                        <i class="ph ph-download-simple text-xl"></i>
                    </a>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6 text-left">
                        <h4 class="text-xl font-bold text-white">Santhosh G. Mangadan</h4>
                        <p class="text-weld-orange text-sm">Marketing Manager (Export & Import)</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group relative rounded-2xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] border border-white/5 transition-all duration-500 hover:border-weld-orange/30 hover:shadow-weld-orange/10">
                    <div class="aspect-[1.75/1] overflow-hidden">
                        <img src="/assets/management-card-2.jpg" alt="Salim Khan - Managing Director" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <!-- Download Button -->
                    <a href="/assets/management-card-2.jpg" download="Salim_Khan_Card.jpg" class="absolute top-4 right-4 z-20 bg-black/50 backdrop-blur-md text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-weld-orange hover:scale-110" title="Download Card">
                        <i class="ph ph-download-simple text-xl"></i>
                    </a>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6 text-left">
                        <h4 class="text-xl font-bold text-white">Salim Khan</h4>
                        <p class="text-weld-orange text-sm">Managing Director</p>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="bg-black py-12 border-t border-zinc-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
              <a
                href="/"
                class="text-2xl font-bold tracking-wider text-white mb-6 inline-block logo-glow-sm"
              >
                <img src="/logo.png" alt="CLASSICWELD" class="h-10 md:h-12 w-auto">
              </a>
              <p class="text-gray-500 text-sm leading-relaxed">
                Your Trusted Partner for Bulk Welding Supplies, Committed to Fast Delivery, Consistent Quality, and Long-Term Business Relationships.
              </p>
            </div>
            <div>
              <h5 class="text-white font-bold mb-4">Quick Links</h5>
              <ul class="space-y-2 text-gray-500 text-sm">
                <li>
                  <a
                    href="/about"
                    class="text-weld-orange transition-colors"
                    >About Us</a
                  >
                </li>
                <li><a href="/catalog.pdf" target="_blank" class="hover:text-weld-orange transition-colors">Catalog (PDF)</a></li>
                <li>
                  <a href="#" class="hover:text-weld-orange transition-colors"
                    >Distributors</a
                  >
                </li>
                <li>
                  <a
                    href="/feedback"
                    class="hover:text-weld-orange transition-colors"
                    >Feedback</a
                  >
                </li>
              </ul>
            </div>
            <div>
              <h5 class="text-white font-bold mb-4">Support</h5>
              <ul class="space-y-2 text-gray-500 text-sm">
                <li>
                  <a href="#" class="hover:text-weld-orange transition-colors"
                    >Help Center</a
                  >
                </li>
                <li>
                  <a href="#" class="hover:text-weld-orange transition-colors"
                    >Warranty</a
                  >
                </li>
                <li>
                  <a href="#" class="hover:text-weld-orange transition-colors"
                    >Shipping Info</a
                  >
                </li>
                <li>
                  <a href="#" class="hover:text-weld-orange transition-colors"
                    >Returns</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    @vite('resources/js/main.js')
  </body>
</html>



