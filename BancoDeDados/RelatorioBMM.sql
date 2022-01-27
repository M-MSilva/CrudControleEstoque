/*funcao para calcular quantidade de cada produto do kit que sera retirado do estoque*/
USE controleestoque;
Delimiter $$				
create FUNCTION qtdProduto(`id_do_kit` int, `qtd_KIT` int)
RETURNS INT
begin
	DECLARE soma INT default 0;
	declare qtd int default 0;
    declare fimloop int default 0;
    declare qtProd cursor for select  quantidade from kits_produtos where idKit = id_do_kit;
    declare continue handler for not found set fimloop=1;
    
    #abrir o cursor
    open qtProd;
    
	while(fimloop!=1)do
		fetch qtProd into qtd; 
        SET soma = soma + qtd_KIT*qtd;
    set qtd = 0;
	end while;
    
 RETURN soma;

end $$
Delimiter ;

/*RELATORIO LETRA B DE FATO*/
USE controleestoque;
create view RelatorioBParte1 as (select 
    CONCAT(p.Nome_prod,' ', p.recipiente_produto,' ', p.unidade_medida) as PRODUTO, rp.quantidade as QTD_RETIRADA_DO_ESTOQUE,
	rp.quantidade*p.Preco_custo_prod as PRECO_CUSTO_TOTAl,
	rp.quantidade*Preco_venda_prod as PRECO_VENDA_TOTAL,
    R.data_Req as 'DATA'
from Produtos_Requisicoes rp
inner join produtos p
on p.idProduto  = rp.idProduto
inner join requisicoes R
on R.idRequisicao = rp.idRequisicao
where Classe_Requisicao = 'Saída' and R.data_Req
BETWEEN '2009.10.11' AND '2009.12.10'
union 	
select 
    CONCAT(k.P_Nome_kit,' ',k.S_Nome_kit) as Produto, qtdProduto(k.idKit,rk.quantidade_Kit) as QTD_RETIRADA_DO_ESTOQUE,
	rk.quantidade_Kit*k.preco_custo_Kit as PRECO_CUSTO_TOTAl,
	rk.quantidade_Kit*k.preco_venda_kit as PRECO_VENDA_TOTAL,
    R.data_Req as 'DATA'
from kits_requisioes rk
inner join Kits k
on rk.idKit  = k.idKit
inner join requisicoes R
on R.idRequisicao = rk.idRequisicao
where Classe_Requisicao = 'Saída' and R.data_Req
BETWEEN '2009.10.11' AND '2009.12.10');

create view RelatorioBParte2 as(
select * from RelatorioBParte1
UNION 
SELECT "TOTAL", 
		' ',
        SUM(PRECO_CUSTO_TOTAL), 
        SUM(PRECO_VENDA_TOTAL),
        ' '
 FROM   RelatorioBParte1);
 
 select 
	PRODUTO, QTD_RETIRADA_DO_ESTOQUE as 'QTD. RETIRADA DO ESTOQUE',
	concat('R$ ',PRECO_CUSTO_TOTAl) as 'PREÇO CUSTO TOTAL',
	concat('R$ ',PRECO_VENDA_TOTAl) as 'PREÇO VENDA TOTAL'
 from RelatorioBParte2;



/*PARA TESTAR KITS QUE SAIRAM DO ESTOQUE*/
/*
insert into Requisicoes values('9',1,'2009-11-17');
insert into kits_requisioes values(1,9,'3','Saída');
*/






 
