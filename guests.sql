/*BooksDB is the name of the database. if visitors table already exists drops visitors
and then creates visitors table with ID as primary key 
and a place for first name and last name
*/
USE kohearon; 

DROP TABLE IF EXISTS visitors;

CREATE TABLE visitors
(
   ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
   FirstName varchar(60),
   LastName varchar(60)
 
);
