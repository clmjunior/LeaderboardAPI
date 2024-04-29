# API de Leaderboard

Bem-vindo à API de Leaderboard! Esta API oferece endpoints para gerenciar usuários, movimentos e registros pessoais. Também inclui funcionalidades para obter rankings e registros específicos.

## Rotas Disponíveis

### Usuários
- `GET /users/`: Retorna todos os usuários cadastrados.
- `GET /user/get_user_by_id/{id}`: Retorna um usuário pelo ID.
- `GET /user/get_user_by_name/{name}`: Retorna um usuário pelo nome.

### Movimentos
- `GET /movements/`: Retorna todos os movimentos cadastrados.
- `GET /movement/get_movement_by_id/{id}`: Retorna um movimento pelo ID.
- `GET /movement/get_movement_by_name/{name}`: Retorna um movimento pelo nome.

### Registros Pessoais
- `GET /records/`: Retorna todos os registros pessoais.
- `GET /record/get_record_by_id/{id}`: Retorna um registro pessoal pelo ID.
- `GET /record/get_rankings/`: Retorna os rankings de todos os usuários em todos os movimentos.
- `GET /record/get_rankings_by_movement/{movement_name}`: Retorna os rankings de todos os usuários para um movimento específico.

## Nota
- Os nomes dos movimentos com espaços devem ser substituídos por underlines (_) ao fazer a chamada API.

## Como Rodar o Código

Para rodar o código, siga estas etapas:

1. Certifique-se de ter um servidor web com PHP instalado.
2. Clone este repositório para o diretório raiz do seu servidor.
3. Configure um arquivo `.htaccess` para redirecionar todas as solicitações para o arquivo `index.php`.
4. Certifique-se de ter o banco de dados configurado corretamente. Você pode encontrar o esquema do banco de dados no arquivo `database.sql`.
5. Configure as constantes do banco de dados no arquivo `Database.php` dentro do diretório `Database`.
6. Abra um navegador da web e acesse as rotas conforme documentado acima.

