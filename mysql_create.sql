CREATE DATABASE application;
use application;
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(20),
    email VARCHAR(20)
) ;
INSERT INTO users values(1,"admin", "credentials","admin@test.es");
INSERT INTO users values(2,"f0ns1", "superpass","admin@test.es");
INSERT INTO users values(3,"admin123", "secret123","admin@test.es");

CREATE TABLE IF NOT EXISTS data (
    data_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    title VARCHAR(20),
    description VARCHAR(40)
) ;

INSERT INTO data values(1,"data1", "user1","data for user 1");
INSERT INTO data values(2,"data2", "user2","data for user 2");
INSERT INTO data values(3,"data3", "user3","data for user 3");

