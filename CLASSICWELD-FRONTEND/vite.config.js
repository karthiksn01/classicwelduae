import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  plugins: [
    tailwindcss(),
    {
      name: 'add-cache-headers',
      configureServer(server) {
        server.middlewares.use((req, res, next) => {
          if (req.url?.includes('.css')) {
            res.setHeader('Cache-Control', 'public, max-age=31536000');
          }
          next();
        });
      },
      configurePreviewServer(server) {
        server.middlewares.use((req, res, next) => {
          if (req.url?.includes('.css')) {
            res.setHeader('Cache-Control', 'public, max-age=31536000');
          }
          next();
        });
      }
    }
  ],
  build: {
    rollupOptions: {
      input: {
        main: "index.html",
        about: "about.html",
        feedback: "feedback.html",
        products: "products.html",
        login: "admin-login.html",
        contact: "contact.html",
      },
    },
  },
});
