# 🏨 Aloja - Hotel Management System

**Aloja** is a web platform built with the Laravel framework, designed to streamline hotel operations. It allows administrators and employees to efficiently manage bookings, rooms, guests, and other core aspects of hotel management.

## 🚀 Key Features

- **User authentication** with role-based access (Admin and Employee).
- **Full CRUD operations** for stays, rooms, guests, and staff.
- **Incident tracking** and logging of additional income during guest stays.
- **Admin dashboard** for managing passwords, records, and user actions.
- **Password recovery system** with secure validation and recovery methods.
- **Route protection** using custom middlewares (`AuthAdmin` and `AuthEmpleado`).
- **Clean MVC architecture** following Laravel best practices.

## 🛠️ Technologies Used

- **Laravel 10+**
- **PHP 8+**
- **Composer**
- **Blade Templating Engine**
- **MySQL or MariaDB**
- **JavaScript / Vite**
- **Bootstrap**

## ⚙️ Project Structure

Aloja-Laravel-MySQL/
├── app/
│ ├── Http/Controllers/
│ ├── Models/
│ └── Middleware/
├── resources/views/
├── routes/web.php
├── .env.example
├── composer.json
└── package.json

**Make migrations to make it work, database name: adminaloja. Migrate Command:** `php artisan migrate`
