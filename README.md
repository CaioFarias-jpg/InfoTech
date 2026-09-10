# InfoTech

Sistema de gerenciamento para uma loja de hardware/informática, desenvolvido em **PHP Orientado a Objetos** seguindo o padrão **MVC** (Model-View-Controller).

## Sobre o projeto

O InfoTech permite gerenciar as principais entidades de uma loja de informática, como clientes, produtos e vendedores, através de uma estrutura organizada em camadas:

- **Controller** — recebe as requisições e coordena a lógica da aplicação
- **Model** — representa as entidades do sistema (Cliente, Produto, Vendedor, etc.)
- **DAO** — camada de acesso ao banco de dados (PDO/MySQL)
- **View** — arquivos responsáveis pela exibição (HTML/PHP)
- **Core** — classes centrais da aplicação, como o `Router`
- **API** — endpoints para ações específicas (ex: cadastro via requisições assíncronas)

O roteamento é feito por um `Router` customizado, que direciona as requisições para o Controller e método corretos com base na URL e no método HTTP (GET/POST).

## Tecnologias utilizadas

- PHP (POO)
- MySQL / PDO
- HTML, CSS e JavaScript
- Apache (via XAMPP)

## Como rodar o projeto localmente

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) instalado (Apache + MySQL + PHP)

### Passo a passo

1. **Clone o repositório** dentro da pasta `htdocs` do XAMPP:
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/CaioFarias-jpg/InfoTech.git
   ```

2. **Crie o banco de dados** no MySQL (via phpMyAdmin ou linha de comando) com o nome:
   ```
   infotech
   ```
   Em seguida, importe o script SQL do projeto (caso disponível) com as tabelas necessárias.

3. **Confira as configurações de conexão** em `config.php`:
   ```php
   $_ENV['db']['host'] = 'localhost';
   $_ENV['db']['user'] = 'root';
   $_ENV['db']['pass'] = '';
   $_ENV['db']['database'] = 'infotech';
   ```
   Ajuste usuário/senha caso seu MySQL local seja diferente do padrão do XAMPP.

4. **Inicie o Apache e o MySQL** pelo painel de controle do XAMPP.

5. **Acesse no navegador**:
   ```
   http://localhost/InfoTech
   ```

## Estrutura de pastas

```
InfoTech/
├── API/           # Endpoints de ações específicas
├── Controller/    # Controladores da aplicação
├── Core/          # Router e classes centrais
├── DAO/           # Acesso ao banco de dados
├── Model/         # Entidades do sistema
├── View/          # Telas (HTML/PHP)
├── .htaccess      # Reescrita de URLs
├── autoload.php   # Autoload das classes
├── config.php     # Configurações de banco e constantes globais
├── index.php      # Ponto de entrada da aplicação
└── routes.php     # Definição das rotas
```

## Status

Projeto em desenvolvimento, com fins de estudo de PHP orientado a objetos e arquitetura MVC.