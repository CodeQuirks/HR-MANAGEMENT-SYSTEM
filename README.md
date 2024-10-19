Running the HR Management System Locally with XAMPP


Prerequisites
* XAMPP: Make sure you have XAMPP installed on your computer. You can download it from Apache Friends.
* Code Editor: Use any code editor you prefer (e.g., VSCode, Sublime Text).
Steps to Run the Application
Download the Repository:

STEP (1)..Clone the repository using Git or download it as a ZIP file and extract it.

git clone <repository-url>
Move the Project Folder:

STEP (2)..Place the project folder (e.g., HRSystem-CI) into the htdocs directory of your XAMPP installation. The default path is usually:

C:\xampp\htdocs\
Start XAMPP:

STEP (3)..Open the XAMPP Control Panel and start the Apache and MySQL services.
Create the Database:

STEP (4)..Open your web browser and go to http://localhost/phpmyadmin.
Create a new database named hrsystemci.
Import the SQL file (if provided) to create the necessary tables and data:
Click on the database name, then go to the "Import" tab.
Choose the .sql file and click "Go".
Configure the Database Connection:

STEP (5)..Open the application/config/database.php file in your project.
Update the database configuration with the following settings:

$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root', // default XAMPP username
    'password' => '',     // leave blank if you don't have a password
    'database' => 'hrsystemci',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

STEP (6)..Access the Application:
In your web browser, go to:

http://localhost/HRSystem-CI
Replace HRSystem-CI with the actual folder name if it's different.


STEP (7)..Login Credentials:

Use the following credentials to log in:
Email: thoma@mail.com
Password: Password@123
