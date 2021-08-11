# PetsWay-Database

Database Management System (Mini Project)

The Pet Store Database Management System is for creating and managing records. It provides users and programmers with a systematic way to create, retrieve, update and manage data. DBMS makes it possible for end users to create, read, update and delete data in a database.

The objective and scope of my project is to record the details and various activities of user. It will simplify the task and reduce paper work. The system is very user friendly and it is anticipated that functions of the system will be easily accessed by administrators.

![Screenshot (617)](https://user-images.githubusercontent.com/88772143/129008456-b649daa6-e3e7-4311-95de-f7d7aca70e3c.png)
![Screenshot (616)](https://user-images.githubusercontent.com/88772143/129008481-0f695aec-65ca-4fd5-8e23-3cee0b1afb3a.png)
![Screenshot (614)](https://user-images.githubusercontent.com/88772143/129008499-79d2100b-ef60-4f18-af6d-0a5bd51dc0a2.png)
![Screenshot (613)](https://user-images.githubusercontent.com/88772143/129008505-eb752554-6b23-4726-bf12-3472d4e4d6f1.png)
![Screenshot (609)](https://user-images.githubusercontent.com/88772143/129008525-b89b1739-afa6-4fd4-a125-47f2caca92c8.png)
![Screenshot (608)](https://user-images.githubusercontent.com/88772143/129008534-628f1d9b-cb00-4cbe-93ac-a3cba3d80a4a.png)
![Screenshot (607)](https://user-images.githubusercontent.com/88772143/129008561-773bbcda-7422-4aa6-96e6-ee55aa3dbe25.png)
![Screenshot (619)](https://user-images.githubusercontent.com/88772143/129008585-7a948b7b-52f5-401d-9e87-d36950a4fbda.png)
![Screenshot (625)](https://user-images.githubusercontent.com/88772143/129008600-870828f0-c028-4804-b557-417d4e816c30.png)
![Screenshot (626)](https://user-images.githubusercontent.com/88772143/129008658-00ccef37-9886-4005-8ba7-97ee104e7973.png)
![Screenshot (813)](https://user-images.githubusercontent.com/88772143/129008972-70e8d532-822b-4f27-8e19-9f028398362e.png)

OPERATIONS:
• Addition of new customers: New customers can register themselves. Existing customers can login with their registered username and password.
• Searching for pets and products: Customers can look for pets and products in the inventory from the main menu.
• Filtering pets and products: Here, the customers can filter their searches.
• Viewing pet or product description: Customers can view the descriptions of pets and products on clicking the pet or product of interest.
• Viewing admin/ customer profile: Personal profiles can be viewed upon clicking View Profile under My Account. It displays details of the customer/ admin.
• Add/ Archive dogs and cats: New pets can be added into or removed from the inventory by the admins.
• Add/ Modify/ Delete a pet product: New pet products can be added, modified or deleted completely from the inventory by admins.
• View pet and product orders: Admins can view all the orders under: “Orders”.

SQL STATEMENTS:
• Insert statement:
The INSERT INTO statement is used to insert new records in a table.
The INSERT INTO syntax would be as follows:
INSERT INTO table_name VALUES (value1, value2, value3, ...);
The following SQL statement inserts a new record in the “Pets” table:
INSERT INTO pets VALUES (1,1,’Dog’,’Rottweiler’,’M’,’Sam’,2,18000,’rottweiler.jpg’, ‘Affectionate, Brisk, Fun-loving, Playful, Obedient.’,’available’);
• Update statement:
An SQL UPDATE statement changes the data of one or more records
in a table. Either all the rows can be updated, or a subset may be chosen using a condition.
The UPDATE syntax would be as follows:
UPDATE table_name SET column_name =value , column_name=value... [WHERE condition].
The following SQL statement updates the product table where productID
is 1001:
UPDATE TABLE products SET productCost= 18000, availableQuantity=50 WHERE productID =1001;
• Delete statement:
The DELETE statement is used to delete existing records in a table.
The DELETE syntax would be as follows:
DELETE FROM table_name WHERE condition;
The following SQL statement delete’s a record in the "products" table:
DELETE FROM products WHERE productID = 1001;
Create statement:
The CREATE TABLE Statement is used to create tables to store data. Integrity Constraints like primary key, unique key, foreign key can be defined for the columns while creating the table.
The CREATE syntax would be as follows:
CREATE TABLE table_name(column1 datatype,column2 datatype,column3 datatype, columnN datatype, PRIMARY KEY( one or more columns ));
The following SQL statement creates a table “petCategories”:
Create table petCategories (productID int, custID int, productOrderDate date, productOrderID int, foreign key(productID)references products(productID), foreign key(custID) references customernew(custID));

ALGORITHM OF IMPLEMENTATION
4.2.1 ALGORITHM OF ADMIN
1. Start system
2. Login as admin.
3. Verify the login credentials
4. If verified, redirect admin to admin homepage.
5. If not, return an error message.
VIEW PETS/ PRODUCTS IN THE INVENTORY
1. Click on Dogs/ Cats/ Products/ Cat Products under “Inventory”
2. The items/ pets in store are displayed in the form of a table.
ADDING PET / PRODUCT
1. Enter pet/ product details in the Add Dog/ Cat/ Dog Product/ Cat Product Form
2. Display addition successful message if addition is successful.
UPDATING PRODUCT DETAILS
1. Choose the product to be modified from the list of products available.
2. Update the details to be modified in the form.
3. Display successfully updated message.
ARCHIVE PET/ PRODUCT
1. Choose the pet/ product to be archived.
2. Display “successfully archived” message.
VIEW ORDERS
1. Choose the orders list to be viewed – cat/ dog/ dog product/ cat product.
2. The list of orders is displayed.
4.2.2 ALGORITHM OF USER
1. Start system
2. Login as customer.
3. Verify the login credentials
4. If verified, redirect customer to customer homepage.
5. If not, return an error message.
SHOP FOR DOGS / CATS/ PRODUCTS
1. Select a dog/ cat/ product to view details. (Additionally, you could choose the filter option to filter your preferences.)
2. View details and price.
3. Click “Buy”
4. Fill the transactions form and Pay amount.
5. Order will be successfully placed.
VIEW PROFILE
1. Click on “View Profile” under My Account on the top right corner of the screen.
2. User details will be displayed on the screen.

CONCLUSION
The main aim of this project is to reduce the time consumption and reduce the work load of maintaining records manually.
Keeping records of pets, products, customers and order details on paper can be lost unlike computers as they are very reliable sources of maintaining these records. The system was typically designed so that it is easy to store and access information. In this application, we have 2 admins who can view customer details. Users can register and login and he/she can view pets and products available for sale. Admins can manage records of pets and products i.e., add, delete and modify details as required. This system offers an efficient way of handling large amounts and multiple types of data. The ability to access data efficiently allows companies to make informed decisions quicker and it will also help provide an organized working environment.
