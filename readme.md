Cooltech with Laravel (a HyperionDev capstone project)


## 1.  Getting set up 

Requirements
a.	Composer with php 8
b.	SQLServer and SQLServer drivers for php
-------------------------------------------------------
•	Unzip cooltech.zip folder 
•   Create a sql db.
•   Run database/cooltech.sql to generate all the tables
•	Update db connection details in .env
•	run ` php artisan serve `

## THE PROJECT SPECS

### Compulsory Task 1
1. Design an appropriate database
2. Create laravel project linked to db
3. Create Home page, featuring latest 5 articles
4. Create article view page
5. Create category view page
6. Create tag view page
7. Create Legal page with Terms of use and Privacy policy

### Compulsory Task 2
1. Create a search page, with search by article, category and tag
2. Create a cookie notice
3. Create a footer with links to search, legal and a copyright stamp

### Optional bonus Task 1
Create a writer’s console
1. Only accessible to people with the author password.
2. Feature text fields for the title, content and tags of an article
3. Writer should then be able to submit their article and have it immediately appear on the site

### Optional bonus Task 2
Create an admin console.
1. Only accessible to someone with the admin password
2. should allow admin functionality such as creating and renaming article types and deleting articles

### Optional bonus Task 3
Implement user authentication and session management for the writer’s console, admin console, and normal users.
1. Create a login and a registration page.
2. Implement the necessary middleware for authentication
3. Use session management to keep track of which user is logged in
4. Allow a user to log out.
