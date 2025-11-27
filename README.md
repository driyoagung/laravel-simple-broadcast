# Laravel Broadcast Email System

A Laravel Breeze-based broadcast email system that allows admins to send emails to all registered users.

## 🚀 Features

-   ✅ Authentication system with Breeze
-   ✅ Role-based access (Admin & User)
-   ✅ Broadcast email to all users
-   ✅ Queue system for background processing
-   ✅ Responsive email template
-   ✅ Gmail SMTP integration
-   ✅ Admin panel protection

## 📋 Prerequisites

-   PHP 8.1+
-   Composer
-   MySQL
-   Node.js & NPM

## 🛠️ Installation

### 1. Clone & Install Dependencies

```bash
git clone [your-repo-url]
cd [project-folder]
composer install
npm install
npm run build
```

### 2. Environment Setup

Copy `.env.example` to `.env` and configure:

```env
APP_NAME="Test Broadcast"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_broadcast
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Test Broadcast"

QUEUE_CONNECTION=database
```

### 3. Database & Setup

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### 4. Gmail Setup

1. Enable 2-Factor Authentication on Google Account
2. Generate App Password for "Mail"
3. Use the 16-character password in `MAIL_PASSWORD`

## 👥 Default Accounts

**Admin:**

-   Email: `admin@gmail.com`
-   Password: `admin123`

**User:**

-   Email: `user@gmail.com`
-   Password: `user123`

## 🎯 Usage

1. Login as admin (`admin@gmail.com`)
2. Go to Dashboard → Admin Panel → "Broadcast Email ke Users"
3. Fill subject and content
4. Click "Kirim Broadcast"

## 🔧 Development

```bash
# Start server
php artisan serve

# Start queue worker (if using database queue)
php artisan queue:work
```

> **Tip:** Set `QUEUE_CONNECTION=sync` in `.env` for instant email sending during development.

## 📝 Notes

-   Check `storage/logs/laravel.log` for errors
-   Ensure Gmail credentials are correct
-   Use App Password, not regular password for Gmail
