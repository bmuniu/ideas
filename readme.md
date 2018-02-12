## About Idea Sharing

Idea Sharing is a web-enabled role-based system for collecting ideas for improvement from students in a large Univesity.

## Requirements
- The project requires at least *php version 7.0*

## Installation

- Run the command ```cp .env.example .env``` to create the environment variable file
- Run the command ```php artisan key:generate```
- Create the database ```ideas``` and then run the command ```php artisan migrate --seed```