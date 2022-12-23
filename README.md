# Gerenciador de Veículos/Manutenções de Veículos

Trata-se de um sistema CRUD para cadastrar veículos e aguendar manutenções para estes veículos.

## Recursos

- CRUD de Veículos
- CRUD de Manutenções
- API que mostra as 7 manutenções mais recentes do usuario.

## Tech

- [Laravel 9]
- [PHP 8]
- [Docker]
- [Bootstrap]

## Instalação
1º - git clone https://github.com/DaniKoehler/teste-supera main

2º - composer install

3º - npm install

4º - cd laradock

5º - docker-compose up -d nginx mysql phpmyadmin

## Para acessar a aplicação e a Base de Dados:
• Aplicação

    • localhost:8888
    • Usuário de teste criado pelo seeder: abbott.mittie@example.org
    • Senha: senha123
    
• Base de Dados

    • localhost:1010
    • Servidor: mysql
    • Utilizador: root
    • Senha: supera2022


# API

A API foi criada para retornar de maneira dinâmica as últimas 7 manutenções de um usuário, na home page tem a apresentação dos dados já tratadas, para visualizar o retorno em json acesse a rota: localhost:8888/api/manutencoes/1

    • O último caractere representa o ID do usuário.
