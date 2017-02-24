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
| Program will add a new stylist to the database | "Jacques St Gerrard / 555-999-1234 / (works on) Monday, Saturday" | same as input |
| Program will list all stylists entered in the database | _no action necessary, stylists listed on home page_ | "Current stylists: Jacques St Gerrard / 555-999-1234 / (works on) Monday, Saturday /// Cristiano Francois 503-876-5309 / (works on) Thursday, Friday" |
| Program will delete all stylists entered in the database | _user clicks_ "Delete All Stylists" _button_ | "You currently have no stylists in your database" |
| Program will find a specific stylist from the database | _user clicks_ "Jacques St Gerrard" | "Stylist: Jacques St Gerrard / 555-999-1234 / (works on) Monday, Saturday" |
| Program will edit entry of specific stylist from the database | _user inputs new phone number_ "432-199-9555" | "Stylist: Jacques St Gerrard / 432-199-9555 / (works on) Monday, Saturday |
| Program will delete entry of specific stylist from the database | _user clicks delete stylist_ | "Stylist has been deleted" |

### Client Functionality
|Behavior|Input|Output|
|--------|-----|------|
| Program will add a new client to the database | "Vince Neil / 212-543-6789 | same as input |
| Program will list all clients associated with a stylist | _user clicks_ "Jacques St Gerrard" | "Stylist: Jacques St Gerrard / 432-199-9555 / (works on) Monday, Saturday / Current Clients: Vince Neil (212-543-6789) /// Crispin Glover (987-634-5212)" |
| Program will delete all clients associated with a stylist | _user clicks_ "Delete All Clients" _button_ | "You currently have no clients associated with this stylist in your database" |
| Program will find a specific client from the database | _user clicks_ "Vince Neil" | "Vince Neil (212-543-6789)" |
| Program will edit entry of specific client from the database | _user inputs new phone number_ "321-543-9876" | "Vince Neil (321-543-9876)"|
| Program will delete entry of specific client from the database | _user clicks delete client_ | "Client has been deleted" |


&nbsp;
## MySQL commands
*
*
*
*
*
*

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
