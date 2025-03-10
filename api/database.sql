CREATE TABLE users(
    "id_user" INT NOT NULL AUTO_INCREMENT,
    "username" varchar(50) NOT NULL,
    "password" varchar(255) NOT NULL,
    "token" varchar(50),
    "is_archived" BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY (`id_user`)
);

CREATE TABLE orders(
    "id_order" INT NOT NULL AUTO_INCREMENT,
    "prix" INT NOT NULL,
    "date" DATE NOT NULL,
    "id_user" INT,
    "is_archived" BOOLEAN NOT NULL DEFAULT FALSE,
    PRIMARY KEY ("id_order"),
    FOREIGN KEY ("id_user") REFERENCES users("id_user")
);