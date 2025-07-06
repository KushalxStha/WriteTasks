# Laravel WriteTasks App

WriteTasks is a simple task management system built with Laravel, enabling users to create, edit, and organize tasks with rich details. This document outlines the core concepts and steps I learned while developing the application.

---

## 📁 Project Overview

- **Project:** WriteTasks ( Laravel-based Task Management )
- **Stack:** Laravel, MySQL, Blade, Tailwind CSS, Alpine.js
- **Purpose:** Learn the fundamentals of building a modern Laravel application including routing, validation, forms, Blade templating, and database interaction.

---

## ✅ Table of Contents

1. [Creating Laravel Project](#1-creating-laravel-project)
2. [Routing](#2-routing)
3. [Blade Templates and Directives](#3-blade-templates-and-directives)
4. [Layouts &amp; Template Inheritance](#4-layouts--template-inheritance)
5. [Database Setup](#5-database-setup)
6. [Models, Migrations, and Database Connection](#6-models-migrations-and-database-connection)
7. [Factory &amp; Seeder](#7-factory--seeder)
8. [Form Handling &amp; CSRF](#8-form-handling--csrf)
9. [Validation](#9-validation)
10. [Flash Messages &amp; Sessions](#10-flash-messages--sessions)
11. [Edit &amp; Update Forms](#11-edit--update-forms)
12. [Route Model Binding &amp; Form Requests](#12-route-model-binding--form-requests)
13. [Delete Functionality](#13-delete-functionality)
14. [Reusing Blade Components](#14-reusing-blade-components)
15. [Pagination](#15-pagination)
16. [Styling with Tailwind CSS](#16-styling-with-tailwind-css)
17. [Alpine.js Flash Messages](#17-alpinejs-flash-messages)

---

## 1. Creating Laravel Project

- Created the laravel project using Composer.
```bash
  composer create-project laravel/laravel WriteTasks
```

## 2. Routing

- Defined simple `GET`, `POST`, `PUT`, `DELETE` routes.
- Used route names and route redirections.

## 3. Blade Templates and Directives

- Used `@if`, `@forelse`, and other Blade directives.
- Created reusable view components.

## 4. Layouts & Template Inheritance

- Created a base layout using `@yield` and `@section`.
- Extended layout in child views.

## 5. Database Setup

- Used MySQL provided by XAMPP (localhost/phpmyadmin).
- Created a new database for the Laravel project.
- Updated `.env` file with the following DB config:
```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=write_tasks
  DB_USERNAME=root
  DB_PASSWORD=
```

## 6. Models, Migrations, and Database Connection

- Created model & migration with 
```bash
    php artisan make:model Task -m
```
- Defined database tables with migrations.
- Ran migrations and verified DB schema 
```bash
    php artisan migrate
```

## 7. Factory & Seeder

- Created model factory for dummy data 
```bash
    php artisan make:factory TaskFactory --model=Task
```
- Defined the structure of fake data in TaskFactory.
- Used the factory directly inside DatabaseSeeder.php to seed some records.
- Ran the seeder using 
```bash
    php artisan db:seed
```

## 8. Form Handling & CSRF

- Built forms for adding and editing tasks.
- Used `@csrf` and `@method('put')` for secure form submissions.

## 9. Validation

- Performed server-side validation directly in routes using `$request->validate()`.
- Defined rules inline for fields like `title`, `description`, etc.
- Displayed validation errors using Blade.

## 10. Flash Messages & Sessions

- Used `session()->flash('success', ...)`'s shorthand `->with('success', ... )` for user feedback.
- Displayed flash messages in views using `session()->has('success')`

## 11. Edit & Update Forms

- Pre-filled form fields with old values using `old()` and model data.
- Built update functionality with PUT method.

## 12. Route Model Binding & Form Requests

- Used automatic route model binding in routes.
- Replaced inline validation (from Section 9) with reusable form request class.
- Created form request class using
```bash
    php artisan make:request TaskRequest
```
- Defined validation rules in the rules() method of TaskRequest.
- Injected TaskRequest into the route closure for automatic validation.

## 13. Delete Functionality

- Built delete buttons using `form method="POST"` and `@method('DELETE')`.

## 14. Reusing Blade Components

- Created a reusable partial view `form.blade.php` to avoid repeating form code.
- Used the same form partial in both `create.blade.php` and `edit.blade.php` using `@include('form')`

## 15. Pagination

- Used Laravel’s built-in pagination with `->paginate()` in route.
- Rendered pagination links with `{{ $tasks->links() }}`.

## 16. Styling with Tailwind CSS

- Styled the UI using Tailwind utility classes.
- Applied styles with `@apply` in custom CSS classes.

## 17. Alpine.js Flash Messages

- Added interactivity with Alpine.js for dismissible flash alerts.
- Used `x-data` and `x-show`.

---

## 🧠 Key Takeaways

- Laravel simplifies backend logic with elegant syntax.
- Blade + Tailwind allows clean and responsive UI development.
- Form handling, validation, and feedback are smooth with built-in helpers.
- Reusability through components and route model binding keeps code DRY.
