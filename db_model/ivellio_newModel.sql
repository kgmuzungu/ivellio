-- MySQL Script generated by MySQL Workbench
-- zo 22 okt 2017 18:47:26 CEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema DaaS
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DaaS
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DaaS` DEFAULT CHARACTER SET utf8 ;
USE `DaaS` ;

-- -----------------------------------------------------
-- Table `DaaS`.`devices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DaaS`.`devices` (
  `iddevices` INT NOT NULL AUTO_INCREMENT,
  `dev_arbeitsplatz` VARCHAR(45) NOT NULL,
  `dev_device` VARCHAR(255) NOT NULL,
  `dev_beschreibung` VARCHAR(255) NULL,
  `dev_preis` DECIMAL(7,2) NOT NULL,
  `dev_anwendung` VARCHAR(255) NOT NULL,
  `dev_geeignet` VARCHAR(255) NOT NULL,
  `dev_imagepath` VARCHAR(255) NULL,
  PRIMARY KEY (`iddevices`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DaaS`.`config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DaaS`.`config` (
  `idconfig` INT NOT NULL AUTO_INCREMENT,
  `conf_iddevice` INT NOT NULL,
  `conf_type` VARCHAR(45) NOT NULL,
  `conf_name` VARCHAR(45) NOT NULL,
  `conf_beschreibung` VARCHAR(255) NULL,
  `conf_prechecked` TINYINT(1) NULL,
  `conf_preis` DECIMAL(7,2) NOT NULL,
  `conf_image_path` VARCHAR(255) NULL,
  `conf_select_option` VARCHAR(45) NULL,
  PRIMARY KEY (`idconfig`),
  INDEX `iddevices_FK_idx` (`conf_iddevice` ASC),
  CONSTRAINT `iddevices_FK`
    FOREIGN KEY (`conf_iddevice`)
    REFERENCES `DaaS`.`devices` (`iddevices`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
