﻿# blog_system
Clone the github, paste it in xampp/htdocs
start apache and mysql
go to my sql and put 

CREATE DATABASE blog_system;

USE blog_system;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


SELECT * FROM posts WHERE user_id = 1; 


run GO


then go to http://localhost/blog_system/index.php


DONE!
