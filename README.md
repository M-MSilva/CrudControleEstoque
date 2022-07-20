# Controle de Estoque - FULL STACK PROJECT :computer: :office: :package: 

![toguether.png](https://github.com/M-MSilva/CrudControleEstoque/blob/master/toguether.png) 

## Sobre este projeto

O intuito do projeto é monitorar o estoque de uma empresa fictícia, que inclui desde a criação o banco de dados (SQL) até o desenvolvimento do site.

## Aplicações 

O projeto vigente pode ser utilizado para corroborar com sua empresa no gerenciamento de estoque, desde a criação de novos objetos (produtos) até sua ediação e exclusão, bem como na geração de relatórios, e versionamento de dados. Apesar deste programa fazer parte do meu portfólio pessoal sinta-se à vontade para utilizá-lo em estudos, reparos e melhorias. :call_me_hand:

## Observações importantes sobre o programa

As imagens que devem ser inseridas no site necessitam ser incluídas empregando o botão de editar, ou de criar um novo produto/kit. Para que não haja erros é aconselhável criar o banco de dados na ordem de arquivos CriarBancoMM -> TriggerBancoMM-> InsertBancoMM -> RelatorioAMM -> RelatorioBMM -> AlteracaoMM. Digo isto, pois o path da imagem foi adicionado após a criação do banco de dados.

## Motivação

Este projeto foi desenvolvido a partir de uma prova que achei demasiadamente interessante. Em sua concepção utilizei as linguagens **html**, **css**, **javascript**, **php**, **sql** e **blade**, além do framework **laravel** e **bootstrap**. Tal prova serviu tanto  para testar minhas habilidades, quanto para  meu aprendizado, já que precisei utilizar relações manyTomany e triggers em meu projeto. Portanto, concerteza este programa terá aplicações futuras. :smiley:

## Funcionalidades

### Web:

* Crie novos usuários ou funcionários, produtos ou Kits (os kits são produtos compostos, como por exemplo uma cesta básica);
* Atualize tais usuários e produtos;
* Delete-os;
* Veja os usuários e produtos serem inseridos/excluidos no site e no banco de dados;


### Banco de Dados:

* Insira/Delete/organize novos produtos, usuários e requisições (as requisições são a maneira como um funcionário opera o estoque na retirada/entrada de produtos);
* Veja os produtos serem inseridos no estoque automaticamente pelo intermédio das requisições (as requisições acionam os triggers de entrada e saída de produtos no estoque);
* Faça "relatórios" de produtos que saíram e entraram no estoque;
* Altere o banco de dados como quiser;

## Instruções para e executar e/ou compilar o código

### Requisitos Iniciais

Segundo a documentação do Laravel, para executar um programa que utiliza este framework é necessário ter:

* O PHP na versão 7.2 ou superior;
* Um Composer;
* Um servidor como Apache/Nginx;
* E um editor de código ou IDE de sua preferência.

Entretanto, na construção de meu projeto utilizei algumas coisas a mais, que será abordado na seção seguinte.

### Contruído Com

* [Laravel-5.6](https://laravel.com/docs/5.6);
* [Bootstrap-4.6](https://getbootstrap.com/docs/4.6/getting-started/introduction/);
* [Composer-2.1.14](https://getcomposer.org/download/);
* [Php-7.3.33](https://www.php.net/releases/index.php);
* [jquery-2.1.3](https://jquery.com/download/);
* [Mysql-atual](https://dev.mysql.com/downloads/workbench/);


### Executando o código

Após baixar o repositório e criar o banco vá para ControleEstoqueLaravelCrud/.env.example, e copie seu conteúdo para um arquivo criado que tem de ser denominado por .env. Posteriormente, altere:

```bash
DB_DATABASE=controleestoque
DB_USERNAME=
DB_PASSWORD=
```

ademais, troque para o seu usuário e senha se tiver. Posteriormento no bash ou cmd  na pasta ControleEstoqueLaravelCrud faça:

```bash
php artisan serve
```
pronto, veja o site em localhost:8000 e acesse o banco como quiser. :open_mouth:


## Contribuindo 

Críticas, dúvidas e sugestões sinta-se à vontade para me enviar:

e-mail: marcosmatheusdepaivasilva@gmail.com

LinkedIn: https://www.linkedin.com/in/marcos-matheus-silva-089699b3/ :hugs:

## Author

Marcos Matheus de Paiva Silva

## Créditos

Este código foi desenvolvido baseado em tudo que aprendi com:

Dary Nazar, Gustavo Neitzke, Bruno Campos, Fábio dos Reis, William Francisco Leite (dev Media), Samiron Barai, Gustavo Guanabara, Hoheckell Filho, Povilas Korop.

As Imagens foram disponibilizados por:

 www.pixabay.com, www.pnglib.com, https://unsplash.com/.

## License

Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
