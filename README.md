📝 Laravel Task Manager (Bootstrap + Sanctum)
A simple Task Management system built with Laravel 12, Laravel Sanctum for API authentication, and Bootstrap 5 for styling.

📦 Features
- User registration and login (API & web)

- JWT-style API authentication using Laravel Sanctum

- CRUD operations for Tasks

- Flash messages for feedback

- Blade Components (<x-app-layout>) used for layout management

⚙️ Project Setup
1. Clone the Repository
bash

git clone https://github.com/your-username/task-manager.git
cd task-manager

2. Install Dependencies
bash

composer install
npm install

3. Environment Configuration
Copy .env.example to .env and update database details:
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

4. Generate App Key

php artisan key:generate

5. Migrate the Database
bash

php artisan migrate

6. Install and Compile Frontend Assets (Bootstrap)
Bootstrap 5 is used via Vite:

bash

npm run dev
Or for production:

bash
npm run build

7. Serve the Project
bash

php artisan serve
Access it at: http://localhost:8000
