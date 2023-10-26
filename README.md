<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About ResuMuse

Welcome to the installation guide for setting up your Laravel project. Laravel is a powerful PHP framework known for its elegant syntax and robust features. This guide will walk you through the steps to install and configure a Laravel project on your local development environment.



## Prerequisites:

Before you begin, ensure that you have the following prerequisites installed on your system:



- <b>PHP:</b> Project requires PHP 8.2.4 or higher. You can download PHP from [php.net](https://www.php.net/).
- <b>Composer:</b> Composer is a dependency manager for PHP. You can download and install Composer from [getcomposer.org](https://getcomposer.org/).
- <b>Database:</b> Project is using MySQL. Make sure you have a MYSQL database server installed and running.
- <b>Web Server:</b> You can use Apache or Nginx as the web server. Both are compatible with Project. Make sure your web server is installed and configured properly.


## Step 1: Clone the ResuMuse Project
Open your terminal or command prompt and navigate to the directory where you want to install the project. Run the following command to clone the project from a repository:

<b>git clone https://github.com/syedtaseer/rms.git</b>


## Step 2: Install Dependencies
Navigate to the project directory using the terminal:
<b>cd rms</b>

Next, install the project dependencies using Composer:
<b>composer install</b>

This command will download and install all the required packages and libraries for the project.


## Step 3: Configure Environment Variables
Duplicate the .env.example file and rename it to .env. Update the database configuration and other environment-specific variables in the .env file.
<b>cp .env.example .env</b>

Open the .env file in a text editor and configure the database connection, mail, and other settings according to your requirements.


## Step 4: Generate Application Key
Run the following command to generate a unique application key:
<b>php artisan key:generate</b>


## Step 5: Run Migrations and Seeders
Run the database migrations to create the required tables in the database:
<b>php artisan migrate:fresh --seed</b>



Congratulations! You have successfully installed and configured your ResuMuse project. You can now start using it.
