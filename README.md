# Prueba desarrollador
Este proyecto representa la solución al ejercicio propuesto en la prueba para desarrolladores

# Configuración del proyecto

Documento guía desde la clonación hasta la ejecución. Tener instalados xampp, composer y node.js en la máquina.

## Requisitos

1. **XAMPP**: para PHP 8.2, descargar [aquí](https://www.apachefriends.org/es/download.html).
2. **Composer**: descargar [aquí](https://getcomposer.org/download/).
3. **Node.js**: descargar [aquí](https://nodejs.org/en/download/package-manager).

## Pasos de configuración

### 1. Clonar repositorio

Abrir una terminal y ejecutar el siguiente comando para clonar el proyecto:

```bash
git clone https://github.com/hrondon272/prueba-desarollo.git
```

### 2. Iniciar servicios de XAMPP

Iniciar servicios de apache y mysql en el panel de control de XAMPP.

1. **Base de datos**: Crear la base de datos en http://localhost/phpmyadmin con el nombre db_prueba

### 3. Instalar dependencias de Laravel

Instalar las dependencias de php utilizando composer

```bash
composer install
```

### 4. Instalar dependencias de npm

Instalar las dependencias de javascript utilizando npm

```bash
npm install
```

### 5. Configurar el .env

Copiar el archivo .env.example a .env

```bash
cp .env.example .env
```

### 6. Generar key

```bash
php artisan key:generate
```

### 7. Ejecutar las migraciones

Ejecutar las migraciones para configurar la base de datos

```bash
php artisan migrate
```
Nota: asegurarse de usar el drive de mysql.

### 8. Ejecutar el servidor de desarrollo

```bash
php artisan serve
```

### 9. Ejecutar el compilador para que funcione vite

En una nueva terminal, ejecutar el siguiente comando para compilar y observar los cambios en tiempo real:

```bash
npm run dev
```

Con esto podrá usar los archivos resources/css/app.css y resources/js/app.js en la vista.

Listo! puede ver el proyecto en el navegador con http://localhost:8000.









