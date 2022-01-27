-- -----------------------------------------------------
-- Schema controleestoque
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema controleestoque
-- -----------------------------------------------------
CREATE SCHEMA  `controleestoque` DEFAULT CHARACTER SET utf8 ;
USE `controleestoque` ;

-- -----------------------------------------------------
-- Table `controleestoque`.`estoques`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Estoques` (
  `idItem_Estoque` INT NOT NULL AUTO_INCREMENT,
  `Tipo_Produto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idItem_estoque`));


-- -----------------------------------------------------
-- Table `controleestoque`.`produtos`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Produtos` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `Nome_prod` VARCHAR(70) NULL DEFAULT NULL,
  `cor` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `recipiente_produto` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida` VARCHAR(45) NULL DEFAULT NULL,
  `Preco_custo_prod` DOUBLE NULL DEFAULT NULL,
  `Preco_venda_prod` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`idProduto`));


-- -----------------------------------------------------
-- Table `controleestoque`.`Estoques_Produtos`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Estoques_Produtos` (
  `idItem_estoque` INT NOT NULL,
  `idProduto` INT NOT NULL,
  `quantidade` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idItem_estoque`, `idProduto`),
  INDEX `fk_Estoques_Produtos_Produtos1_idx` (`idProduto` ASC) VISIBLE,
  INDEX `fk_Estoques_Produtos_Estoques1_idx` (`idItem_estoque` ASC) VISIBLE,
  CONSTRAINT `fk_Estoques_Produtos_Estoques1`
    FOREIGN KEY (`idItem_estoque`)
    REFERENCES `controleestoque`.`Estoques` (`idItem_estoque`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Estoques_Produtos_Produtos1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `controleestoque`.`Produtos` (`idProduto`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `controleestoque`.`kits`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Kits` (
  `idKit` INT NOT NULL AUTO_INCREMENT,
  `P_Nome_kit` VARCHAR(70) NOT NULL,
  `recipiente_kit` VARCHAR(45) NULL DEFAULT NULL,
  `unidade_medida_kit` VARCHAR(45) NULL DEFAULT NULL,
  `S_Nome_kit` VARCHAR(45) NULL DEFAULT NULL,
  `UND` VARCHAR(45) NULL DEFAULT NULL,
  `Preco_venda_Kit` DOUBLE NOT NULL,
  `Preco_custo_kit` DOUBLE NOT NULL,
  PRIMARY KEY (`idKit`));


-- -----------------------------------------------------
-- Table `controleestoque`.`kits_produtos`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Kits_Produtos` (
  `idProduto` INT NOT NULL ,
  `idKit` INT NOT NULL,
  `quantidade` INT NULL DEFAULT NULL,
  `SubTotal` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`idProduto`, `idKit`),
  INDEX `fk_kits_Produtos_Kits1_idx` (`idKit` ASC) VISIBLE,
  INDEX `fk_kits_Produtos_Produtos1_idx` (`idProduto` ASC) VISIBLE,
  CONSTRAINT `fk_kits_Produtos_kits1`
    FOREIGN KEY (`idKit`)
    REFERENCES `controleestoque`.`Kits` (`idKit`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_kits_Produtos_Produtos1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `controleestoque`.`Produtos` (`idProduto`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `controleestoque`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nome_User` VARCHAR(70) NOT NULL,
  `idade_User` INT NOT NULL,
  PRIMARY KEY (`idUsuario`));


-- -----------------------------------------------------
-- Table `controleestoque`.`requisicoes`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Requisicoes` (
  `idRequisicao` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `data_Req` DATE NOT NULL,
  PRIMARY KEY (`idRequisicao`),
  INDEX `fk_Requisicoes_Usuarios1_idx` (`idUsuario` ASC) VISIBLE,
  CONSTRAINT `fk_Requisicoes_Usuarios1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `controleestoque`.`Usuarios` (`idUsuario`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `controleestoque`.`kits_requisioes`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`kits_Requisioes` (
  `idKit` INT NOT NULL,
  `idRequisicao` INT NOT NULL,
  `quantidade_Kit` INT NOT NULL,
  `Classe_Requisicao` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`idKit`, `idRequisicao`),
  INDEX `fk_kits_Requisioes_Requisioes1_idx` (`idRequisicao` ASC) VISIBLE,
  INDEX `fk_kits_Requisioes_Kits1_idx` (`idKit` ASC) VISIBLE,
  CONSTRAINT `fk_kits_Requisioes_Kits1`
    FOREIGN KEY (`idKit`)
    REFERENCES `controleestoque`.`Kits` (`idKit`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_kits_Requisioes_Requisioes1`
    FOREIGN KEY (`idRequisicao`)
    REFERENCES `controleestoque`.`Requisicoes` (`idRequisicao`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `controleestoque`.`Produtos_Requisicoes`
-- -----------------------------------------------------
CREATE TABLE  `controleestoque`.`Produtos_Requisicoes` (
  `idRequisicao` INT NOT NULL AUTO_INCREMENT,
  `idProduto` INT NOT NULL,
  `quantidade` INT NOT NULL,
  `Classe_Requisicao` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`idRequisicao`, `idProduto`),
  INDEX `fk_Produtos_Requisicoes_Produtos1_idx` (`idProduto` ASC) VISIBLE,
  INDEX `fk_Produtos_Requisicoes_Requisicoes1_idx` (`idRequisicao` ASC) VISIBLE,
  CONSTRAINT `fk_Produtos_Requisicoes_Produtos1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `controleestoque`.`Produtos` (`idProduto`)
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Produtos_Requisicoes_Requisicoes1`
    FOREIGN KEY (`idRequisicao`)
    REFERENCES `controleestoque`.`Requisicoes` (`idRequisicao`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE);
