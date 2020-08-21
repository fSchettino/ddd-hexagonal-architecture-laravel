## DDD & Hexagonal Architecture with Laravel

Implementing Domain Driven Design and Hexagonal Architecture example API using Laravel.

## Installing:

1. Clone repository: `git clone https://github.com/fSchettino/ddd-hexagonal-architecture-laravel.git`.
2. Move to project folder: `cd ddd-hexagonal-architecture-laravel`.
3. Duplicate .env.example file and set your variables.
4. Install project dependencies: `composer install`.
6. Generate encryption key: `php artisan key:generate`.
6. Create a new schema in your database.
7. Execute migration: `php artisan migrate`.
8. Start server: `php artisan serve`.

## Tests:
Run: `php artisan test`.

## API endpoints:

```
Create a new user:
POST - http://127.0.0.1:8000/api/user
Body object:
{
  "name": "Firstname Lastname",
  "email": "firstname.lastname@email.com",
  "password": "password_example"
}

-------------------------------------------

Get created user:
GET - http://127.0.0.1:8000/api/user/1

-------------------------------------------

Update existing user:
PUT - http://127.0.0.1:8000/api/user/1
Body object:
{
  "name": "Name Surname",
  "email": "name.surname@email.com"
}

-------------------------------------------

Delete user:
DELETE - http://127.0.0.1:8000/api/user/1

