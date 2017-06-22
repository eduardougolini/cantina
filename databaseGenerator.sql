-- MySQL Script generated by MySQL Workbench
-- qua 21 jun 2017 20:58:19 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cantina
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cantina
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cantina` DEFAULT CHARACTER SET utf8 ;
USE `cantina` ;

-- -----------------------------------------------------
-- Table `cantina`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`person` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `birth` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `rg` VARCHAR(45) NOT NULL,
  `responsible` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`account` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT 'É o mesmo ID do cliente.',
  `balance` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`client` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `regitration` VARCHAR(45) NOT NULL,
  `person_id` INT NOT NULL,
  `account_id` INT NOT NULL,
  UNIQUE INDEX `matricula_UNIQUE` (`regitration` ASC),
  INDEX `fk_cliente_pessoa1_idx` (`person_id` ASC),
  INDEX `fk_cliente_conta1_idx` (`account_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_cliente_pessoa1`
    FOREIGN KEY (`person_id`)
    REFERENCES `cantina`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_conta1`
    FOREIGN KEY (`account_id`)
    REFERENCES `cantina`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`sale`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`sale` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `client_id` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `type` ENUM('DINHEIRO', 'CARTAO', 'DEBITO') NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_venda_cliente1_idx` (`client_id` ASC),
  CONSTRAINT `fk_venda_cliente1`
    FOREIGN KEY (`client_id`)
    REFERENCES `cantina`.`client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`transaction` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sale_id` INT NOT NULL,
  `account_id` INT NULL,
  `type` ENUM('DINHEIRO', 'CARTAO', 'DEBITO') NOT NULL,
  `value` DECIMAL(10,2) NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_transacao_conta1_idx` (`account_id` ASC),
  INDEX `fk_transacao_venda1_idx` (`sale_id` ASC),
  CONSTRAINT `fk_transacao_conta1`
    FOREIGN KEY (`account_id`)
    REFERENCES `cantina`.`account` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transacao_venda1`
    FOREIGN KEY (`sale_id`)
    REFERENCES `cantina`.`sale` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`provider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`provider` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`image` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `path` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `provider_id` INT NOT NULL,
  `image_id` INT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `value` DECIMAL(10,2) NOT NULL,
  `amount` INT NOT NULL,
  `date_entry` DATETIME NOT NULL,
  `validity` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`name` ASC),
  INDEX `fk_produto_Fornecedor1_idx` (`provider_id` ASC),
  INDEX `fk_product_image1_idx` (`image_id` ASC),
  CONSTRAINT `fk_produto_Fornecedor1`
    FOREIGN KEY (`provider_id`)
    REFERENCES `cantina`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_image1`
    FOREIGN KEY (`image_id`)
    REFERENCES `cantina`.`image` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`sale_has_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`sale_has_product` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sale_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `amount` INT NOT NULL,
  INDEX `fk_venda_has_produto_produto1_idx` (`product_id` ASC),
  INDEX `fk_venda_has_produto_venda1_idx` (`sale_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_venda_has_produto_venda1`
    FOREIGN KEY (`sale_id`)
    REFERENCES `cantina`.`sale` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_has_produto_produto1`
    FOREIGN KEY (`product_id`)
    REFERENCES `cantina`.`product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `person_id` INT NULL,
  `provider_id` INT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `district` VARCHAR(45) NOT NULL,
  `cep` INT NOT NULL,
  `number` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_address_person1_idx` (`person_id` ASC),
  INDEX `fk_address_provider1_idx` (`provider_id` ASC),
  CONSTRAINT `fk_address_person1`
    FOREIGN KEY (`person_id`)
    REFERENCES `cantina`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_address_provider1`
    FOREIGN KEY (`provider_id`)
    REFERENCES `cantina`.`provider` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `person_id` INT NOT NULL,
  `function` VARCHAR(100) NOT NULL,
  INDEX `fk_funcionario_pessoa1_idx` (`person_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_funcionario_pessoa1`
    FOREIGN KEY (`person_id`)
    REFERENCES `cantina`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `image_id` INT NULL,
  `person_id` INT NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(300) NOT NULL,
  `remember_token` VARCHAR(200) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_pessoa1_idx` (`person_id` ASC),
  INDEX `fk_users_image1_idx` (`image_id` ASC),
  CONSTRAINT `fk_usuario_pessoa1`
    FOREIGN KEY (`person_id`)
    REFERENCES `cantina`.`person` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_image1`
    FOREIGN KEY (`image_id`)
    REFERENCES `cantina`.`image` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`users_has_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`users_has_role` (
  `users_id` INT NOT NULL,
  `role_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `role_id`),
  INDEX `fk_users_has_role_role1_idx` (`role_id` ASC),
  INDEX `fk_users_has_role_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_role_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `cantina`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_role_role1`
    FOREIGN KEY (`role_id`)
    REFERENCES `cantina`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cantina`.`payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cantina`.`payment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `client_id` INT NOT NULL,
  `value` DECIMAL(10,2) NOT NULL,
  `paid` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `fk_payment_client1_idx` (`client_id` ASC),
  CONSTRAINT `fk_payment_client1`
    FOREIGN KEY (`client_id`)
    REFERENCES `cantina`.`client` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `role` (`id`, `name`) VALUES (NULL, 'user'), (NULL, 'manager');
