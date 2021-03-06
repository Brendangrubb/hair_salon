# **Hair Salon**
#### Brendan Grubb, 2/24/2017

&nbsp;
## Description
Hair Salon is an application created to demonstrate my ability to construct & manipulate a database via SQL, Apache & PHP. This app is intended to be used by the owner or manager of a hair salon though the functionality would be useful for anyone who needs a tool to manage a database of independent contractors and their clients.
The user will be able to add, list, edit and delete entries for stylists. The user will also be able to associate multiple clients with specific stylists. Entries for clients can also be added, listed, edited and deleted.

&nbsp;
## Specifications

### Stylist Functionality
|Behavior|Input|Output|
|--------|-----|------|
| Program will add a new stylist to the database | "Jacques St Gerrard (5559991234) / available Monday, Saturday" | same as input |
| Program will list all stylists entered in the database | _no action necessary, stylists listed on home page_ | "List of stylists: Jacques St Gerrard (5559991234) / available Monday, Saturday" /// Cristiano Francois (5038765309) / available Thursday, Friday" |
| Program will delete all stylists entered in the database | _user clicks_ "Delete All Stylists" _button_ | "Add Some Stylists!" |
| Program will find a specific stylist from the database | _user clicks_ "Jacques St Gerrard" | "Jacques St Gerrard / 5559991234 / available Monday, Saturday - Add Clients" |
| Program will edit entry of specific stylist from the database | _user inputs new phone number_ "4321999555" | "Stylist: Jacques St Gerrard / 4321999555 / (works on) Monday, Saturday |
| Program will delete entry of specific stylist from the database | _user clicks delete stylist_ | "Stylist has been deleted" |
| Program will find list of clients assigned to a single Stylist | Jacques St Gerrard / 5559991234 / available Monday, Saturday - Current Clients: Vince Neil / 2125436789 |


### Client Functionality
|Behavior|Input|Output|
|--------|-----|------|
| Program will add a new client to the database | _On Jacques's Stylist Page_ "Vince Neil / 2125436789" | Jacques St Gerrard / 5559991234 / available Monday, Saturday - Current Clients: Vince Neil / 2125436789 |
| Program will delete all clients | _user clicks_ "Delete All Clients" _button_ | _Back to Main Page_ |
| Program will edit entry of specific client from the database | _user inputs new phone number_ "3215439876" | "Vince Neil (3215439876)"|
| Program will delete entry of specific client from the database | _user clicks delete client_ | "Client has been deleted" |


&nbsp;
## MySQL commands
* SHOW DATABASES;
* DROP (_various old databases_);
* CREATE DATABASE hair_salon;
* USE hair_salon;
* CREATE TABLE stylists (id serial PRIMARY KEY, name VARCHAR(50), phone_number VARCHAR(10), workdays VARCHAR(100));
* DESCRIBE stylists; (_to confirm stylists table was created correctly_)
* CREATE TABLE clients (id serial PRIMARY KEY, name VARCHAR(50), phone_number VARCHAR(10), stylist_id bigint(20));
* DESCRIBE clients; (_to confirm clients table was created correctly_)
* SHOW TABLES; (_to confirm tables exist where expected_)
* hair_salon_test created at http://localhost:8888/phpmyadmin;
* USE hair_salon_test;
* SELECT DATABASE(); (_to confirm I'm testing on the correct database_)
* DELETE FROM stylists WHERE id BETWEEN 1 AND 50; (run regularly to clear database between tests before deleteAll method and teardown were created)
* SELECT * FROM stylists; (run to confirm DELETE FROM command worked as expected)
* DELETE FROM clients WHERE id BETWEEN 1 AND 50; (run regularly to clear database between tests before deleteAll method and teardown were created)
* SELECT * FROM clients; (run to confirm DELETE FROM command worked as expected)


&nbsp;
## Setup/Installation Requirements
##### _To view and use this application:_
* It is necessary to download and install a few programs to use this application
    * Go to [getcomposer.org] (https://getcomposer.org/) to download Composer (a dependency manager) for free.
    * If you plan on using this app on a mac, go to [mamp.info] (https://www.mamp.info/en/downloads/) to download MAMP for free. If you're not using a mac, make sure you have software installed that allows you to host a web server via Apache and manage a database via MySQL (WAMP, LAMP, etc)
* Go to my [Github repository] (https://github.com/Brendangrubb/hair_salon)
* Download the zip file via the green button
* Unzip the file and open the **_hair_salon-master_** folder
* Inside of the **_hair_salon-master_** folder, unzip the **_hair_salon.sql.zip_** file
* open MAMP (or equivalent) and start the server.
* Type **_localhost:8888/phpmyadmin_** into your web browser
    * Click the _Import_ tab on the nav bar
    * Click _Choose File_ and navigate to the unzipped **_hair_salon.sql_**
    * click _GO_
* Open Terminal, navigate to **_hair_salon-master_** project folder, type **_composer install_** and hit enter
* Navigate Terminal to the **_hair_salon-master_/web_** folder and set up a server by typing **_php -S localhost:8000_**
* Type **_localhost:8000_** into your web browser
* The application will load and be ready to use!

&nbsp;
## Known Bugs
* No known bugs

&nbsp;
## Technologies Used
* PHP
* Silex
* Twig
* PHPUnit
* SQL
* Apache
* Composer
* Bootstrap
* CSS
* HTML

&nbsp;
_If you have any questions or comments about this program, you can contact me at [brendangrubb@gmail.com](mailto:brendangrubb@gmail.com)._

Copyright (c) 2017 Brendan Grubb

This software is licensed under the GPL license
