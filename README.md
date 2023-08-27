<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<h1>Documentation Download and Run Code</h1>

Step 1: run <b>cmd</b> command<br>
Step 2: Download the code on git to your computer: <b>git clone https://github.com/luongthiennhan/NaPi_Code.git </b> <br>
Step 3: Open the downloaded NaPi_Code folder<br>
Step 4 : Run command: <b>composer install</b><br>
Step 5: Copy fie .env.example and rename it to .env <br>
Step 6: Update the .env file as follows<br>
<ul>
    <li>Change to <b>APP_NAME=NaPi</b></li>
    <li>change to <b>APP_KEY=base64:3/45GUyQWxVb4NadlJMkUYyZ/hiLwHbxMsON20p4/4c=</b></li>
    <li>Change to <b>DB_DATABASE=NaPi</b></li>
</ul>
Step 7: Run Command: <b>php artisan migrate</b> to create database <br>
Step 8: Run Command: <b>php artisan db:seed </b><br>
Step 9: Run path <b>NaPi_Code/admin/product</b> 
<ul>
    <li>Account: test@example.com</li>
    <li>Password: 123456789</li>
</ul>
