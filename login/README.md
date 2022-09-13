# appLogin

Luego de Correr el docker-compose.yaml para levantar los servicios se debe conectar el Contenedor con el Network de los contenedores de los controladores y la BD
Para eso escribir el siguiente comando:

docker network connect phpcapas_default applogin-php-1
