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

<img width="959" height="474" alt="pivote_table_data" src="https://github.com/user-attachments/assets/5be2825c-c0ad-404d-af3c-354e96ddcc04" />
<img width="959" height="475" alt="login_01" src="https://github.com/user-attachments/assets/055e010d-19e5-4187-b399-165548b10f6a" />
<img width="956" height="470" alt="visitor_dashboard" src="https://github.com/user-attachments/assets/fb59ffa7-d385-4f34-81a0-9eca61b5a84a" />
