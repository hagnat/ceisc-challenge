# challenge
Desafio DEV CEISC

## Configurando seu ambiente de desenvolvimento

### Requirementos
 - docker
 - docker-compose
 - Makefile

### Instalação

1 - Clone o projeto
```shell
git clone https://github.com/ceisc/challenge.git challenge
```

2 - Execute o instalador
```shell
make install
```

3 - Adicione o host de testes ao seu arquivo `/etc/hosts`
```
127.0.0.1       ceisc-app.local
```

4 - Verifique que tudo esta funcionando corretamente, acessando http://ceisc-app.local:8000

### Testando
Para realizar os testes automaticos do phpunit, basta executar o comando `make test`
```shell
make test
```

### Terminando de desenvolver

Apos completar o desenvolvimento, lembre-se de encerrar os containers criados
pelo docker-compose.

```shell
make down
make docker-prune
```

## Agora, mãos a obra ^^

O projeto tem 3 páginas abertas:
 - listagem de publicações;
 - página da publicação;
 - página de login.

e 2 páginas de administração:
 - listagem de postagens;
 - edição de postagem.

O objetivo é criar um pequeno blog administrado por 1 pessoa.
Visitantes podem ver a listagem de postagens publicadas, e abrir a publicação completa.
O administrador pode cadastrar, editar e remover postagens.

Cada página contém instruções do que deve contemplar. OBS: rotas, controllers e views podem ser alterados a vontade.
Adicionar o debugbar ao projeto (https://github.com/barryvdh/laravel-debugbar).
