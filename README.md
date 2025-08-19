Instagram Clone – Laravel & MongoDB

A full-stack Instagram-like web application built with Laravel and MongoDB, where users can create accounts, upload multiple images, like posts, and comment. This project was inspired by the FreeCodeCamp Full-Stack Instagram Clone tutorial and built with love for learning and improving full-stack development skills.

Features

User authentication (register, login, logout)

Create, edit, and delete posts

Upload multiple images per post with preview support

Like and unlike posts

Comment on posts

Profile page with editable profile picture

Responsive UI built with Tailwind CSS

Carousel display for multiple images

Real-time error handling for forms

Tech Stack

Backend: Laravel 12

Database: MongoDB (local or Atlas)

Frontend: Blade + Tailwind CSS

File Storage: Laravel Public Storage

Image Handling: Custom reusable image upload component

Installation

Clone the repository:

git clone https://github.com/Must01/instagram-clone.git
cd instagram-clone

Install dependencies:

composer install
npm install
npm run dev

Copy .env file and set environment variables:

cp .env.example .env
php artisan key:generate

Update your .env with:

# MongoDB connection (local or Atlas)

DB_CONNECTION=mongodb
DB_URI=mongodb://127.0.0.1:27017/instagram_clone # replace with your MongoDB URI if using Atlas

Note: You can connect the Mustagram app database using either your local MongoDB or MongoDB Atlas by changing the DB_URI in your .env file or environment variables.

Run migrations (if any) and seeders:

php artisan migrate
php artisan db:seed

Run the application:

php artisan serve

Visit http://127.0.0.1:8000 in your browser.

Usage

Register a new user or login with existing credentials

Go to Create Post to upload images and add a caption

Like or comment on posts

Edit your profile and change your profile picture

Each post has a menu to edit or delete (if it’s yours)

Notes / Tips

The image upload component supports multiple images with previews before submission

Old images are preserved when editing a post

Maximum image size: 2MB

Allowed formats: JPEG, PNG, JPG, GIF, SVG

Contributing

Feel free to open issues or submit pull requests! This project is a learning project, so all contributions to improve features or fix bugs are welcome.

License

This project is open-source. You can use it for learning purposes or personal projects.

Screenshots / Demo

(Replace with actual screenshots or GIFs of your app)

Home feed

Post creation with image preview

Profile page

Post carousel
