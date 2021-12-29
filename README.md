Options to view the project on the web browser:

1) Download Xampp and install it;
2) Move the project folder inside the "xampp/htdocs" folder;
3) Start Xampp and press "Start" for the "Apache" and "MySql" modules
4) The first time you need to create the database:
    - From browser, go to "http://localhost/phpmyadmin/index.php"
    - Create the database "roomiedb" -> "CREATE DATABASE roomiedb"
    - Selecting the database just created and running the SQL command that you find in the project in "db/roomiedb.sql". 
        This will create the structure of the tables and fill them.
5) Now you can view the project pages, for example using the url: "http://localhost/RoomieWanted/index.php"