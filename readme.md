## About Idea Sharing

Idea Sharing is a web-enabled role-based system for collecting ideas for improvement from students in a large Univesity.

## Requirements
- The project requires at least *php version 7.0*
- The project requires a MySQL database

## Installation

- Run the command ```cp .env.example .env``` to create the environment variables file
- Run the command ```php artisan key:generate```
- Create the database ```ideas``` 
- Edit the <b>.env</b> and set the following;
    - DB_DATABASE to ```ideas```
    - DB_USERNAME to your database username
    - DB_PASSWORD to your database password
- Finally, Run the command ```php artisan migrate --seed```

## Test Credentials
- To login into the system as the admin, use the following test credentials;
    - Email: <b>admin@gmail.com</b>
    - Password: <b>pass123</b>