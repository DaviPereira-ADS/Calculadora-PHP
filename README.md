# Calculadora PHP com MySQL

Este é um projeto de calculadora desenvolvido em PHP com integração a um banco de dados MySQL para armazenamento das operações realizadas.

## Funcionalidades

- **Calculadora:** Permite realizar operações de adição, subtração, multiplicação, divisão, regra de três e cálculo de raiz quadrada.
- **Banco de Dados:** Exibe as operações realizadas, incluindo a expressão calculada, data e hora da operação.

## Tecnologias Utilizadas

- PHP
- MySQL
- HTML
- CSS

## Pré-requisitos

- Servidor web (Apache, Nginx, etc.)
- PHP instalado
- Banco de dados MySQL

## Instalação e Uso

1. **Clonar o repositório:**https://github.com/DaviPereiraL/calculadora-php.git


2. **Configurar o banco de dados:**

- Importe o arquivo SQL fornecido (`database.sql`) para criar a estrutura do banco de dados e as tabelas necessárias.

3. **Configurar conexão com o banco de dados:**

- Edite o arquivo `conexao.php` e ajuste as configurações de conexão com o MySQL conforme necessário:

  ```php
  $servername = "localhost";
  $username = "seu_usuario";
  $password = "sua_senha";
  $dbname = "nome_do_banco";
  ```

4. **Executar o projeto:**

- Inicie seu servidor web.
- Acesse o projeto através do navegador:
  ```
  http://localhost/calculadora-php-mysql
  ```

5. **Utilização:**

- Na página inicial, você encontrará um menu com opções para acessar a calculadora ou o histórico de operações.
- Realize as operações matemáticas utilizando os botões da calculadora.
- Todas as operações serão registradas no banco de dados automaticamente com data e hora.

## Estrutura de Arquivos

- `index.php`: Página inicial com menu de opções.
- `calculadora.php`: Interface da calculadora com funcionalidades de cálculo.
- `historico.php`: Exibe o histórico de operações do banco de dados.
- `conexao.php`: Arquivo de conexão com o banco de dados MySQL.
- `database.sql`: Script SQL para criar a estrutura do banco de dados.

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests ou abrir issues caso encontre problemas ou queira melhorar o projeto.

## Licença

Este projeto é licenciado sob a [MIT License](https://opensource.org/licenses/MIT).


