# Guestbook template

* It is not good enough and still developing.
* This version already removed the middleware that named passport for protecting API routes. If you want to use it, you can visit [Laravel official website](https://laravel.com/docs/9.x/passport#main-content) to fix it.


<br>

## How to Install this application
First, you got to have these software installed in you computer:
1. PHP
2. MySQL
3. node.js
4. npm
5. nginx
6. composer

Second, git clone this app to your local machine.

Third, run the commands below:
1. `npm install`
2. `composer install`

Fourth, copy the file `.env.example` as `.env`. And set the information about your MySQL in this file, such as the table name. Remember, you have to have this table in your MySQL first.

Fifth, you have to run the command below:
1. `php artisan key generate`
2. `php artisan migrate`

Sixth, you can connect it to you server such as Nginx or Appach or simply run this command `php artisan serve`.

Now, you can visit the website after click the url in your terminal.


<br>
<!-- ---
### If you do not want to deploy by yourself, you can visit [this website](http://172.104.70.118/)  to see what it looks like.

And if you don't want to sign-up for this website, you can use this account to log-in:

1. user: testuser
2. password: test123 

--- -->
