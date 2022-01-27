# Crud Controle Estoque FULL STACK PROJECT
## Objetivo do Programa

O intuito do projeto é monitorar o estoque de uma empresa fictícia, que inclui desde a criação o banco de dados até o desenvolvimento do site.




## Conceptual Model

![SerialResult.JPG]()

The code in c solves the Poisson elliptical P.D.E by calculating the matrix that approximates the solution to the P.D.E. The steps to calculate the matrix are illustrated above.

## Motivação

Este projeto foi desenvolvido a partir de uma prova que achei demasiadamente interessante. Em sua concepção utilizei as linguagens html, css, javascript, php, sql e blade, além do framework laravel e bootstrap. Tal prova serviu tanto  para testar minhas abilidades, quanto para  meu prendizado, já que precisei utilizar relações manyTomany e triggers em meu projeto. Portanto concerteza este projeto terá aplicações futuras. :smiley:

## Observações IMPORTANTES sobre o programa

As imagens que devem ser inseridas no site necessitam ser incluídas empregando o botão de editar, ou de criar um novo produto, kit. Para que não haja erros é aconselhável criar o banco na ordem CriarBancoMM -> TriggerBancoMM-> InsertBancoMM -> RelatorioAMM -> RelatorioBMM -> AlteracaoMM. Digo isto, pois o path da imagem foi adicionado após a criação do banco de dados.

## Instructions for compiling and executing the code

### Initial requirements

To compile the code you need any compiler that has the OpenMP shared memory API (compilers list: https://www.openmp.org/resources/openmp-compilers-tools/), however it is recommended to use GNU compiler, because some specific optimization flags I used can only be applied with this compiler.

### Compiling and running the code

To compile the code in serial using the GNU compiler do:

```bash
gcc PDE_MM_SerialCode.c -lm
```

and run:

```bash
./a.out
```

To compile the code in parallel using the GNU compiler do:

```bash
gcc -fopenmp -o prg.x PDE_MM_OpenMPCode.c -lm
```
export the number of threads:

```bash
export OMP_NUM_THREADS=number of threads
```

and run the program at the end:

```bash
./prg.x
```

## Built With

* [OpenMP-4.0](https://www.openmp.org/wp-content/uploads/OpenMP4.0.0.pdf) - Documentation OpenMP version 4.0
* [OpenMP-4.5](https://www.openmp.org/wp-content/uploads/openmp-4.5.pdf) - Documentation OpenMP version 4.5



## Contributing 

Reviews and suggestions feel free to send me:

e-mail: marcosmatheusdepaivasilva@gmail.com

LinkedIn: linkedin.com/in/marcos-silva-089699b3 :hugs:

## Author

Marcos Matheus de Paiva Silva

## Créditos

Este código foi desenvolvido baseado em tudo que aprendi com:

Dary Nazar, Gustavo Neitzke, Bruno Campos, Fábio dos Reis, William Francisco Leite (dev Media), Samiron Barai, Gustavo Guanabara,Hoheckell Filho ,Povilas Korop , Pablo de Deus.

As Imagens foram disponibilizados por:

 www.pixabay.com, www.pnglib.com, https://unsplash.com/.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details 
