#TRIGGER Calcular SubTotal
USE `controleEstoque`;
Delimiter $$	
CREATE TRIGGER `controleEstoque`.`CalcSubTotal` BEFORE INSERT
    ON `controleEstoque`.`Kits_Produtos`
    FOR EACH ROW BEGIN
         SET NEW.SubTotal  = NEW.quantidade*(select Preco_custo_prod from Produtos where Produtos.idProduto = NEW.idProduto);
end $$
Delimiter ;

-- -----------------------------------------------------
-- VERSIONAMENTO DE PRODUTO
-- -----------------------------------------------------
/*procedure Para Versionar o produto simples no estoque*/
DELIMITER $$     						
create procedure versionarProdutoEstoque(`id_do_produto` int,`ClsRequisicao` varchar(70),`qtd` int)
begin	
	declare i int;
	SELECT count(*) into i FROM Estoques_Produtos
    WHERE ((Estoques_Produtos.idItem_estoque = 1) and (idProduto = id_do_produto));
    
	IF (ClsRequisicao = 'Entrada' OR  qtd < 0) THEN 
		IF i > 0 THEN
			UPDATE Estoques_Produtos SET quantidade = quantidade + qtd
			WHERE ((Estoques_Produtos.idItem_estoque = 1)and (idProduto = id_do_produto));
		ELSE 
			INSERT INTO Estoques_Produtos (idItem_estoque,idProduto, quantidade) values (1,id_do_produto,qtd);
		END IF;
	ELSEIF ClsRequisicao = 'Saída' THEN 
		IF i > 0 THEN
			UPDATE Estoques_Produtos SET quantidade = quantidade - qtd
			WHERE ((Estoques_Produtos.idItem_estoque = 1) and (idProduto = id_do_produto));
		END IF;
	END IF;
end $$
DELIMITER ;

/*
trigger retirada e entrada de produto simples
idItem_estoque = 1 = produto simples
*/
USE `controleEstoque`;
Delimiter $$	
CREATE TRIGGER `controleEstoque`.`inserir_Prod_estoque` AFTER INSERT
ON `controleEstoque`.`Produtos_Requisicoes`
FOR EACH ROW
BEGIN
	call versionarProdutoEstoque(new.idProduto,NEW.Classe_Requisicao,new.quantidade);
end $$
Delimiter ;


/*Trigger de Update na requisicao de produtos simples*/
USE `controleEstoque`;
Delimiter $$	
CREATE TRIGGER `controleEstoque`.`Update_Prod_estoque` AFTER UPDATE
ON `controleEstoque`.`Produtos_Requisicoes`
FOR EACH ROW
BEGIN
	call versionarProdutoEstoque(new.idProduto,NEW.Classe_Requisicao,new.quantidade - old.quantidade);
end $$
Delimiter ;

/*Trigger de delete na requisicao de prosutos simples*/
USE `controleEstoque`;
Delimiter $$	
CREATE TRIGGER `controleEstoque`.`delete_Prod_estoque` AFTER DELETE
ON `controleEstoque`.`Produtos_Requisicoes`
FOR EACH ROW
BEGIN
	call versionarProdutoEstoque(old.idProduto,old.Classe_Requisicao,old.quantidade*-1);
end $$
Delimiter ;


-- -----------------------------------------------------
-- VERSIONAMENTO DE PRODUTO COMPOSTO
-- -----------------------------------------------------
/*Procedure Para Versionar o produto composto no estoque*/
USE controleEstoque;
DELIMITER $$     						
create procedure versionarKITestoque(`id_do_kit` int,`ClsRequisicao` varchar(70),`qtd_KIT` int)
begin
	declare id_produto_p int;
	declare id_produto_u int;
    
    declare i int;
    declare qtd_de_produto_do_kit int;
    declare id_prod int;
    declare fimloop int default 0;
    declare qtdee int;
    declare cursorQtd cursor for select quantidade from Kits_Produtos where idKit = id_do_kit;
    declare cursoridProduto cursor for select idProduto from Kits_Produtos where idKit = id_do_kit; 
    declare continue handler for not found set fimloop=1;
    
    set id_produto_p = (select min(idProduto) from Kits_Produtos where idKit = id_do_kit);
    set id_produto_u = (select max(idProduto) from Kits_Produtos where idKit = id_do_kit);
    
    open cursorQtd;
	open cursoridProduto;
    
	while(fimloop!=1)do
		fetch cursorQtd into qtd_de_produto_do_kit; 
		fetch cursoridProduto into id_prod;
        
        SELECT count(*) into i FROM Estoques_Produtos
		WHERE ((Estoques_Produtos.idItem_estoque = 2) and (Estoques_Produtos.idProduto = id_prod));
        
	
        IF (ClsRequisicao = 'Entrada' OR  qtd_KIT < 0) THEN 
			IF i = 0 and (id_prod between id_produto_p and id_produto_u) THEN
				INSERT INTO Estoques_Produtos values (2,id_prod,qtd_KIT*qtd_de_produto_do_kit);
			ELSE 
				UPDATE Estoques_Produtos SET quantidade = quantidade + (qtd_KIT*qtd_de_produto_do_kit) 
				WHERE ((Estoques_Produtos.idItem_estoque = 2) and (Estoques_Produtos.idProduto = id_prod));
			END IF;
		ELSEIF ClsRequisicao = 'Saída' THEN 
			IF i > 0 THEN
				UPDATE Estoques_Produtos SET quantidade = quantidade - (qtd_KIT*qtd_de_produto_do_kit) 
				WHERE ((Estoques_Produtos.idItem_estoque = 2) and (Estoques_Produtos.idProduto = id_prod));
			END IF;
		END IF;
    set id_prod = 0;
    set qtd_de_produto_do_kit = 0;
    set i = 0;
    set qtdee = 0;
	end while;
    #close cursorQtd;
	#close cursoridProduto;
end $$
DELIMITER ;

/*trigger retirada e entrada de produto compostos = kit
idItem_estoque = 2 = produto composto*/
USE controleEstoque;
Delimiter $$	
CREATE TRIGGER `controleEstoque`.`versionar_Kit_estoque` AFTER INSERT
ON `controleEstoque`.`kits_requisioes`
FOR EACH ROW
BEGIN
	call versionarKITestoque(new.idKit,new.Classe_Requisicao,new.quantidade_Kit);
END $$
Delimiter ;

/*trigger de Update na requisicao de produtos simples*/
USE controleEstoque;
Delimiter $$	
CREATE TRIGGER `controleEstoque`.`update_Kit_estoque` AFTER UPDATE
ON `controleEstoque`.`kits_requisioes`
FOR EACH ROW
BEGIN
	call versionarKITestoque(new.idKit,new.Classe_Requisicao,new.quantidade_Kit - old.quantidade_Kit);
END $$
Delimiter ;

/*Trigger de delete na requisicao de produtos simples*/
USE `controleEstoque`;
Delimiter $$	
CREATE TRIGGER `controleEstoque`.`delete_Kit_estoque` AFTER DELETE
ON `controleEstoque`.`kits_requisioes`
FOR EACH ROW
BEGIN
	call versionarKITestoque(old.idKit,old.Classe_Requisicao,old.quantidade_Kit*-1);
end $$
Delimiter ;


