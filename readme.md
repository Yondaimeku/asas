# ASAS
Assignment submission and attendance system.

An application for managing assignments and attendance to tests.

##how to setup project
1. Clone the repo
2. create a .env file and set variables to match your local environment (db username, password, etc)
3. run a migrate command

        php artisan migrate
4. run a seed command

        php artisan db:seed
5. start the development server and load the application

        php artisan serve
6. login to an account with the appropriate ID

        1 = teacher
        2 = student
        8 = student services
        9 = invigilator
