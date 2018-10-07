[![Build Status](https://travis-ci.com/rsilveira65/packer.svg?branch=develop)](https://travis-ci.com/rsilveira65/packer)
[![Build Status](https://img.shields.io/badge/coverage-75%25-green.svg)](coverage)

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

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
Just make sure you have [Docker](https://docs.docker.com/install/) and [Docker Compose](https://docs.docker.com/compose/install/) properly installed.

```sh
docker --version
docker-compose --version
```

### Installing

```sh
cp symfony/application/app/config/parameters.yml.dist symfony/application/app/config/parameters.yml
```

```sh
cp .env.dist .env
```

```sh
docker-compose up -d
```

Create the database schema.

```sh
docker exec application bin/console doctrine:schema:update --force
```

Populate the database.

```sh
docker exec application bin/console doctrine:fixture:load -n
```

Clear cache

```sh
docker exec application bin/console doctrine:cache:clear --env=prod
```

## Unit Tests
Get unit test summary on executing

```sh
docker exec application composer test
```

## API Route
[Get the Postman collection](https://www.getpostman.com/collections/d4ae21f223d6ed7e62c7)

### PackSSS
```bash
POST: http://localhost/api/pack

[
	{
		"id": 1,
		"quantity": 9,
		"weight": 30,
		"height": 50,
		"width": 60,
		"length": 50
	},
	{
		"id": 2,
		"quantity": 3,
		"weight": 30,
		"height": 50,
		"width": 60,
		"length": 50
	},
	{
		"id": 3,
		"quantity": 3,
		"weight": 30,
		"height": 50,
		"width": 70,
		"length": 50
	}
]

```

##### Response:
```bash
[
    {
        "id": 10,
        "name": "Correios",
        "minHeight": 2,
        "maxHeight": 105,
        "minWidth": 11,
        "maxWidth": 105,
        "minLength": 16,
        "maxLength": 105,
        "minWeight": 0,
        "maxWeight": 30,
        "amountOfPackages": 2,
        "volume": 1157625,
        "packages": [
            {
                "amountOfProducts": 8,
                "volume": 1275000,
                "products": [
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    }
                ]
            },
            {
                "amountOfProducts": 7,
                "volume": 1050000,
                "products": [
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    }
                ]
            }
        ]
    },
    {
        "id": 11,
        "name": "Jadlog",
        "minHeight": 1,
        "maxHeight": 100,
        "minWidth": 1,
        "maxWidth": 105,
        "minLength": 1,
        "maxLength": 181,
        "minWeight": 0,
        "maxWeight": 150,
        "amountOfPackages": 2,
        "volume": 1900500,
        "packages": [
            {
                "amountOfProducts": 13,
                "volume": 2025000,
                "products": [
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    }
                ]
            },
            {
                "amountOfProducts": 2,
                "volume": 300000,
                "products": [
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    }
                ]
            }
        ]
    },
    {
        "id": 12,
        "name": "Via Brasil",
        "minHeight": 1,
        "maxHeight": 200,
        "minWidth": 1,
        "maxWidth": 200,
        "minLength": 1,
        "maxLength": 240,
        "minWeight": 0,
        "maxWeight": 200,
        "amountOfPackages": 1,
        "volume": 9600000,
        "packages": [
            {
                "amountOfProducts": 15,
                "volume": 2325000,
                "products": [
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 3,
                        "height": 50,
                        "width": 70,
                        "length": 50,
                        "weight": 30,
                        "volume": 175000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 2,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    },
                    {
                        "id": 1,
                        "height": 50,
                        "width": 60,
                        "length": 50,
                        "weight": 30,
                        "volume": 150000
                    }
                ]
            }
        ]
    }
]
```
