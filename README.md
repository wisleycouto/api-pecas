# Nome do Ativo
* api-pecas API  PHP COM LARAVEL
* novowspecascpf FRONTEND EM REACTJS 

# Tecnologia
* PHP 8.1
* Composer
* Apache 2
* Docker
* React


# clonando Repositório de codigo-fonte
git clone https://github.com/wisleycouto/api-pecas.git

# Instalação /Configuracão da aplicação

Para ambientes de desenvolvimento,  deverá obrigatoriamente utilizar o docker para disponibilizar a aplicação em desenvolvimento, para isso é necessário que se tenha o docker e o docker compose instalado e executar o seguinte comando no root da aplicação.

```
# Subindo o Frontend e Backend
--1- docker-compose build
--2- docker-compose up -d

#listando os container após o build

--docker ps

# instalando as dependências do frontend

--docker-compose exec apipecas-frontend sh -c "npm install"

# executando aplicação do frontend

--docker-compose exec apipecas-frontend sh -c "npm start"

# buildando somente o frontend

---docker-compose build apipecas-frontend
---docker-compose up -d apipecas-frontend

#Configurando o Backend da aplicação

--docker-compose exec apipecas-api sh -c "composer install"

--docker-compose exec apipecas-api sh -c "cp .env.example .env"

--docker-compose exec apipecas-api sh -c "php artisan key:generate"

--docker-compose exec apipecas-api sh -c "php artisan migrate"

--docker-compose exec apipecas-api sh -c "php artisan db:seed"

--docker-compose exec apipecas-api sh -c "php artisan passport:install"

--docker-compose exec apipecas-api sh -c "php artisan vendor:publish --provider='LdapRecord\Laravel\LdapServiceProvider'"


git config --global http.sslverify false

```

# Visualizando aplicação localhost
* API 
http://localhost:8083/

* Frontend
http://localhost/

# Observações 

Favor não alterar os arquivos de Configuração  dockerfile e docker-compose e chart, se necessário comunicar equipe da arquitetura da CGS.

# Comandos Backend

