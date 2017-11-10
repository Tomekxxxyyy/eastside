CREATE DATABASE file_manager DEFAULT CHARACTER SET utf8;

CREATE TABLE user (ID int AUTO_INCREMENT, login varchar(255) NOT NULL, email varchar(255) NOT NULL, password varchar(255) NOT NULL, PRIMARY KEY (ID));
