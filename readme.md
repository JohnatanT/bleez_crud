##  Crud Produtos 

Um crud simples de produtos com PHP puro.

### Usando Docker
Clone o repositório e tenha o Docker e docker-compose instalados.

Entre na pasta e execute: 
```
docker-compose up -d
```
Isso fará com que o servidor embutido do PHP rode o projeto em localhost:8088

Depois dê permissão na pasta de imagens:
```
chmod 777 public/img
```

### Apenas com o PHP

Clone o repositório.
Entre na pasta do Projeto e execute:
```
make serve
```

Isso fará com que o servidor embutido do PHP rode o projeto em localhost:8008 e também dará permissão na pasta public/img


### Configurando banco:

OBS 1: Se foi utilizado o Docker, o banco já foi importado e as configurações de conexão estão em docjer-compose.yml, precisa apenas verificar o IP em que o container do banco está rodando. Se não utilizou o Docker, pode ser importado pro seu banco de dados o arquivo docker/mysql/bleez.sql

OBS 2: Para esse crud simples, utilizamos o MySQL.

Entre no arquivo source/Database.php e informe os parametros de conexão no __construct().
Isso fará com que as models que usem a classe do Banco tenham as conexões configuradas.