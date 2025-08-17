CREATE DATABASE techie;

USE techie;

CREATE TABLE user_account (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(225) NOT NULL,
    role VARCHAR(50) NOT NULL
);

CREATE TABLE product (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    name VARCHAR(150) NOT NULL,
    description VARCHAR(255) NOT NULL,
    price INT NOT NULL,
    stock_quantity INT NOT NULL,
    category VARCHAR(100) NOT NULL,
    image_url VARCHAR(255) NOT NULL,

FOREIGN KEY (user_id) REFERENCES user_account(user_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE cart (
    cart_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

FOREIGN KEY (user_id) REFERENCES user_account(user_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE cart_items(
    cart_items_id INT PRIMARY KEY AUTO_INCREMENT,
    cart_id INT,
    product_id INT,
    quantity INT NOT NULL,

FOREIGN KEY (cart_id) REFERENCES cart(cart_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,

FOREIGN KEY (product_id) REFERENCES product(product_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);


CREATE TABLE user_profile (
    profile_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    full_name VARCHAR(150) NOT NULL,
    phone_number INT NOT NULL,
    address_line1 VARCHAR(100) NOT NULL,
    address_line2 VARCHAR(100),
    City VARCHAR(50) NOT NULL,
    Postal_code INT NOT NULL,
    profile_pic VARCHAR(255) NOT NULL,

FOREIGN KEY (user_id) REFERENCES user_account(user_id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(50) NOT NULL,
    total_amount INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user_account(user_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE order_item (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product(product_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

CREATE TABLE payment (
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    payment_method VARCHAR(50) NOT NULL,
    payment_status VARCHAR(50) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(order_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);



