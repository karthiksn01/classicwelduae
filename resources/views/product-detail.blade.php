<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Details - CLASSICWELD</title>
    <link rel="icon" type="image/png" href="/favicon.png" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {
              "weld-orange": "#FFCC00",
              "weld-dark": "#09090b",
            },
          },
        },
      };
    </script>
    <link href="./src/style.css" rel="stylesheet" />
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
              <div class="ml-10 flex items-baseline gap-6">
                <a href="/" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="/products" class="text-weld-orange px-3 py-2 rounded-md text-base font-medium">Products</a>
                <a href="/#services" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="/about" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">About</a>
                <a href="/contact" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="/feedback" class="hover:text-weld-orange transition-colors px-3 py-2 rounded-md text-base font-medium">Feedback</a>
              </div>
            </div>
            <div class="flex items-center space-x-4">
              <div class="relative group" id="nav-search-container">
                <div class="flex items-center bg-zinc-900/50 border border-white/10 rounded-full px-4 py-1.5 focus-within:border-weld-orange transition-all duration-300">
                  <i class="ph ph-magnifying-glass text-gray-400 mr-2"></i>
                  <input type="text" id="nav-search-input" placeholder="Search..." class="bg-transparent border-none focus:outline-none text-sm w-24 md:w-40 transition-all duration-300 focus:w-40 md:focus:w-64">
                </div>
                <div id="nav-search-suggestions" class="absolute top-full left-0 md:left-auto md:right-0 mt-2 w-64 md:w-80 bg-zinc-900 border border-white/10 rounded-xl shadow-2xl overflow-hidden hidden z-50">
                </div>
              </div>
              <a href="/cart" class="text-gray-300 hover:text-white transition-colors relative block cursor-pointer">
                <i class="ph ph-shopping-cart text-xl"></i>
                <span id="cart-count" class="absolute -top-2 -right-2 bg-weld-orange text-xs rounded-full h-4 w-4 flex items-center justify-center text-white font-bold">0</span>
              </a>
              <a href="/admin/login" class="text-gray-300 hover:text-white transition-colors" title="Admin Login"><i class="ph ph-user text-xl"></i></a><button onclick="toggleTheme()" class="text-gray-300 hover:text-white transition-colors" title="Toggle Theme"><i class="ph ph-sun theme-toggle-icon text-xl"></i></button>
              
            </div>
            <div class="-mr-2 flex md:hidden">
              <button type="button" id="mobile-menu-btn" class="bg-zinc-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                <i class="ph ph-list text-2xl"></i>
              </button>
            </div>
          </div>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="flex-grow pt-28 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-sm text-gray-400 mb-8">
                <a href="/" class="hover:text-weld-orange transition-colors">Home</a>
                <i class="ph ph-caret-right text-xs"></i>
                <a href="/products" class="hover:text-weld-orange transition-colors">Products</a>
                <i class="ph ph-caret-right text-xs"></i>
                <span class="text-white" id="breadcrumb-product-name">Loading...</span>
            </div>

            <div id="product-detail-container">
                <!-- Loading State -->
                <div class="text-center py-20">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-weld-orange mx-auto mb-4"></div>
                    <p class="text-gray-500">Loading product details...</p>
                </div>
            </div>

        </div>
      </main>

      <!-- Footer -->
      <footer class="bg-black py-12 border-t border-zinc-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
              <a href="/" class="text-2xl font-bold tracking-wider text-white mb-6 inline-block logo-glow-sm">
                <img src="/logo.png" alt="CLASSICWELD" class="h-10 md:h-12 w-auto">
              </a>
              <p class="text-gray-400 text-sm leading-relaxed mb-6">
                Premium welding equipment and supplies for industrial professionals.
              </p>
            </div>
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

    <!-- Script for Product Detail Logic -->
    @vite('resources/js/main.js')
    <script type="module">

        document.addEventListener('DOMContentLoaded', async () => {
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');

            if (!productId) {
                document.getElementById('product-detail-container').innerHTML = '<p class="text-center text-red-500 py-20">Product not found.</p>';
                return;
            }

            try {
                const BACKEND_URL = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1' 
                    ? `http://${window.location.hostname}:8000` 
                    : '';
                const response = await fetch(`${BACKEND_URL}/api/products/${productId}`, { credentials: 'include' });
                if (!response.ok) throw new Error('Failed to fetch product');
                
                const product = await response.json();
                
                // Mocks
                const brand = "ClassicWeld";
                const rating = (4.0 + (product.id % 10) / 10).toFixed(1);
                const imgSrc = window.resolveImagePath(product.image);
                console.log("Product detail image path:", imgSrc);
                
                const isDealer = product.is_dealer_price;

                document.getElementById('breadcrumb-product-name').innerText = product.name;

                const detailHTML = `
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
                        <!-- Left: Image Gallery -->
                        <div class="space-y-4">
                            <div class="aspect-w-4 aspect-h-3 bg-zinc-900 rounded-2xl overflow-hidden border border-white/5">
                                <img src="${imgSrc}" alt="${product.name}" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Right: Info -->
                        <div class="flex flex-col justify-center">
                            <div class="flex justify-between items-start mb-4">
                                <span class="text-sm font-bold text-weld-orange uppercase tracking-widest">${brand}</span>
                                <div class="flex items-center text-yellow-500 gap-1"><i class="ph-fill ph-star"></i> ${rating} (124 reviews)</div>
                            </div>
                            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">${product.name}</h1>
                            
                            ${isDealer ? `
                            <div class="mb-8 p-6 bg-zinc-900/50 rounded-xl border border-white/5">
                                <div class="text-sm text-weld-orange flex items-center gap-2"><i class="ph-fill ph-info"></i> Minimum Order Quantity: ${product.moq} Units</div>
                            </div>` : ""}

                            <p class="text-gray-400 text-lg mb-8 leading-relaxed">${product.short_description || 'High quality industrial equipment built to perform under the toughest conditions. Engineered for precision and safety.'}</p>

                            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                                <div class="flex items-center border border-white/10 rounded-lg overflow-hidden bg-zinc-900 w-full sm:w-32">
                                    <button onclick="updateQty(-1)" class="px-4 py-3 text-gray-400 hover:text-white hover:bg-zinc-800 transition-colors">-</button>
                                    <input type="number" id="product-qty" value="1" min="1" class="w-full bg-transparent text-center font-bold focus:outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                    <button onclick="updateQty(1)" class="px-4 py-3 text-gray-400 hover:text-white hover:bg-zinc-800 transition-colors">+</button>
                                </div>
                                <button onclick="handleAddToCart()" data-product-id="${product.id}" class="add-to-cart-btn flex-1 bg-weld-orange hover:bg-amber-600 text-white font-bold py-4 rounded-lg transition-all shadow-lg shadow-amber-500/20 flex items-center justify-center gap-2 text-lg">
                                    <i class="ph-bold ph-shopping-cart text-xl"></i> Add to Cart
                                </button>
                                <button onclick="window.toggleWishlist(${product.id}, event)" 
                                        data-wishlist-id="${product.id}"
                                        class="w-14 h-14 rounded-lg border border-white/10 bg-zinc-900 hover:bg-zinc-800 transition-all flex items-center justify-center group/wishlist"
                                        title="Add to Wishlist">
                                    <i class="${window.userWishlist.includes(product.id) ? 'ph-fill ph-heart text-red-500' : 'ph ph-heart text-white'} text-2xl group-hover/wishlist:scale-110 transition-transform"></i>
                                </button>
                            </div>

                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-400 border-t border-white/5 pt-8">
                                <div class="flex items-center gap-2"><i class="ph ph-truck text-xl text-weld-orange"></i> Free Shipping</div>
                                <div class="flex items-center gap-2"><i class="ph ph-shield-check text-xl text-weld-orange"></i> ${product.warranty_years || 1} Year Warranty</div>
                                <div class="flex items-center gap-2"><i class="ph ph-arrow-u-up-left text-xl text-weld-orange"></i> 30-Day Returns</div>
                                <div class="flex items-center gap-2"><i class="ph ph-headset text-xl text-weld-orange"></i> 24/7 Support</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs: Description / Features / Specs -->
                    <div class="glass rounded-2xl p-8 mb-16 border border-white/5">
                        <div class="flex space-x-8 border-b border-white/10 mb-8 pb-4">
                            <button onclick="switchTab('description')" id="tab-btn-description" class="tab-btn text-weld-orange font-bold text-lg border-b-2 border-weld-orange pb-4 -mb-[17px] transition-colors">Description</button>
                            <button onclick="switchTab('features')" id="tab-btn-features" class="tab-btn text-gray-400 hover:text-white font-medium text-lg pb-4 -mb-[17px] transition-colors border-b-2 border-transparent hover:border-white/20">Features</button>
                            <button onclick="switchTab('specifications')" id="tab-btn-specifications" class="tab-btn text-gray-400 hover:text-white font-medium text-lg pb-4 -mb-[17px] transition-colors border-b-2 border-transparent hover:border-white/20">Specifications</button>
                        </div>
                        
                        <div id="tab-content-description" class="tab-content prose prose-invert max-w-none text-gray-400">
                            <p>${product.description || 'This premium equipment is designed for rigorous industrial applications, providing consistent performance and durability.'}</p>
                        </div>
                        
                        <div id="tab-content-features" class="tab-content hidden prose prose-invert max-w-none text-gray-400">
                            ${(() => {
                                if (product.features && product.features.length > 0) {
                                    return '<ul class="space-y-2">' + product.features.map(f => '<li class="flex items-start gap-2"><i class="ph-fill ph-check-circle text-weld-orange mt-1"></i> ' + f + '</li>').join('') + '</ul>';
                                }
                                return '<p>No specific features listed for this product.</p>';
                            })()}
                        </div>
                        
                        <div id="tab-content-specifications" class="tab-content hidden prose prose-invert max-w-none text-gray-400">
                            <div class="bg-zinc-900/50 rounded-lg overflow-hidden">
                                <table class="w-full text-left">
                                    <tr class="border-b border-white/5"><th class="p-4 text-white font-medium w-1/3">Category</th><td class="p-4">${product.category}</td></tr>
                                    <tr class="border-b border-white/5"><th class="p-4 text-white font-medium">Brand</th><td class="p-4">${brand}</td></tr>
                                    <tr class="border-b border-white/5"><th class="p-4 text-white font-medium">Stock Status</th><td class="p-4">${product.stock > 0 ? '<span class="text-green-500">In Stock</span>' : '<span class="text-red-500">Out of Stock</span>'}</td></tr>
                                    ${(() => {
                                        let specRows = '';
                                        if (product.specifications && Object.keys(product.specifications).length > 0) {
                                            for (const [key, value] of Object.entries(product.specifications)) {
                                                specRows += '<tr class="border-b border-white/5"><th class="p-4 text-white font-medium capitalize">' + key.replace(/_/g, ' ') + '</th><td class="p-4">' + value + '</td></tr>';
                                            }
                                        }
                                        return specRows;
                                    })()}
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Related Products -->
                    <div class="mt-16">
                        <h2 class="text-2xl font-bold mb-8 text-white flex items-center gap-3">
                            Related Products
                            <span class="h-px flex-1 bg-white/10"></span>
                        </h2>
                        <div id="related-products-grid" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <!-- Injected by JS -->
                            <div class="col-span-full text-center py-10">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-weld-orange mx-auto"></div>
                            </div>
                        </div>
                    </div>
                `;

                document.getElementById('product-detail-container').innerHTML = detailHTML;

                // --- NEW: Quantity Adder Logic ---
                window.updateQty = (change) => {
                    const input = document.getElementById('product-qty');
                    let val = parseInt(input.value) + change;
                    if (val < 1) val = 1;
                    input.value = val;
                };

                window.handleAddToCart = () => {
                    const qty = parseInt(document.getElementById('product-qty').value);
                    addToCart(product.id, product.name, 0, imgSrc, qty);
                };

                // --- NEW: Tab Switcher Logic ---
                window.switchTab = (tabName) => {
                    // Hide all contents
                    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
                    // Show target content
                    document.getElementById('tab-content-' + tabName).classList.remove('hidden');
                    
                    // Reset all buttons
                    document.querySelectorAll('.tab-btn').forEach(btn => {
                        btn.classList.remove('text-weld-orange', 'font-bold', 'border-weld-orange');
                        btn.classList.add('text-gray-400', 'font-medium', 'border-transparent');
                    });
                    
                    // Activate target button
                    const activeBtn = document.getElementById('tab-btn-' + tabName);
                    activeBtn.classList.remove('text-gray-400', 'font-medium', 'border-transparent');
                    activeBtn.classList.add('text-weld-orange', 'font-bold', 'border-weld-orange');
                };

                // Fetch and render related products
                fetchRelatedProducts(product.category, product.id);

            } catch (error) {
                console.error(error);
                document.getElementById('product-detail-container').innerHTML = '<p class="text-center text-red-500 py-20">Failed to load product details.</p>';
            }
        });

        async function fetchRelatedProducts(category, currentProductId) {
            const grid = document.getElementById('related-products-grid');
            if (!grid) return;

            try {
                const BACKEND_URL = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1' 
                    ? `http://${window.location.hostname}:8000` 
                    : '';
                const response = await fetch(`${BACKEND_URL}/api/products?category=${encodeURIComponent(category)}&page=1`, { credentials: 'include' });
                if (!response.ok) throw new Error('Failed to fetch related products');
                
                const result = await response.json();
                // Filter out current product and take top 4
                const related = result.data.filter(p => p.id !== currentProductId).slice(0, 4);

                if (related.length === 0) {
                    grid.innerHTML = '<p class="col-span-full text-gray-500 text-sm">No other products in this category.</p>';
                    return;
                }

                grid.innerHTML = related.map(p => {
                    const imgSrc = window.resolveImagePath(p.image);
                    return `
                        <div class="glass p-4 rounded-xl group/card cursor-pointer hover:border-weld-orange/50 transition-all duration-300 flex flex-col h-full relative" onclick="window.location.href='product-detail.html?id=${p.id}'">
                            <div class="h-40 bg-zinc-800 rounded-lg mb-4 overflow-hidden relative">
                                <img src="${imgSrc}" alt="${p.name}" class="w-full h-full object-cover group-hover/card:scale-110 transition-transform duration-500">
                                
                                <!-- Wishlist Button -->
                                <button onclick="window.toggleWishlist(${p.id}, event)" 
                                        data-wishlist-id="${p.id}"
                                        class="absolute top-2 left-2 z-40 bg-black/60 backdrop-blur-md w-9 h-9 rounded-full border border-white/10 flex items-center justify-center ${window.userWishlist.includes(p.id) ? 'opacity-100' : 'opacity-0'} group-hover/card:opacity-100 transition-all duration-300 hover:scale-110">
                                    <i class="${window.userWishlist.includes(p.id) ? 'ph-fill ph-heart text-red-500' : 'ph ph-heart text-white'} text-lg"></i>
                                </button>
                            </div>
                            <h4 class="text-white font-bold text-sm mb-1 group-hover/card:text-weld-orange transition-colors truncate">${p.name}</h4>
                            <p class="text-gray-500 text-xs">${p.category}</p>
                        </div>
                    `;
                }).join('');

            } catch (err) {
                console.error("Related products error:", err);
                grid.innerHTML = '<p class="col-span-full text-gray-500 text-sm italic">Unable to load related products.</p>';
            }
        }
    </script>
  </body>
</html>


