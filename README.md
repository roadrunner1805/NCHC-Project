NCHC Hockey Website - INFS 3800 Final Project

Student: Ethan
Course: INFS 3800 - Web Programming
Date: May 2026

Project Description:
-------------------
A dynamic website for the National Collegiate Hockey Conference (NCHC) featuring 
member login, player search, dynamic standings, and league information.

* Note: MAMP does not use PORT 3306 it uses PORT 8889. If you are using MySQL change the port number to 3306 in the connection.inc file

Features Implemented:
---------------------
- Consistent professional design across all pages
- Dynamic Player Search (database-driven with prepared statements)
- Secure Login System with session management
- Member-only protected pages (Search + Stats)
- Dedicated Login Failure page
- Responsive menu that changes based on login status
- Dynamic content (Standings, Stats, Transfer Portal, etc.)

Files Included:
--------------
- home.html
- login.php
- login_handler.php
- login_failed.php
- logout.php
- search.php
- searchresult.php
- standings.php
- stats.php
- around.php
- news.php
- contact.php
- create_db.sql
- connection.inc
- README.txt

Database Setup:
---------------
Database Name: INFS3800Project
User: joe
Password: joe123

Login Credentials:
------------------
Username: jma
Password: jma123

Setup Instructions:
-------------------
1. Launch MAMP
2. Extract all files from the zip
3. Run the create_db.sql file to create the database and populate the tables
4. Open the home.php file 
5. From the home.php file everything should function as intended
