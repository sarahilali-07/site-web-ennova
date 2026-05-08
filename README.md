# 🚀 Ennova - Marketing Leaders Platform

Ennova is a modern web application built with Laravel, designed to connect students, brands, professionals, and podcast guests in the marketing ecosystem.

It includes a full-featured admin dashboard and a dynamic frontend website with a clean, startup-style UI.

---

## ✨ Features

### 👨‍💼 Admin Dashboard
- Manage candidates applications
- Approve / reject partners
- Manage blog posts & categories
- Manage podcasts
- Manage messages & replies
- Manage social links

---

### 🌐 Frontend Website
- Modern landing page (startup design)
- Blog system (articles list + details page)
- Podcast section
- Partner showcase
- Candidate application form
- Contact system
- Competition page

---

### 🔐 Authentication System
- Admin authentication
- Role-based access (Admin only dashboard)
- Middleware protection

---

## 🛠️ Tech Stack

- Laravel (PHP Framework)
- Blade Templates
- Tailwind CSS
- JavaScript
- Vite
- MySQL

---

## 🎨 UI Design

- Modern startup-style interface
- Dark premium design
- Orange accent branding
- Fully responsive (mobile + desktop)
- Typography:
  - Headings: Cabinet Grotesk
  - Body: DM Sans

---

## 📂 Project Structure

- app/
- database/
- public/
- resources/
- routes/

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/ennova.git
cd ennova
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
