# EduFlow - School Management & Learning Platform

A Laravel-based school and learning management application designed around real operational workflows for administrators, students and course management.

## Core Features

- Authentication and role-aware administration
- Admin dashboard
- Course creation, editing, activation and suspension
- Course categories and topics
- Student/user management
- Course enrollment
- Purchase-order / enrollment request workflow
- Pending, completed and rejected request states
- User profile management
- Contact/message management
- Application settings
- Arabic and French language switching
- Laravel Breeze authentication
- Livewire integration

## Main Business Workflows

### Course Operations
Administrators can create and maintain courses, organize course topics, control active/suspended state and manage enrollment-related requests.

### User Operations
The platform provides user administration, profile editing and authenticated access to personal courses and requests.

### Request Workflow
Purchase/enrollment requests can be reviewed through separate pending, completed and rejected operational views.

## Tech Stack

- PHP 8+
- Laravel 9
- Laravel Livewire
- Laravel Breeze
- Eloquent ORM
- MySQL / MariaDB
- Blade
- Vite
- Tailwind CSS
- PHPUnit

## Additional Backend Portfolio Module

This repository also contains a standalone **Inventory & Billing API** built with Node.js:

[View Inventory & Billing API](./portfolio/inventory-billing-api)

It demonstrates:
- stock and SKU management
- inventory movements
- low-stock alerts
- customer management
- invoice generation
- taxes and totals
- automatic stock deduction
- dashboard KPIs

## Local Setup

```bash
git clone https://github.com/achrafnouisser63/academy.git
cd academy
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

## Portfolio Focus

This repository demonstrates practical full-stack and backend skills: Laravel MVC, authentication, authorization, CRUD workflows, relational data, business status flows, multilingual applications and REST-oriented backend design.

## Author

**Achraf Nouisser**  
Web Developer - Laravel / PHP / JavaScript / Node.js / Python

- GitHub: https://github.com/achrafnouisser63
- Portfolio: https://www.canva.com/d/Xu6tPZ9s5Zu60wK
