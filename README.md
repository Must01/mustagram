# Mustagram v1.0 — Laravel + MongoDB + TailwindCSS

[![Demo](https://img.shields.io/badge/demo-mustagram.laravel.cloud-brightgreen)](https://mustagram.laravel.cloud) [![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE) [![MongoDB](https://img.shields.io/badge/database-MongoDB-green.svg)](https://www.mongodb.com/) [![Cloudinary](https://img.shields.io/badge/images-Cloudinary-blueviolet.svg)](https://cloudinary.com/)

**Live demo:** [mustagram.laravel.cloud](https://mustagram-v1.laravel.cloud)

Mustagram v1.0 is the first stable release of my Instagram clone built with **Laravel 12**, **MongoDB**, and **TailwindCSS**. This version uses Blade templates and demonstrates a practical architecture for posts, multi-image uploads, follows system, and Cloudinary integration.

---

## Features

-   Full authentication: register, login, logout
-   Create, edit, delete, and update posts with multiple-image support
-   Client-side image previews before upload
-   Like and unlike posts
-   Create, delete, like, and unlike comments
-   Profile page with editable profile picture and bio section
-   Follow/unfollow users (stored in `follows` collection)
-   Responsive UI with TailwindCSS + Blade templates
-   Cloudinary integration for production image hosting (optional)

---

## Tech Stack

-   Backend: Laravel 12
-   Database: MongoDB (local or Atlas)
-   Frontend: Blade templates + TailwindCSS
-   Storage: Local public storage (development) or Cloudinary (production)
-   Image handling: Custom reusable upload component with previews

---

## Get Started

### Prerequisites

-   PHP compatible with Laravel 12
-   Composer
-   Node.js + npm
-   MongoDB (local or Atlas)
-   Cloudinary account (optional)

### Install & Run Locally

```bash
git clone -b v1.0.0 https://github.com/Must01/mustagram.git
cd mustagram
composer install
npm install
npm run dev
php artisan key:generate
cp .env.example .env
```

Configure `.env` for MongoDB and Cloudinary (optional) as described in the v1 branch.

---

## Deployment Notes

-   Hosted on [Laravel Cloud](https://mustagram.laravel.cloud)
-   Database: MongoDB Atlas
-   Images: Cloudinary (optional)

---

## Note

This branch contains **v1.0.0** of Mustagram. For the latest **Livewire rebuild (v2)**, check the [`main` branch](https://github.com/Must01/mustagram/tree/main).

---

## Contributing

-   Open an issue for bugs or suggestions
-   Submit a pull request with improvements

---

---

## 👤 Author

**Mustapha Bouddahr**

-   Portfolio: [mustaphabouddahr.netlify.app](https://mustaphabouddahr.netlify.app)
-   Github: [@must01](https://github.com/must01)

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

<div align="center">
    Made with ❤️ by Mustapha Bouddahr
</div>
