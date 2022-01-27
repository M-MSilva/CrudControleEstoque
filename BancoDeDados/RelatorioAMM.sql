USE controleestoque;
create view RelatorioAParte1 as (select 
    CONCAT(p.Nome_prod,' ', p.recipiente_produto,' ', p.unidade_medida) as PRODUTO, rp.quantidade as QTD_REQUISITADA,
	rp.quantidade*p.Preco_custo_prod as PRECO_CUSTO_TOTAl,
	rp.quantidade*Preco_venda_prod as PRECO_VENDA_TOTAL,
    R.data_Req as 'DATA'
from Produtos_Requisicoes rp
inner join produtos p
on p.idProduto  = rp.idProduto
inner join requisicoes R
on R.idRequisicao = rp.idRequisicao
where Classe_Requisicao = 'entrada' and R.data_Req
BETWEEN '2009.10.11' AND '2009.12.10'
union 	
select 
    CONCAT(k.P_Nome_kit,' ',k.S_Nome_kit) as Produto, rk.quantidade_Kit as QTD_REQUISITADA,
	rk.quantidade_Kit*k.preco_custo_Kit as PRECO_CUSTO_TOTAl,
	rk.quantidade_Kit*k.preco_venda_kit as PRECO_VENDA_TOTAL,
    R.data_Req as 'DATA'
from kits_requisioes rk
inner join Kits k
on rk.idKit  = k.idKit
inner join requisicoes R
on R.idRequisicao = rk.idRequisicao
where Classe_Requisicao = 'Entrada' and R.data_Req
BETWEEN '2009.10.11' AND '2009.12.10');

create view RelatorioAParte2 as(
select * from RelatorioAParte1
UNION 
SELECT "TOTAL", 
		' ',
        SUM(PRECO_CUSTO_TOTAL), 
        SUM(PRECO_VENDA_TOTAL),
        ' '
 FROM   RelatorioAParte1);
 
 select 
	PRODUTO, QTD_REQUISITADA as 'QTD. REQUISITADA',
	concat('R$ ',PRECO_CUSTO_TOTAl) as 'PREÇO CUSTO TOTAL',
	concat('R$ ',PRECO_VENDA_TOTAl) as 'PREÇO VENDA TOTAL'
 from RelatorioAParte2;





 
