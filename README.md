# CakePHP Application Skeleton

1. composer create-project --prefer-dist cakephp/app user-subscription-system
cd user-subscription-system

2. Set up .env or update config/app_local.php with DB credentials.

3. Create two tables

CREATE TABLE plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    features TEXT,
    created DATETIME,
    modified DATETIME
);

-- users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plan_id INT,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    profile_picture VARCHAR(255),
    hobbies TEXT,
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY (plan_id) REFERENCES plans(id)

);

4.  Run below command for add model and controller
bin/cake bake all Plans  and  bin/cake bake all Users


5. for add JWT token run below command.
composer require firebase/php-jwt




