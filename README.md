# API de Leaderboard

Bem-vindo à API de Rankings! Esta API oferece endpoints para gerenciar usuários, movimentos e registros pessoais. Também inclui funcionalidades para obter rankings e registros específicos. Todas as respostas são retornadas em formato JSON. Este projeto foi construído utilizando os princípios de orientação a objetos, buscando sempre manter a legibilidade, manutenibilidade e baixo acoplamento entre as classes.

## Endpoints Disponíveis

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
- O endpoint principal em questão é: 

**`GET /api/record/get_rankings_by_movement/{movement_name}`**

Utilizado para retornar o ranking de um determinado movimento, trazendo o nome do movimento e uma lista ordenada com os usuários, seu respectivo recorde pessoal (maior valor), posição e data.
- Os nomes dos movimentos com espaços devem ser substituídos por underlines (_) ao fazer a chamada API.

## Como Rodar o Código (XAMPP)

Para rodar o código, siga estas etapas:

1. Certifique-se de ter o XAMPP instalado em sua máquina. Você pode baixá-lo em [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).
2. Clone este repositório para o diretório htdocs do XAMPP - `git clone https://github.com/clmjunior/LeaderboardAPI.git <nome-do-diretorio-destino>`.
3. Inicie os serviços MySQL e Apache no Painel de Controle do XAMPP.
4. Crie o banco de dados no admin do XAMPP acessando `localhost/phpmyadmin/` no navegador.
5. Importe o arquivo `queries.sql` localizado na raiz deste projeto para o banco criado no phpMyAdmin.
6. Configure as constantes do banco de dados copiando o arquivo `config.php.example` para `config.php` dentro do diretório `src/Database`. Você deve alterar as constantes para corresponder às configurações do seu banco de dados.
7. Após seguir esses passos, abra um navegador e acesse as rotas acessando `localhost/nome-do-diretorio-clonado/{endpoints}` conforme documentado acima para interagir com a API.
