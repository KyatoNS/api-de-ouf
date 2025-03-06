CREATE TABLE `user`(
    `id_user` INT NOT NULL,
    `username` varchar(50) NOT NULL,
    `password` varchar(50) NOT NULL,
    `token` varchar(50),
    PRIMARY KEY (`id_user`)
)

CREATE TABLE `order`(
    `id_order` INT NOT NULL AUTO_INCREMENT,
    `prix` INT NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`id_order`),
    FOREIGN KEY (`id_user`) REFERENCES user(`id_user`)
)