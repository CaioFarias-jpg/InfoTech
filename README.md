# InfoTech

Sistema web simples para gerenciamento de clientes e produtos, desenvolvido em PHP com arquitetura MVC e banco de dados MySQL.

## Funcionalidades

- Autenticação de funcionários.
- Cadastro, edição, listagem e exclusão de clientes.
- Cadastro, edição, listagem e exclusão de produtos.
- Categorias separadas para clientes e produtos.
- Cadastro de categorias diretamente pelos modais dos formulários.

## Tecnologias

- PHP
- MySQL
- HTML, CSS e JavaScript
- Bootstrap
- XAMPP (ambiente local recomendado)

## Estrutura do projeto

- `Controller/`: regras de navegação e ações do sistema.
- `Model/`: entidades da aplicação.
- `DAO/`: acesso ao banco de dados.
- `View/`: páginas, modais e scripts JavaScript.
- `Core/`: roteamento da aplicação.

## Como executar

1. Coloque o projeto na pasta `htdocs` do XAMPP.
2. Inicie os serviços Apache e MySQL.
3. Crie e importe o banco `infotech` com a estrutura SQL do projeto.
4. Confira as credenciais do banco em `config.php`.
5. Acesse `http://localhost/infotech` no navegador.

> O banco deve possuir categorias com os tipos `CLIENTE` e `PRODUTO`, além da coluna `id_categoria` nas tabelas `cliente` e `produto`.
