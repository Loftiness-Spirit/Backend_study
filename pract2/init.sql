CREATE DATABASE IF NOT EXISTS universityDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON universityDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE universityDB;
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(26) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    course INT NOT NULL
); 