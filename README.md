Submission App
==============

## Requirements

* PHP 8.1
* Composer
* Docker

## Installation

For detailed Laravel setup instructions, visit [their documentation](https://laravel.com/docs/9.x/installation).
For getting instructions of using Laravel Sail, visit [appropriate documentation](https://laravel.com/docs/9.x/sail).

1. **Clone the repo**

   ```sh
   $ git clone https://github.com/vitaliyviznyuk/submission-app
   ```
2. **Copy project example .env file**

   ```sh
   $ cp .env.example .env
   ```

3. **Install PHP dependencies**

   ```sh
   $ composer install
   ```

4. **Start Laravel Sail**
   ```sh
   $ ./vendor/bin/sail up -d
   ```

   **NOTE:**
   Instead of repeatedly typing vendor/bin/sail to execute Sail commands, you may wish to configure a Bash alias that allows you to execute Sail's commands more easily:

   ```sh
   alias sail='bash vendor/bin/sail'
   ```

   Once the Bash alias has been configured, you may execute Sail commands by simply typing sail. The remainder of this documentation file will assume that you have configured this alias:

   ```sh
   sail up -d
   ```

5. **Generate application key**

   ```sh
   $ sail artisan key:generate
   ```

6. **Run migrations and seed DB**
   ```sh
   $ sail artisan migrate:fresh
   ```

7. **Run tests!**
```sh
   $ sail artisan test
   ```

## API testing

1. If you are using PhpStorm you can open [api.http](api.http) and use built in HTTP client for sending POST request to the http://localhost/api/submit API endpoint. Also, you can use Postman with the same URL and params.

2. If everything is ok, you should see the following response:
```json
    {
       "message": "OK"
    }
```

3. Connect to "submission_app" DB instance on Docker container. You can use credentials from [.env](.env) for this purpose. In the DB you should see new created recording in "submissions" table.

4. Please check [laravel.log](storage/logs/laravel.log) file. You should see log recordings like this one:

```text
[2024-02-21 21:45:19] local.INFO: Submission saved {"name":"John Doe","email":"john.doe@example.com"} 
   ```
