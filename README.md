# stores

Step 1: Clone the project repository
Step 2:  Install the packages of laravel and vue.js using the commands below:

npm install
composer install

Step 3: 
php artisan key:generate
php artisan storage:link

Step 4: Rename the .env.example file to .env, and configure the appropriate database credentials
Step 5: After configuring the .env file, run the following command:

php artisan config:cache

Step 6: Create a database, then insert default data using the commands below:

php artisan migrate
php artisan db:seed

Step 7: To run the project on the server follow the commands below:

php artisan serve
npm run watch-poll or npm run hot

Step 8: Access the website:
Open your browser and type localhost:8000 then enter

Step 9: Default Admin Credentials
Username: admin@gmail.com
Password: password
