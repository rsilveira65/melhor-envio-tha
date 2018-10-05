# packer

Considerando que e-commerces podem realizar a venda de uma lista de produtos que podem ser adicionados ao carrinho e que é necessário realizar o
cálculo de frete para o pedido, desenvolva uma API que calcule a partir da lista de produtos os volumes (caixas) necessárias para realizar o envio que posteriormente
serão utilizados para calcular o valor total do frete.

Cada produto da lista contém:
- ID/Código identificador
- Quantidade de itens do mesmo produto
- Dimensões em centímetros (altura, largura e comprimento)
- Peso em Quilogramas, 0,35 = 350 gramas

O resultado da API deverá ser uma lista de volumes com altura, largura,
comprimento em centímetros, peso em quilogramas, lista de produtos que estão em
cada caixa contendo o id do produto e quantidades de cada um. Está lista de
volumes deverá ser única por transportadora, pois os volumes finais deverão
respeitar os limites de cada.

Considerações:
- Não será possível enviar volumes maiores que o limites das transportadoras,
portanto verifique os mesmos e se necessário divida os produtos em mais
volumes, caso os volumes finais sejam menores que os limites mínimos,
considere as dimensões mínimas para os volumes finais.
- Caso algum produto ultrapasse os limites da transportadora, deverá retornar
uma mensagem de aviso que não é possível realizar o envio.
- Considere fazer o melhor possível para empacotar os produtos no menor
número de volumes (caixas) possível.

#### CORREIOS

|  | MÍNIMO  |  MÁXIMO |
|-----|-----|------|
| PESO | 0 | 30 kg |
| ALTURA (A) | 2 cm | 105 cm | 
| LARGURA (L) | 11 cm | 105 cm | 
| COMPRIMENTO (C) | 16 cm | 105 cm |  

#### JADLOG

|  | MÍNIMO  |  MÁXIMO |
|-----|-----|------|
| PESO | 0 | 150 kg |
| ALTURA (A) | 1 cm | 100 cm | 
| LARGURA (L) | 1 cm | 105 cm | 
| COMPRIMENTO (C) | 1 cm | 181 cm | 

#### VIA BRASIL

|  | MÍNIMO  |  MÁXIMO |
|-----|-----|------|
| PESO | 0 | 200 kg |
| ALTURA (A) | 1 cm | 200 cm | 
| LARGURA (L) | 1 cm | 200 cm | 
| COMPRIMENTO (C) | 1 cm | 240 cm | 
