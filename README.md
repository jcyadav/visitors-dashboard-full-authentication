Project Setup

1. Extract the project.

2. Import the provided database.

3. Rename .env.example to .env and update the database credentials.

DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

4. Run the following commands:

composer install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=AssdtUsersSeeder
php artisan serve

5. Open the application:

http://127.0.0.1:8000

6. Login using the user credentials created by the AssdtUsersSeeder.

---------------------------------------------------------

Q4 & Q5

Copy question4.php and question5.php into the XAMPP htdocs folder and run them directly.

http://localhost/question4.php

http://localhost/question5.php