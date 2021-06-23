# EighteenTech

Basic template.

## To do

* Create database schema for products

## How to run

### PHP

1. Follow the steps on  https://www.sunant.com/running-php-from-windows-command-line/ to set up php on your windows command line
2. Add/Replace the php.ini file (located in the folder you created in step 1) with the one sent on Discord
3. Clone this repo onto your local machine
4. in the project directory, open the command line and enter `php -S localhost:8000`
5. The site will now be up on http://localhost:8000/ (The page won't load without starting the MySQL service on XAMPP)

### MySQL

1. Follow steps on https://www.c-sharpcorner.com/article/how-to-install-and-configure-xampp-in-windows-10/ to install and setup XAMPP.
2. Open XAMPP and start the Apache and MySQL services.
3. Click on the "Admin" button of the MySQL service to open up the PHPMyAdmin panel
4. Click on "Databases" and create a new database named "eighteentech"
5. Open the newly created database.
6. On the top, you'll see an option to "import" the SQL schema. Click on it
7. Upload the .sql file from the backend folder.
8. If the import is successful, you'll see the newly created user table. You're good to go!

## Any doubts?

Ping the team members on discord.
