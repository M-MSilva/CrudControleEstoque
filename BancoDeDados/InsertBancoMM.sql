USE controleEstoque;

insert into estoques values ('1','Simples');
insert into estoques values ('2','Composto');


insert into usuarios values ('1','João','18');


#entrada No estoque												
									#ano mes dia
insert into Requisicoes values('1',1,'2009-10-10'); #nao estara no relatorio
insert into Requisicoes values('2',1,'2009-11-11');
insert into Requisicoes values('3',1,'2009-11-12');



#Saida no estoque
insert into Requisicoes values('4',1,'2009-11-13');
insert into Requisicoes values('5',1,'2009-11-14');
insert into Requisicoes values('6',1,'2009-11-15');
insert into Requisicoes values('7',1,'2009-11-16');
insert into Requisicoes values('8',1,'2009-12-11');#nao estara no relatorio



insert into Kits values('1','Refrigerante','Lata','350ml','Fardo','12UND.',13.90,10.20);
insert into Kits values('2','Cesta',' ',' ','Básica',' ',25.00,18.00);



insert into Produtos values('1','Refrigerante',' ',' ','lata','350ml',0.85,1.20); 
insert into Produtos values('2','Café',' ',' ','PCT.','500gr',3.00,4.50); 
insert into Produtos values('3','Arroz','Branco','1','pacote','5kg',3.90,5.00); 
insert into Produtos values('4','Feijão','Preto','1','PCT.','1kg',1.80,2.90); 

#select * from Estoques_Produtos;


/*Inserindo na cesta basica*/
insert into Kits_Produtos (idProduto,idKit,quantidade) values(3,2,'2');
insert into Kits_Produtos (idProduto,idKit,quantidade) values(4,2,'4');
insert into Kits_Produtos (idProduto,idKit,quantidade) values(2,2,'1');


/*Inserindo no fardo de refrigerante*/
insert into Kits_Produtos (idProduto,idKit,quantidade) values(1,1,'12');

/* INSEREIR ALGUNS PRODUTOS NO ESTOQUE PARA NAO TER VALORES NEGATIVOS NO ESTOQUE,
JÀ QUE ALGUNS PRODUTOS APENAS SÂO RETIRADOS DO ESTOQUE NA REGRA DE NEGÓCIO*/ 

insert into Estoques_Produtos values(1,3,'40');
insert into Estoques_Produtos values(1,4,'80');
insert into Estoques_Produtos values(1,2,'20');



/*quantos PRODUTOS que foram requisitados e afins*/
/* requsicao de entrada de PRODUTOS*/

insert into Produtos_Requisicoes values(2,1,'25','Entrada');
insert into Produtos_Requisicoes values(1,3,'10','Entrada');#nao estara  no relatorio


#saida de produto
/*Requisicao de saida de PRODUTOS*/

insert into Produtos_Requisicoes values(4,1,'25','Saída');
insert into Produtos_Requisicoes values(5,3,'20','Saída');
insert into Produtos_Requisicoes values(6,4,'40','Saída');
insert into Produtos_Requisicoes values(7,2,'10','Saída');
insert into Produtos_Requisicoes values(8,4,'3','Saída');#nao estara no relatorio



/*quantos kits  ou produtos compostos, entraram no estoque*/
insert into kits_requisioes values(2,3,'10','Entrada');




