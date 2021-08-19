# tarefas
Desenvolver uma solução de CRUD (create, read, update and delete) para tarefas.
Usando a arquitetura de API RESTful com as tecnologias Docker, PHP (framework Lumen) e MySQL.
Por que usar essas tecnologias?
  * O Docker facilita a criação do ambiente onde a solução irá ser executada.
  * Optei o framework Lumen (microframework do Laravel) por ser muito leve e a performance podendo chegar até 4 vezes melhor que o Laravel.
  * O PHP já tem uma ótima ligação com o MySQL e para conservar optei por ele.

Como pode ver a arquitetura é simples, o `docker-compose` irá criar o ambiente da aplicação utilizando o `docker` que é comum numa arquitetura na Cloud.

O que você precisa ter em nua máquina:
  * Docker

# Instruções para rodar:
1) Você pode usar o arquivo `init.sh` da raiz, podendo ser via terminal:
  * **Win:** `bash init.sh`
  * **Linux:** `sh init.sh`
  
 Esse arquivo irá fazer:
  1. Build
  2. Install dependencies of framework
  3. Run migrations 
  4. http://localhost is able

Você pode importar esse link no seu Postman para fazer requisições http: https://www.getpostman.com/collections/90b7d4af9f3f53ee0c8d
