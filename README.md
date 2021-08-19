# tarefas
Desenvolver uma solução de CRUD (create, read, update and delete) para tarefas.
Usando a arquitetura de API RESTful com as tecnologias Docker, PHP (framework Lumen) e MySQL.
Por que usar essas tecnologias?
  * O Docker facilita a criação do ambiente onde a solução irá ser executada.
  * Optei o framework Lumen (micro-framework do Laravel) por ser muito leve e a performance podendo chegar até 4 vezes melhor que o Laravel.
  * O PHP já tem uma ótima ligação com o MySQL e para conservar optei por ele.

Como pode ver a arquitetura é simples, o `docker-compose` irá criar o ambiente da aplicação utilizando o `docker`. Essa arquitetura é comum na Cloud.

O que você precisa ter em nua máquina:
  * Docker

# Instruções para rodar:
Você pode usar o arquivo `init.sh` da raiz, podendo ser via terminal:
  * **Win:** `bash init.sh`
  * **Linux:** `sh init.sh`
  Caso não consiga executar o arquivo, pode executar manualmente em seu terminal
  ```
docker-compose up --build -d

docker run --rm --interactive --tty -v $PWD/project:/app composer install

docker exec -it php php /var/www/html/artisan migrate
  ```
  
 Esse arquivo irá fazer:
  1. Build
  2. Install dependencies of framework
  3. Run migrations 
  4. http://localhost is able

Você pode importar esse link no seu Postman para fazer requisições http: https://www.getpostman.com/collections/90b7d4af9f3f53ee0c8d

Ou você pode o cURL em command line:
```
http://localhost/task/{id} -- esse é o link para acessar a API e {id} seria o número de identificação da tarefa existente
GET REQUEST (listar todos as tarefas):
curl http://localhost/tasks

GET REQUEST BY ID (listar uma tarefa de acordo com o ID informado):
curl http://localhost/tasks/1

POST REQUEST (cadastrar uma tarefa):
curl -X POST http://localhost/tasks \
     -H 'Content-Type: application/json' \
     -d '{"title": "Titulo de teste","status": "0","description":"Descreva a sua tarefa aqui"}' 
     
PUT REQUEST (alterar alguma tarefa):
curl -X PUT http://localhost/tasks/1 \
     -H "Content-Type: application/x-www-form-urlencoded" \
     -d "title=Titulo alterado&status=1&description=Descricao alterada"
     
DELETE REQUEST (deletar uma tarefa de acordo com o ID informado):
curl -X DELETE http://localhost/tasks/4

```
