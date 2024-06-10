# Grupo X4 PWA 2024

Creación del trabajo práctico 3 de Programación Web Avanzada: "MyBlog".

## Integrantes
| Nombre           | Legajo   | Email                                 | Github                                                                                                                              |
| :--------------  | :------- | :------------------------------------ | :---------------------------------------------------------------------------------------------------------------------------------- |
| Lautaro Gonzalez | FAI 2950 | lautaro.gonzalez@est.fi.uncoma.edu.ar | [![github](https://img.shields.io/badge/github-121013?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Vintuwu) |
| Valentin Camusso | FAI 3208 | valentin.camusso@est.fi.uncoma.edu.ar | [![github](https://img.shields.io/badge/github-121013?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Camuss0) |
| Emiliano Lopez   | FAI 3357 | emiliano.lopez@est.fi.uncoma.edu.ar   | [![github](https://img.shields.io/badge/github-121013?style=for-the-badge&logo=github&logoColor=white)](https://github.com/EmiMlz)  |

## Tabla de Contenidos
- [Descripción](#descripción)
- [Requisitos](#requisitos)
- [Antes de empezar](#antes-de-empezar)
- [Configuración de ENV](#configurar-archivo-de-entorno)
- [Instalación](#instalación)
- [Uso](#uso)

## Descripción
Esta aplicación es una web tipo blog en donde se puede publicar contenido acerca de juegos RTS (Real Time Strategy) con funcionalidades de login/register y poder filtrar por categorías.

## Requisitos
- PHP
- Composer
- Node.JS
- Laragon o poder ejecutar MySQL

## Antes de empezar
Debera crear en MySQL una base de datos llamada `myblog`.

## Configurar archivo de entorno
Copia el `.env.example` y renombralo como `.env` y cambia las siguientes variables.<br>
DB_DATABASE=`nombre de la base de datos`.<br>
DB_USERNAME=`nombre del usuario` root por defecto.<br>
DB_PASSWORD=`contraseña de la base de datos` vacío por defecto.

## Instalación
1. Clona este repositorio con el comando `git clone https://github.com/ValentinCamussoFAI-3208/myblog.git`.
2. Accede al repositorio con el comando `cd myblog`.
3. Configura el archivo de entorno ".env" siguiendo [estos pasos](#configurar-archivo-de-entorno).
3. Instala las dependencias con `npm install` y `composer install`.
4. Instala Vite con `npm run build`.
5. Crea la base de datos con `php artisan migrate --seed`.
6. Crea la "Encryption Key" con el comando `php artisan key:generate`.
7. Ejecuta la aplicación con `php artisan serve` o inicializala con Laragon.

## Uso
Solo vamos a abarcar como ejecutar la aplicación mediante Laragon, otros métodos de ejecución estarán a cargo de los usuarios del repositorio.<br>
Abre Laragon e inicializa todos los servicios.<br>
![Inicializar servicios Laragon](https://i.imgur.com/hSJ65pa.png)<br>
Luego dale segundo click a un lugar en blanco y vaya a donde dice www>myblog y haz click.
![Abrir página web del proyecto](https://i.imgur.com/wwsA9Cw.png)