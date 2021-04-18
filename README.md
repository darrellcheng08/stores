# Installation

**Step 1:** Clone the project repository

**Step 2:** Install the packages of laravel and vue.js using the commands below:

```
npm install
composer install
```

**Step 3:** Run the following command to generate an application key and link the storage folder to public folder:

```
php artisan config:cache
php artisan key:generate
php artisan storage:link
```

**Step 4:** Rename the `.env.example` file to `.env`, and configure the appropriate database credentials

**Step 5:** Add Softdelete files to vendor, follow the instruction below:

Go to project-folder/Softdeletes then copy SoftDeletes.php and SoftDeletingScope.php file to vendor/laravel/framework/src/Illuminate/Database/Eloquent/

**Step 6:** After configuring the .env file, run the following command:

```
php artisan config:cache
```

**Step 7:** Create a database, then insert default data using the commands below:

```
php artisan migrate
php artisan db:seed
```

**Step 8:** To run the project on the server follow the commands below:

```
php artisan serve
npm run watch-poll
```

**Step 9:** Access the website:

Open your browser and type **localhost:8000** then enter

**Step 10:** Default Admin Credentials

Username: admin@gmail.com

Password: password
