# API de Leaderboard

Bem-vindo à API de Leaderboard! Esta API oferece endpoints para gerenciar usuários, movimentos e registros pessoais. Também inclui funcionalidades para obter rankings e registros específicos.

## Rotas Disponíveis

### Usuários
- `GET /api/users/`: Retorna todos os usuários cadastrados.
- `GET /api/user/get_user_by_id/{id}`: Retorna um usuário pelo ID.
- `GET /api/user/get_user_by_name/{name}`: Retorna um usuário pelo nome.

### Movimentos
- `GET /api/movements/`: Retorna todos os movimentos cadastrados.
- `GET /api/movement/get_movement_by_id/{id}`: Retorna um movimento pelo ID.
- `GET /api/movement/get_movement_by_name/{name}`: Retorna um movimento pelo nome.

### Registros Pessoais
- `GET /api/records/`: Retorna todos os registros pessoais.
- `GET /api/record/get_record_by_id/{id}`: Retorna um registro pessoal pelo ID.
- `GET /api/record/get_rankings/`: Retorna os rankings de todos os usuários em todos os movimentos.
- `GET /api/record/get_rankings_by_movement/{movement_name}`: Retorna os rankings de todos os usuários para um movimento específico.

## Nota
- Os nomes dos movimentos com espaços devem ser substituídos por underlines (_) ao fazer a chamada API.

## Como Rodar o Código (XAMPP)

Para rodar o código, siga estas etapas:

1. Certifique-se de ter o XAMPP instalado em sua máquina. Você pode baixá-lo em https://www.apachefriends.org/index.html.
2. Clone este repositório para o diretório htdocs do XAMPP.
3. Certifique-se de ter o banco de dados configurado corretamente. Você pode encontrar o esquema do banco de dados no arquivo queries.sql na raiz do projeto. Crie o banco no phpMyAdmin e importe este arquivo para o seu sistema de gerenciamento de banco de dados para criar as tabelas necessárias e os dados iniciais.
4. Configure as constantes do banco de dados copiando o arquivo config.php.example para config.php dentro do diretório Database. Você pode alterar as constantes para corresponder às configurações do seu banco de dados.
5. Após seguir esses passos, abra um navegador da web e acesse as rotas conforme documentado acima para interagir com a API. Certifique-se de iniciar o servidor Apache e MySQL no painel de controle do XAMPP antes de acessar as rotas.

