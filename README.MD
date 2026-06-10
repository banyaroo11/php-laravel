# PHP & Laravel Study

- replace PDO::MYSQL_ATTR_SSL_CA with Pdo\Mysql::ATTR_SSL_CA, at line 61 and 81 in MiniBlogCMS\config\database.php

- composer update

- composer install

- create .env & setup db env vars

- php artisan key:generate

## For DB-based Session

- php artisan make:migration create_sessions_table

- edit MiniBlogCMS\database\migrations\timestamp_create_sessions_table.php

    ```
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    ```

- php artisan migrate

## For ui

- composer require laravel/ui

- php artisan ui bootstrap --auth

- npm install / npm install vite

- npm run dev

- npm run build