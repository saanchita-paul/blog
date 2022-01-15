# A simple single-user based blog
# Project Description
<ol>
 <li> CRUD functionality (Create / Read / Update / Delete) for menu item: Post</li>
 <li>Post consists of these fields: Title (required), Slug (Unique), Body, Image with a thumbnail (Thumbnail -- 300×200)</li>
 <li>Pagination</li>
</ol>

# Installation

Please check the official laravel installation guide for server requirements before you start.
<a href="https://laravel.com/docs/8.x/installation">Official Documentation</a>

Clone the repository
```
git clone https://github.com/saanchita-paul/blog.git

```

Install all the dependencies using composer

```
composer install

```
Copy the example env file and make the required configuration changes in the .env file

```
cp .env.example .env

```
Generate a new application key

```
php artisan key:generate

```
Run the database migrations (Set the database connection in .env before migrating)

```
php artisan migrate

```
Alternative migration is possible. Go to the DB folder where you can find a sql file. Just import that file to your created database.

Start the local development server

```
php artisan serve

```
You can now access the server at http://localhost:8000

# Make sure you set the correct database connection information before running the migrations

