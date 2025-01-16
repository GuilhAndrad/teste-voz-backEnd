# Teste VOZ - Backend

Este projeto foi desenvolvido como parte de um teste técnico, utilizando o framework Laravel para implementar uma API RESTful com funcionalidades de CRUD para as entidades Produtos e Categorias.

## Documentação da API

Acesse a documentação completa da API no Postman clicando no link abaixo:

🔗 [Documentação no Postman](https://documenter.getpostman.com/view/29982788/2sAYQXpDfM)

## Requisitos

Certifique-se de que os seguintes requisitos estão instalados no seu ambiente:

- PHP (versão 8.1 ou superior)
- Composer (gerenciador de dependências PHP)
- PostgreSQL (como banco de dados)
- Git (para versionamento de código)

## Configuração do Projeto

### 1. Clone o Repositório

```bash
git clone https://github.com/GuilhAndrad/teste-voz-backEnd.git
cd teste-voz-backEnd
```
### 2. Instale as Dependências

Execute o comando abaixo para instalar as dependências do Laravel:

```bash
composer install
```
### 3. Configure o Ambiente
Renomeie o arquivo .env.example para .env

```bash
Linux/macOS: Use o comando mv .env.example .env.
Windows (CMD): Use o comando rename .env.example .env.
Windows (PowerShell): Use o comando Rename-Item .env.example .env.
```
Edite o arquivo .env para configurar o banco de dados PostgreSQL:
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```
### 4. Execute as Migrations
Para criar as tabelas no banco de dados, execute:
```bash
php artisan migrate
```
### 5. Execute os Seeders
Para popular o banco com dados de teste, execute:
```bash
php artisan db:seed
```

## Executar o Projeto
Para iniciar o servidor de desenvolvimento, execute:
```bash
php artisan serve
```
Acesse o projeto no navegador em:
```bash
http://127.0.0.1:8000
```
## Testando a API
Importe a documentação do Postman utilizando o link fornecido:

🔗 [Documentação no Postman](https://documenter.getpostman.com/view/29982788/2sAYQXpDfM)

Utilize os endpoints da API para criar, listar, atualizar e excluir produtos e categorias.

## Contribuição
Sinta-se à vontade para abrir issues ou enviar pull requests se identificar problemas ou melhorias no projeto.
### Contato: wilhelmandrad@gmail.com
