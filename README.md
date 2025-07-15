# grupoemi
GRUPO ELECTROMECANICO INDUSTRIAL

## Pre-requisitos

Antes de comenzar, asegúrate de tener instaladas las siguientes herramientas:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1. **Clonar el repositorio:**
   ```sh
   git clone https://github.com/JoseRazo/grupoemi.git
   ```
2. **Abrir el proyecto en tu editor de código preferido** y configurar el archivo ``.env
3. **Abrir una terminal y navegar al directorio del proyecto:**
   ```sh
   cd ~/Developer/laravel/grupoemi
   ```
4. **Generar la imagen de Docker y levantar los contenedores:**
   ```sh
   docker-compose build
   docker-compose up -d
   ```
5. **Acceder al contenedor de la aplicación:**
   ```sh
   docker exec -it grupoemi /bin/bash
   ```
6. **Instalar las dependencias de PHP dentro del contenedor:**
   ```sh
   cd /var/www/html
   composer install
   # Si hay problemas con las dependencias de la plataforma, usa:
   composer install --ignore-platform-reqs
   ```
7. **Actualizar paquetes en caso de errores:**
   ```sh
   composer update
   ```
8. **Instalar dependencias de Node.js:**
   ```sh
   npm install
   ```
9. **Compilar los assets del frontend:**
   ```sh
   npm run build
   ```
10. **Asignar permisos adecuados a la carpeta de almacenamiento:**
    ```sh
    sudo chmod 777 ./storage/ -R
    ```
11. **Salir del contenedor y generar la clave de la aplicación:**
    ```sh
    docker-compose exec php php /var/www/html/artisan key:generate
    ```
12. **Ejecutar migraciones de la base de datos:**
    ```sh
    docker-compose exec php php /var/www/html/artisan migrate
    ```
13. **Crear usuarios y datos iniciales con seeders:**
    ```sh
    docker-compose exec php php /var/www/html/artisan db:seed
    ```

## Producción servidor compartido

Para limpiar la caché y optimizar la aplicación en producción, ejecuta los siguientes comandos:

```sh
/usr/bin/php8.3 artisan cache:clear
/usr/bin/php8.3 artisan route:clear
/usr/bin/php8.3 artisan config:clear
/usr/bin/php8.3 artisan view:clear
/usr/bin/php8.3 artisan optimize:clear
```

Ejecutar queues
```sh
/usr/bin/php8.3 artisan queue:work --stop-when-empty
```

## Abrir el Proyecto

Abre tu navegador y accede a la URL:

[http://127.0.0.1:8080](http://127.0.0.1:8080)
