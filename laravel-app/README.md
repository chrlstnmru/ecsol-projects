# Laravel App

This project is created using Laravel framework; utilizes Laravel Breeze for authentication, and Blade for templating.

## Prerequisites

- PHP 8.0+
- Composer
- XAMPP

## Getting Started

### Project Setup

1. Clone the repository.
   ```bash
   git clone --filter=blob:none https://github.com/chrlstnmru/ecsol-projects.git
   ```
2. Navigate to the project directory.
   ```bash
   cd ecsol-projects
   ```
3. Enable sparse checkout, set the `laravel-app` directory to checkout.
   ```bash
   git sparse-checkout init --cone
   git sparse-checkout set laravel-app
   git checkout main
   ```
4. Install the project dependencies.
   ```bash
   composer install
   npm install && npm run build
   ```

### Database Setup

1. Open XAMPP control panel.
2. Start `MySQL` service.
   > Note: You can also start the `Apache` service if you want to access phpMyAdmin (http://localhost/phpmyadmin).
3. Navigate to the `laravel-app` directory.
4. Duplicate the `.env.example` file and rename it to `.env`.
5. Generate a random `APP_KEY` using the following command.
   ```bash
   php artisan key:generate
   ```
6. Update the `.env` file with the required database credentials.
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ecsol_projects/laravel_app
   DB_USERNAME=root
   DB_PASSWORD=
   ```
7. Run the following command to create and migrate the database.
   ```bash
   php artisan migrate
   ```

### Running the Application

1. Navigate to the `laravel-app` directory.
2. Run the following command to start the application.
   ```bash
   composer run dev
   ```
