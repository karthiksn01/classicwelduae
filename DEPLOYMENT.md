# Recommended Project Structure and Deployment Setup for ClassicWeld

Since you are using:

- **Frontend**: Vite (HTML/CSS/JS)
- **Backend**: Laravel API
- **Database**: Neon PostgreSQL
- **Frontend Hosting**: Netlify
- **Backend Hosting**: Render
- **Domain**: classicwelduae.com

This is the best professional structure.

## 📁 Local Folder Structure

Keep your project like this:

```text
CLASSICWELD/
│
├── classicweld-frontend/      # Vite frontend
│   ├── public/
│   ├── src/
│   ├── index.html
│   ├── products.html
│   ├── contact.html
│   ├── login.html
│   ├── package.json
│   └── vite.config.js
│
├── classicweld-backend/       # Laravel API
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── composer.json
│   ├── artisan
│   └── .env
│
└── README.md
```

## 🗂️ GitHub Repository Strategy (Recommended)

Use two separate repositories.

### Repository 1 — Frontend

- **Repository name**: `classicweld-frontend`
- **GitHub Link**: [https://github.com/karthiksn01/classicweld-frontend](https://github.com/karthiksn01/classicweld-frontend)
- **Contains only**: `classicweld-frontend/` directory contents

### Repository 2 — Backend

- **Repository name**: `classicweld-backend`
- **GitHub Link**: [https://github.com/karthiksn01/classicweld-backend](https://github.com/karthiksn01/classicweld-backend)
- **Contains only**: `classicweld-backend/` directory contents

## 🌐 Deployment Mapping

| Repository | Platform | URL |
| :--- | :--- | :--- |
| `classicweld-frontend` | Netlify | `https://classicwelduae.com` |
| `classicweld-backend` | Render | `https://api.classicwelduae.com` |

## 🖼️ Product Images

Store images in Laravel, not in the frontend.

Recommended location:
`classicweld-backend/storage/app/public/products/`

After running:
```bash
php artisan storage:link
```

Public URLs become:
`https://api.classicwelduae.com/storage/products/image1.webp`

The frontend should use these URLs.

## 🗄️ Database Structure

Use **Neon PostgreSQL**.

Store:
- Users
- Products
- Categories
- Contact messages

## 🔗 Frontend API Configuration

In your frontend, update `src/api.js` to use environment variables for the base URL. Example:

```javascript
import axios from "axios";

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || "http://127.0.0.1:8000/api",
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
  withCredentials: true,
});

export default api;
```

## 📁 Frontend Build Output

Run:
```bash
npm run build
```

This generates: `dist/` folder.
Netlify deploys this folder automatically.

## 📌 Netlify Settings

- **Repository**: `classicweld-frontend`
- **Build command**: `npm run build`
- **Publish directory**: `dist`

## 📌 Render Settings

- **Repository**: `classicweld-backend`
- **Build command**: `composer install --no-dev --optimize-autoloader && php artisan config:cache`
- **Start command**: `php artisan serve --host=0.0.0.0 --port=$PORT`

## 🔐 Environment Files

### Frontend (`.env.production`)
```env
VITE_API_URL=https://api.classicwelduae.com/api
```

### Backend (`.env` for production)
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://api.classicwelduae.com

DB_CONNECTION=pgsql
DB_HOST=...
DB_PORT=5432
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...
```

## 🌍 Domain Setup

In Hostinger DNS:

**Frontend**
- `A` / `CNAME` record for `@` → Netlify target
- `CNAME` record for `www` → Netlify target

**Backend**
- `CNAME` record for `api` → Render target

## 🔄 Update Workflow

### Frontend changes
1. Edit locally.
2. Run `npm run build` (optional, for local testing).
3. Commit and push.
4. Netlify redeploys automatically.

### Backend changes
1. Edit Laravel files.
2. Commit and push.
3. Render redeploys automatically.

## 🏆 Final Architecture

```text
       classicwelduae.com
               │
               ▼
       Netlify (Frontend)
               │
               ▼
     api.classicwelduae.com
               │
               ▼
      Render (Laravel API)
               │
               ▼
        Neon PostgreSQL
```

## 🎯 Final Recommendation

Use two GitHub repositories and deploy:

- **Frontend** → Netlify
- **Backend** → Render
- **Database** → Neon

This is the cleanest, most scalable, and completely free architecture for your current project.
