# Proyecto Portafolio en Laravel
Este es un proyecto desarrollado en Laravel que gestiona datos personales y proyectos. Proporciona una interfaz para administrar información personal y proyectos relacionados.

## Características principales
Gestión de datos personales como nombre, dirección, correo electrónico y teléfono. Administración de proyectos incluyendo título, descripción, tecnologías utilizadas y enlaces relacionados.
Almacenamiento de imágenes de perfil y proyectos de manera local. Interfaz utilizando Bootstrap para estilos y componentes.

## Requisitos previos
- PHP >= 8.2
- Composer instalado globalmente
- Servidor web (por ejemplo, Apache, Nginx) configurado con PHP
- Tener un sistema de gestión de bases de datos instalado (puede ser MySQL, PostgreSQL, SQLite, etc.).  
  
## Instalación
- **Clona el repositorio:**
  Clona el repositorio de github en tu maquina local
```git bash
git clone https://github.com/MiguelSamayoa/PruebaPortafolio.git
cd proyecto-laravel
```

- **Instala las dependencias:**
    instala las dependecias del proyecto
```git bash
composer install
```

- **Configuración del entorno:**
    - Configura las rutas de las imagenes usando el comando:
    ```git bash
    php artisan storage:link
    ```

    -  Renombra el archivo **.env.example** a **.env** y configura las variables de entorno según sea necesario para conectar con su base de datos.
    ```git bash
        DB_CONNECTION=gestor_base_de_datos
        DB_HOST=db_host
        DB_PORT=sb_port
        DB_DATABASE=db_database
        DB_USERNAME=db_username
        DB_PASSWORD=db_password
    ```

    - Genera una nueva clave de aplicación:
    ```git bash
    php artisan key:generate
    ```

- **Migraciones y Semillas:**
    Ejecuta las migraciones para configurar la base de datos:
    ```git bash
    php artisan migrate --seed
    ```

- **Servidor de desarrollo:**
    Ejecuta el servidor de desarrollo localmente:
    ```git bash
    php artisan serve
    ```
    Accede al proyecto en tu navegador: http://localhost:8000

