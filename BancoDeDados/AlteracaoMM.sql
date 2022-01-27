/*para o path da imagem */
ALTER TABLE `Produtos`
ADD COLUMN `image` varchar(1024);

ALTER TABLE `Kits`
ADD COLUMN `image` varchar(1024);