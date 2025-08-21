[![Demo](https://img.shields.io/badge/demo-mustagram.laravel.cloud-brightgreen)](https://mustagram.laravel.cloud) [![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE) [![MongoDB](https://img.shields.io/badge/database-MongoDB-green.svg)](https://www.mongodb.com/) [![Cloudinary](https://img.shields.io/badge/images-Cloudinary-blueviolet.svg)](https://cloudinary.com/)

# Mustagram — Instagram Clone (Laravel 12 + MongoDB)

👉 **Live demo:** [mustagram.laravel.cloud](https://mustagram.laravel.cloud)

I built Mustagram as a focused, production-style Instagram clone to practice full-stack development with **Laravel 12** and **TailwindCss** , **MongoDB** and **Cloudinary**. The app demonstrates practical architecture choices: a reusable image upload component, Cloudinary integration (optional), and a scalable follow system implemented as a dedicated collection. This repo collects the code, configuration notes, and the lessons I learned while building the app.

---

## Features

-   Full authentication: register, login, logout
-   Create / edit / delete / update posts with multiple-image support
-   Client-side image previews before upload
-   Like and unlike posts
-   create / delete / like / unlike a Comment
-   Profile page with editable profile picture and bio section
-   Follow / unfollow users (stored in a `follows` collection)
-   Responsive UI built with Tailwind CSS + Blade templates
-   Reusable image upload component and carousel for multi-image posts
-   Cloudinary integration for production image hosting (change it to local if u want to..)

---

## Tech stack

-   **Backend:** Laravel 12
-   **Database:** MongoDB (local or Atlas)
-   **Frontend:** Blade templates + Tailwind CSS
-   **Storage:** Local public storage (development) or Cloudinary (production)
-   **Image handling:** Custom reusable upload component with previews

---

## Get started

### Prerequisites

-   PHP compatible with Laravel 12
-   Composer
-   Node.js + npm
-   MongoDB (local or Atlas)
-   Cloudinary account (or use local storage but u need to rewrite some code)

### Install & run locally

#### clone the project

```
git clone https://github.com/Must01/mustagram.git
cd instagram-clone
```

#### installing dependencies

```
composer install
npm install
npm run dev
php artisan key:generate
```

#### setting .env

```
cp .env.example .env
```

##### Local MongoDB:

```
DB_CONNECTION=mongodb
DB_URI=mongodb://127.0.0.1:27017/instagram_clone
```

##### Atlas (URI):

```
DB_CONNECTION=mongodb
DB_URI=mongodb+srv://<user>:<password>@cluster0.example.mongodb.net/instagram_clone
```

##### Cloudinary :

```
CLOUDINARY_URL=cloudinary://<api_key>:<api_secret>@<cloud_name>
CLOUDINARY_SECURE=true
# also change FILESYSTEM_DISK from local to cloundinary
FILESYSTEM_DISK=cloudinary
```

## Cloudinary setup

### Install package (if not done yet)

```
composer require cloudinary-labs/cloudinary-laravel
php artisan cloudinary:install
```

### Add the disk in config/filesystems.php:

```
'disks' => [

    // ... other disks

    'cloudinary' => [
            'driver' => 'cloudinary',
            'key' => env('CLOUDINARY_KEY'),
            'secret' => env('CLOUDINARY_SECRET'),
            'cloud' => env('CLOUDINARY_CLOUD_NAME'),
            'url' => env('CLOUDINARY_URL'),
            'secure' => (bool) env('CLOUDINARY_SECURE', true),
            'prefix' => env('CLOUDINARY_PREFIX'),
        ],
],

```

### usage in the code

```
// Store and get secure URL
$uploadedFileUrl = Storage::disk('cloudinary')->put('folder_name', $request->file('image'));

$url = Storage::disk('cloudinary')->url($uploadedFileUrl);
```

---

## Deployment notes

-   Demo hosted on [Laravel Cloud](https://cloud.laravel.com)
-   DataBase on [MongoDB Atlas](https://www.mongodb.com/products/platform/atlas-database)
-   Images on [Cloudinary](https://cloudinary.com)
-   Store sensitive values (DB_URI, CLOUDINARY_URL) in laravel cloud environment variables.

---

## Contributing

If you or others want to improve the project, please:

-   Open an issue if you find bugs or want to suggest improvements
-   Submit a PR with tests or clear examples

---

## License

MIT.
