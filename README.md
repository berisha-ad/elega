

# Description:
Elega is a marketplace where users have the opportunity to 
list their vehicle after registering. Additionally, within 
the application, it is possible to directly inquire about 
vehicles from the user who posted it.

## Features
- User registration and login
- Add and remove vehicles (as a logged-in user)
- Inquire about vehicles via phone or email

## Requirements
- XAMPP 8.2.4
- PHP
- MySQL
- Composer

## Root Directory
In order for the homepage to be accessible directly under the 
top-level domain, the Document Root must be adjusted in the 
httpd.conf file.  
Add this path at the end: /elega/public  
--> `DocumentRoot /Applications/XAMPP/xamppfiles/htdocs/elega/public`

## Composer
For the application to work, the command `composer install` must be 
executed to install the necessary dependencies from the composer.json file.

## Starting the Application
After the dependencies have been installed, start the server 
in XAMPP and visit the URL: http://localhost/.


