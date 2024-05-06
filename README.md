This Project is created by Mervin Chung (32068443) as a Final year project.

This project has been created with **PHP 8.3.6** so ensure that you have installed the necessary php folders to be able to run localhost. 

once you have installed php into your device you can follow the steps below to view the demo :

Steps to prepare your device for running LocalHost for this project : 
**1. Replacing your ini file for PHP : **
    you will need to modify the .ini folder and replace it with the folder below : 
    [ini file.zip](https://github.com/Scrap-H/CropTech/files/15169843/ini.file.zip)

**2. Install XAMPP**
   XAMPP was used as a database for this project,
   Once you have installed your XAMPP Start up both "Apache" and "MySQL" then under MySQL click on Admin to
   direct you to the Localhost page where you will use to view and import the CROPTECH SQL Structure.

**3. Importing SQL Structure**
  Once you see phpMyAdmin ,  on the Left side of the page you click on New (ensure its new database and not creating a new table) then Import on the top , choose the file "CropTech.sql" and ensure that :
-  "character set" is "utf-8"
-  Partial Import is " 0 "
-  Enable foreign key is active
-  Format is SQL
-  Format-Specific options is " None " and active " Do not use AUTO_INCREMENT for zero values "

then press import
 - Note this was made on **4/25/2024**, what you see may be different.

**OPTIONAL : this step is if there is an issue with connecting your SQL to the project**

If all is done right the project will be able to read and write to the SQL , if not then you can continue reading below : 

To edit the SQL connection details you will need to open the project file and go to **Connector** then **dbCon.php**.
once in the file, you can change the details
