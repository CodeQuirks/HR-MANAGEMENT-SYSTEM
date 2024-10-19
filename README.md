# HR Management System

## Introduction

This project is an HR Management System built with CodeIgniter. It provides features for managing employees, departments, and other HR-related tasks.

## Prerequisites

Before you begin, ensure you have the following installed:

- [XAMPP](https://www.apachefriends.org/index.html) (for running the PHP server and MySQL database)

## Setting Up the Project

Follow these steps to run the HR Management System on your local machine:

1. **Download the Project**: Clone or download the repository from GitHub.

2. **Place the Project in XAMPP Directory**:
   - Copy the downloaded project folder to the `htdocs` directory of your XAMPP installation. 
   - The typical path is `C:\xampp\htdocs\`.

3. **Start XAMPP**:
   - Open the XAMPP Control Panel.
   - Start the Apache and MySQL modules.

4. **Create a Database**:
   - Open your web browser and go to `http://localhost/phpmyadmin`.
   - Click on the "Databases" tab.
   - Create a new database named `hrsystemci`.

5. **Import Database Structure**:
   - In phpMyAdmin, select the `hrsystemci` database.
   - Click on the "Import" tab.
   - Choose the SQL file that contains the database structure and click "Go" to import it.

6. **Configure Database Connection**:
   - Open the `application/config/database.php` file in your project folder.
   - Update the database configuration as follows:

```php
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root', // Leave blank if there is no password
    'password' => '', // Leave blank if there is no password
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
```
7. **Access the Application**:
Open your web browser and go to `http://localhost/hrsystemci` (replace hrsystemci with your project folder name if different).

8. **Login Credentials**
Admin Login:
Email: `thoma@mail.com`
Password: `Password@123`
