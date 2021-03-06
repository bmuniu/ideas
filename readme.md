## About Idea Sharing

Idea Sharing is a web-enabled role-based system for collecting ideas for improvement from students in a large Univesity.

## Requirements
- The project requires at least *php version 7.0*
- The project requires a MySQL database
- Ensure you have composer installed

## Installation
- ```cd``` into the projects directory ```ideas```
- Run the command ```cp .env.example .env``` to create the environment variables file
- Run ```composer install``` to install the required packages
- Create the database ```ideas``` 
- Edit the <b>.env</b> and set the following;
    - DB_DATABASE to ```ideas```
    - DB_USERNAME to your database username
    - DB_PASSWORD to your database password
- Run the command ```php artisan migrate --seed``` to create the database schema and test data
- Run ```php artisan serve```. This should launch the development server 
- run the web application from ```http://localhost:8000```

## Test Credentials
- To login into the system as the admin, use the following test credentials;
    - Email: <b>admin@gmail.com</b>
    - Password: <b>pass123</b>