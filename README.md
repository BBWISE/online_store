# online_store
This Project Titled Online Store is a solution to Module 4 Mini Project in Ekiti State Digital Skill Academy (EDSA) given on 2nd of June, 2023 from a Tech4dev Software Developer named Miracle Chibuzo (eMiracle).
## BY BAYODE BLESSING 0040/EDSA/23/B/BD
## link: https://intercellular-thres.000webhostapp.com/index.php
## Database
The database of this mini-project contains four different tables:
### user table:
This table stores the user personal informations such as the full name, email and password with an id column with serves as the primary key.
### products:
The products table is responsible for the storage of all shoping items with four columns: id, name, price, quantity.
### cart:
The cart table within the database helps to keep tracks of all the user items when added into their cart. This table as four columns: id, product_id, user_id, status.
### orders:
orders table is responsible for the storage of all successfull checkouts with user's cart.
### ERD
<img src="Screenshot (150).png" alt="ERD">

## Design Principles:
Some Programming Design Principles were observed during the development of this mini-projects to ensure task professionality.<br/>
This design principles are:
### 1.   Chain of Responsibility Design (CRD):
CRD was used within this project for the verification and validation of user's inputs while registering and /or signing-in a user to avoid any form of SQL injection.<br/>
The classes which are chained together are: EmailValidator class, NameValidator class and PasswordValidator class.
### 2.   Single Responsibility Principle (SRP):
The SRP design principle was used across all the classes present in this project work shuch as: EmailValidator class, NameValidator class, PasswordValidator class, DBConnector class, DuplicateExist class, GetData class, InsertData class, UpdateData class, RegisterUser class and UserLogin class where each classes performs only one task with respect to their names.
### 3.   Don't Repeat Yourself (DRY) Principle:
In order to optimize the redability and reduce code redundancy, the DBConnector class(helps to connect to the database), GetData class(helps to get items from the database) and InsertData class (helps to store data to the database) were structure to be reuseable.
### 4.   Domain Driven Design (DDD) Principle:
The backend of this mini-project had been well structured and package into different modules such as database related codes (db codes), tasks handler codes (tasks handler) and validation codes (validator) where related classes(php source code files) are packed and stored within their domains.

<b>Howeve, the design and structuring of this project work is such a type which encourage the Test Driven Design (TDD) Principle as all class methods are properly represented.</b>
