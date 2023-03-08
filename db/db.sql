-- Create the database
CREATE DATABASE myChatApp;

USE myChatApp;
-- Create users table
CREATE TABLE users(id INT NOT NULL AUTO_INCREMENT, unique_id int NOT NULL, fname VARCHAR(255), lname VARCHAR(255), email VARCHAR(255), password VARCHAR(255), image VARCHAR(255), status VARCHAR(255), PRIMARY KEY (id));

-- Create Chats table
CREATE TABLE chats(chat_id INT NOT NULL AUTO_INCREMENT, incoming_id int NOT NULL, outgoing_id INT NOT NULL, msg VARCHAR(1000), time VARCHAR(255), PRIMARY KEY(chat_id));
