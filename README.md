# Proyecto Portafolio en Laravel
Este es un proyecto desarrollado en Laravel que gestiona datos personales y proyectos. Proporciona una interfaz para administrar información personal y proyectos relacionados.

## Características principales
Gestión de datos personales como nombre, dirección, correo electrónico y teléfono. Administración de proyectos incluyendo título, descripción, tecnologías utilizadas y enlaces relacionados.
Almacenamiento de imágenes de perfil y proyectos de manera local. Interfaz utilizando Bootstrap para estilos y componentes.

## Requisitos previos
- PHP >= 7.4
- Composer instalado globalmente
- Servidor web (por ejemplo, Apache, Nginx) configurado con PHP
  
## Instalación
- **Clona el repositorio:**
```git bash
git clone https://github.com/MiguelSamayoa/PruebaPortafolio.git
cd proyecto-laravel
```

- **Instala las dependencias:**
```git bash
composer install
```

- **Configuración del entorno:**
Configura las variables de entorno según sea necesario para que coincidan con su base de datos.

- **Genera una nueva clave de aplicación:**
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

