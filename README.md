# 🚀 Ennova — National Marketing Competition

A Laravel-based internship and recruitment management platform.

---

## 📖 About

Ennova is a modern web platform built to manage the National Marketing Competition.
It helps manage candidates, blog posts, podcasts, partners, messages, and admin roles through a complete dashboard.

The project was built using Laravel, Blade, TailwindCSS, JavaScript, and MySQL.

---

## ✨ Features

### 👤 Public Features

* Candidate application form
* Blog articles
* Podcasts section
* Partners showcase
* Contact form
* Dark / Light mode
* French / English language switcher

### 🔐 Admin Dashboard

* Candidate management
* Approve / Reject applications
* Email notifications
* Blog CRUD
* Podcast CRUD
* Partners CRUD
* Messages management
* Social links management
* Roles & permissions system
* Admin users management

---

## 🛠️ Technologies Used

* Laravel 11
* PHP 8
* MySQL
* Blade
* TailwindCSS
* JavaScript
* Spatie Laravel Permission

---

## ⚙️ Installation

```bash
git clone https://github.com/sarahilali-07/site-web-ennova.git

cd ennova

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan storage:link

php artisan serve
```

---

## 🔧 Mail Configuration

The project uses Gmail SMTP for email notifications.

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

---

## 🌙 Dark / Light Mode

* Default theme: Dark mode
* Persistent theme using localStorage
* Manual toggle between dark and light mode

---

## 🌐 Multi-language Support

Supported languages:

* 🇫🇷 French
* 🇬🇧 English

---

## 🛡️ Roles & Permissions

The project uses Spatie Laravel Permission package.

Available roles:

* Super Admin
* HR Admin
* Content Manager
* Partner Manager
* Message Admin

---

## 📸 Screenshots

Coming soon...

---

## 👨‍💻 Author

**Sara Hilali**
Full-Stack Developer

GitHub:
[https://github.com/sarahilali-07](https://github.com/sarahilali-07)

---

## 📄 License

This project is licensed under the MIT License.

---

# ❤️ Ennova — Marketers Ready To Be
