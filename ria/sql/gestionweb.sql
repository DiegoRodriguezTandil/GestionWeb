SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `gestion` ;
CREATE SCHEMA IF NOT EXISTS `gestion` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `gestion` ;

-- -----------------------------------------------------
-- Table `gestion`.`asiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`asiento` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`asiento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `estado` VARCHAR(1) NOT NULL DEFAULT 'H' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`persona` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`persona` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `razon social` VARCHAR(45) NOT NULL ,
  `empresa` VARCHAR(45) NULL ,
  `dni` VARCHAR(45) NULL ,
  `web` VARCHAR(45) NULL ,
  `foto` VARCHAR(255) NULL ,
  `intereses` VARCHAR(255) NULL ,
  `cuit` VARCHAR(15) NULL ,
  `fechaAlta` DATE NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`cuenta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`cuenta` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`cuenta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `maxCTACTE` DECIMAL(10,2) NULL ,
  `persona_id` INT(11) NULL ,
  `cliente` TINYINT(1) NULL ,
  `provedor` TINYINT(1) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cliente_persona` (`persona_id` ASC) ,
  CONSTRAINT `fk_cliente_persona`
    FOREIGN KEY (`persona_id` )
    REFERENCES `gestion`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`detalleAsiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`detalleAsiento` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`detalleAsiento` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cuenta_id` INT NOT NULL ,
  `tipoDiario` VARCHAR(1) NULL ,
  `tipoMayor` VARCHAR(1) NULL ,
  `importe` DECIMAL(10,2) NOT NULL ,
  `asiento_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_detalle_asiento` (`asiento_id` ASC) ,
  INDEX `fk_detalle_cuenta` (`cuenta_id` ASC) ,
  CONSTRAINT `fk_detalle_asiento`
    FOREIGN KEY (`asiento_id` )
    REFERENCES `gestion`.`asiento` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_cuenta`
    FOREIGN KEY (`cuenta_id` )
    REFERENCES `gestion`.`cuenta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`tipoContacto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`tipoContacto` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`tipoContacto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NOT NULL ,
  `descriptor` VARCHAR(10) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`mail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`mail` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`mail` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` INT NOT NULL ,
  `direccion` VARCHAR(45) NOT NULL ,
  `persona_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_mail_tipocontacto` (`tipo` ASC) ,
  INDEX `fk_mail_persona` (`persona_id` ASC) ,
  CONSTRAINT `fk_mail_tipocontacto`
    FOREIGN KEY (`tipo` )
    REFERENCES `gestion`.`tipoContacto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mail_persona`
    FOREIGN KEY (`persona_id` )
    REFERENCES `gestion`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`pais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`pais` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `codigotelefono` VARCHAR(10) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`provincia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`provincia` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`provincia` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `pais_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_provincia_pais` (`pais_id` ASC) ,
  CONSTRAINT `fk_provincia_pais`
    FOREIGN KEY (`pais_id` )
    REFERENCES `gestion`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`localidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`localidad` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`localidad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `provincia_id` INT NOT NULL ,
  `codigotelefonico` VARCHAR(45) NULL ,
  `codigopostal` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_localidad_provincia` (`provincia_id` ASC) ,
  CONSTRAINT `fk_localidad_provincia`
    FOREIGN KEY (`provincia_id` )
    REFERENCES `gestion`.`provincia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`direccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`direccion` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`direccion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipodireccion` INT NOT NULL ,
  `calle` VARCHAR(100) NOT NULL ,
  `persona_id` INT NOT NULL ,
  `numero` VARCHAR(45) NULL ,
  `localidad` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_direccion_tipocontacto` (`tipodireccion` ASC) ,
  INDEX `fk_direccion_persona` (`persona_id` ASC) ,
  INDEX `fk_direccion_localidad` (`localidad` ASC) ,
  CONSTRAINT `fk_direccion_tipocontacto`
    FOREIGN KEY (`tipodireccion` )
    REFERENCES `gestion`.`tipoContacto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_persona`
    FOREIGN KEY (`persona_id` )
    REFERENCES `gestion`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_direccion_localidad`
    FOREIGN KEY (`localidad` )
    REFERENCES `gestion`.`localidad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`telefono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`telefono` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`telefono` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `localidad` INT NULL ,
  `numero` INT NULL ,
  `tipoid` INT NULL ,
  `personaid` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_telefono_tipocontacto` (`tipoid` ASC) ,
  INDEX `fk_telefono_persona` (`personaid` ASC) ,
  INDEX `fk_telefono_localidad` (`localidad` ASC) ,
  CONSTRAINT `fk_telefono_tipocontacto`
    FOREIGN KEY (`tipoid` )
    REFERENCES `gestion`.`tipoContacto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefono_persona`
    FOREIGN KEY (`personaid` )
    REFERENCES `gestion`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefono_localidad`
    FOREIGN KEY (`localidad` )
    REFERENCES `gestion`.`localidad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`producto` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`producto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `precioVentaUnitario` DECIMAL(10,2) NULL ,
  `descripcion` VARCHAR(250) NULL ,
  `categoria_id` INT NOT NULL ,
  `precioCostoUnitario` DECIMAL(10,2) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`stock`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`stock` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`stock` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `producto_id` INT NULL ,
  `cantidad` INT NULL ,
  `cantidadMIN` INT NULL ,
  `cantidadMAX` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_stock_producto` (`producto_id` ASC) ,
  CONSTRAINT `fk_stock_producto`
    FOREIGN KEY (`producto_id` )
    REFERENCES `gestion`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `persona_id` INT NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `clave` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuario_persona` (`persona_id` ASC) ,
  CONSTRAINT `fk_usuario_persona`
    FOREIGN KEY (`persona_id` )
    REFERENCES `gestion`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`categoriaProducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`categoriaProducto` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`categoriaProducto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `categoria` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`venta` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`venta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `producto_id` INT NULL ,
  `cuenta_id` INT NULL ,
  `fecha` DATE NULL ,
  `cantidad` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_venta_producto` (`producto_id` ASC) ,
  INDEX `fk_venta_cuenta` (`cuenta_id` ASC) ,
  CONSTRAINT `fk_venta_producto`
    FOREIGN KEY (`producto_id` )
    REFERENCES `gestion`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_cuenta`
    FOREIGN KEY (`cuenta_id` )
    REFERENCES `gestion`.`cuenta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`compra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`compra` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`compra` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cuentaid` INT NULL ,
  `fecha` DATE NULL ,
  `producto_id` INT NULL ,
  `cantidad` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_compra_producto` (`producto_id` ASC) ,
  INDEX `fk_compra_cuenta` (`cuentaid` ASC) ,
  CONSTRAINT `fk_compra_producto`
    FOREIGN KEY (`producto_id` )
    REFERENCES `gestion`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_cuenta`
    FOREIGN KEY (`cuentaid` )
    REFERENCES `gestion`.`cuenta` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`formaPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`formaPago` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`formaPago` (
  `id` INT NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`factura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`factura` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`factura` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cliente_id` INT NULL ,
  `fecha` DATE NULL ,
  `numeroFactura` VARCHAR(15) NULL ,
  `formaPago_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_factura_formaPago` (`formaPago_id` ASC) ,
  CONSTRAINT `fk_factura_formaPago`
    FOREIGN KEY (`formaPago_id` )
    REFERENCES `gestion`.`formaPago` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`detalleFactura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`detalleFactura` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`detalleFactura` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `factura_id` INT NULL ,
  `producto_id` INT NULL ,
  `importe` DECIMAL(10,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_detalleFactura_factura` (`factura_id` ASC) ,
  INDEX `fk_detalleFactura_producto` (`producto_id` ASC) ,
  CONSTRAINT `fk_detalleFactura_factura`
    FOREIGN KEY (`factura_id` )
    REFERENCES `gestion`.`factura` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleFactura_producto`
    FOREIGN KEY (`producto_id` )
    REFERENCES `gestion`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '						';


-- -----------------------------------------------------
-- Table `gestion`.`recibo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`recibo` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`recibo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(15) NULL ,
  `fecha` DATE NULL ,
  `cliente_id` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gestion`.`producto_categoriaProducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gestion`.`producto_categoriaProducto` ;

CREATE  TABLE IF NOT EXISTS `gestion`.`producto_categoriaProducto` (
  `producto_id` INT NOT NULL ,
  `categoriaProducto_id` INT NOT NULL ,
  PRIMARY KEY (`producto_id`, `categoriaProducto_id`) ,
  INDEX `fk_producto_has_categoriaProducto_categoriaProducto1` (`categoriaProducto_id` ASC) ,
  INDEX `fk_producto_has_categoriaProducto_producto1` (`producto_id` ASC) ,
  CONSTRAINT `fk_producto_has_categoriaProducto_producto1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `gestion`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_categoriaProducto_categoriaProducto1`
    FOREIGN KEY (`categoriaProducto_id` )
    REFERENCES `gestion`.`categoriaProducto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `gestion`.`pais`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestion`;
INSERT INTO `gestion`.`pais` (`id`, `nombre`, `codigotelefono`) VALUES (1, 'Argentina', '54');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gestion`.`provincia`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestion`;
INSERT INTO `gestion`.`provincia` (`id`, `nombre`, `pais_id`) VALUES (1, 'Buenos Aires', 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `gestion`.`localidad`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestion`;
INSERT INTO `gestion`.`localidad` (`id`, `nombre`, `provincia_id`, `codigotelefonico`, `codigopostal`) VALUES (1, 'Tandil', 1, '249', '7000');

COMMIT;

-- -----------------------------------------------------
-- Data for table `gestion`.`formaPago`
-- -----------------------------------------------------
START TRANSACTION;
USE `gestion`;
INSERT INTO `gestion`.`formaPago` (`id`, `descripcion`) VALUES (1, 'Contado');
INSERT INTO `gestion`.`formaPago` (`id`, `descripcion`) VALUES (2, 'Cta. Cte.');

COMMIT;
