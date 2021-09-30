### How to install

1. Clone from GitHub:
    in the destination folder "git clone https://github.com/dmistas/mypastebin.git" <br>
    or "git clone git@github.com:dmistas/mypastebin.git" <br>
    will create folder "mypastebin"

2. In the folder <code>composer install</code>
3. change configuration connection settings in file app/config/database.php with your database settings
4. <code>npm install</code>
5. <code>npm run dev</code>
6. <code>php artisan migrate</code>
7. <code>php artisan DB:seed</code> if you want mock entries
8. Set up an entry point on your web server at "mypastebin / public / index.php"

For more information visit the [Laravel website](https://laravel.com/docs/8.x/installation) <br>

