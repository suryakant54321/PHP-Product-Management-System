# PHP-Product-Management-System

PHP MySQL based Product Management System.

  - PHP based system to manage data product
  - Records updates to keep track of data products
  - Lightweight client designed in HTML/PHP

This text you see here is *actually* written in Markdown! To get a feel for Markdown's syntax, type some text into the left window and watch the results in the right.

### Version
Beta 0.1.0

### Depends on

For Windows / Linux users
- [MySQL] 
- [PHP]
- [Apache] 

For Windows users package of all called XAMPP
- [XAMPP]

### Contains

1. Folder: database_architecture
    - csredataproducts.sql

2. Folder: toposheet
    - Folder: protection (From: http://www.zubrag.com/) folder to manage login roles.
	- Folder style
	
#### Advantages

	1. Easy to configure.
	2. Suitable for small / medium workload.

#### Limitations

	1. File based authentication (not advisible for very sensitive information).
	2. Passwords stored in plain text.
	
### Installation

Install and configure MySQL, PHP and Apache web server (PHPMyAdmin will help).

After successful installation proceed with following.

A. Database configuration

- Create MySQL database by using csredataproducts.sql
```sh
> mysql -u your_user - p < csredataproducts.sql
```

- Check the database 
```sh
> mysql -u your_user -p 
> show databases;
```
    It will list all databases.
    Now check for "csredataproducts". If available proceed.

- Check tables 
```sh
> use csredataproducts;
> show tables
```

    It will list all tables from csredataproducts.
    If  dataproduct and user table are listed. 
    Database configuration complete

- Optional (Create new user in MySQL with read write permissions).

B. Web configuration

- Copy *toposheet* folder into web folder (WAMPP: htdocs/, LAMPP: var/www/)
- Modify *login.php* to add database configurations

C. System check

In browser type URL

    http://localhost/toposheet
    or 
    your_web_host:port/toposheet

D. Modifications

- Add pages (HTML / PHP) scripts to modify the system
- Change styles.css to change webpage colors, etc.
- Change images from *styles* folder

#### To Do
	
- Add product remove capability.
- Modify display according to date.

License
----

CC

[MySQL]: <https://www.mysql.com/>
[PHP]: <https://secure.php.net/>
[Apache]: <https://httpd.apache.org/>
[XAMPP]: <https://www.apachefriends.org/>