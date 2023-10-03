# CRUD-app
Create, Read, Update, Delete app made using laravel.
Clone the app from master branch and follow setup instructions.


You will need php, composer, mysql (or preffered database), database gui client.

To get started with a maria mysql DB you can follow these steps to install on arch linux!

>sudo pacman -Syu

>sudo pacman -S mysql

Verify Installation:

>mysqld --version

Run before starting:

>mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql

Start and ensure my sql is running:

>sudo systemctl start mysqld

>sudo systemctl status mysqld

Start again:

>sudo systemctl enable mysqld

Follow installation directions:

>sudo mysql_secure_installation

Login as root:

>sudo mysql

Create user (DB commands always end with a semicolon ';' except for 'exit':

> CREATE USER ‘<username>’@’localhost’ IDENTIFIED BY ‘<password>’;


Grant all priveleges to user (this will be the user you connect your dev enviroment to:

> GRANT ALL PRIVILEGES ON *.* TO ‘<username>’@’localhost’ WITH GRANT OPTION;

Clear Cache and exit:

> FLUSH PRIVILEGES;

> exit

Login:

> mysql -u testuser -p

Create database and ensure its listed as a database:

> CREATE DATABASE <dbname>;

> SHOW DATABASES;

Once you have succesfully installed and created a mysql database you can connect it be sure to edit the php.ini file usually located in /etc/php/php.ini and uncomment the line that says 
;extension=pdo_mysql

You can uncomment this by removing the ; infront of it.

Once this is done your database is ready to be used. You can add its information into the .env file. To easier view the data in the database you can install a mysql gui client. I use dbeaver-ce you can find an installation guide here
https://snapcraft.io/install/dbeaver-ce/arch

Be sure to run php artisan migrate after changing the .env file so laravel detects the database to link to. 

