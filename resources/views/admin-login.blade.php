<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login - CLASSICWELD</title>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
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
  <body class="bg-black text-white overflow-hidden h-screen flex relative">
      <!-- Background Effects -->
      <div class="absolute top-0 right-0 w-1/2 h-full bg-weld-orange/10 blur-[150px]"></div>
      
      <div class="absolute top-6 left-6 z-20">
          <a href="/" class="text-2xl font-bold tracking-wider text-white">
                <img src="/logo.png" alt="CLASSICWELD" class="h-10 md:h-12 w-auto">
          </a>
      </div>
      <div class="absolute top-6 right-6 z-20">
          <button onclick="toggleTheme()" class="text-gray-300 hover:text-white transition-colors" title="Toggle Theme">
              <i class="ph ph-sun theme-toggle-icon text-xl"></i>
          </button>
      </div>

       <div class="w-full max-w-md m-auto relative z-10 p-6">
          <div class="glass p-8 rounded-2xl border border-white/10 shadow-2xl">
              <h2 class="text-3xl font-bold mb-2">Admin Login</h2>
              <p class="text-gray-400 mb-8">Access the product management dashboard.</p>

              <!-- Admin Only Access -->
              <input type="hidden" name="role" id="selected-role" value="admin">

              <div id="error-message" class="hidden text-red-500 text-sm mb-4 bg-red-500/10 p-2 rounded"></div>

              <form id="login-form" class="space-y-4">

                  <div>
                      <label class="block text-sm text-gray-400 mb-2">Email</label>
                      <input type="email" name="email" id="email" required class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-weld-orange transition-colors" placeholder="name@company.com">
                  </div>
                  <div>
                      <label class="block text-sm text-gray-400 mb-2">Password</label>
                      <div class="relative">
                          <input type="password" name="password" id="password" required class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 pr-10 text-white focus:outline-none focus:border-weld-orange transition-colors" placeholder="••••••••">
                          <button type="button" tabindex="-1" onclick="const p=document.getElementById('password'); const i=this.querySelector('i'); if(p.type==='password'){p.type='text'; i.classList.replace('ph-eye', 'ph-eye-slash');}else{p.type='password'; i.classList.replace('ph-eye-slash', 'ph-eye');}" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition-colors">
                              <i class="ph ph-eye text-lg"></i>
                          </button>
                      </div>
                  </div>
                  
                  <div class="flex justify-between items-center text-sm">
                        <label class="flex items-center text-gray-400">
                            <input type="checkbox" name="remember" class="mr-2 rounded bg-white/10 border-white/20"> Remember me
                        </label>
                      <a href="#" class="text-weld-orange hover:text-amber-400">Forgot password?</a>
                  </div>

                  <button type="submit" id="submit-btn" class="w-full bg-weld-orange hover:bg-amber-600 text-white font-bold py-3 rounded-lg transition-all mt-4">
                      Sign In
                  </button>
              </form>

              <div class="mt-6 text-center text-sm text-gray-400">
                  Contact system administrator for access.
              </div>
          </div>
      </div>

     @vite('resources/js/main.js')

  </body>
</html>


