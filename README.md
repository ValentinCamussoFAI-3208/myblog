# Grupo X4 PWA 2024

Creación del trabajo práctico 3 de Programación Web Avanzada: "MyBlog"

## Integrantes
| Nombre           | Legajo   | Email                                 | Github                                                                                                                              |
| :--------------  | :------- | :------------------------------------ | :---------------------------------------------------------------------------------------------------------------------------------- |
| Lautaro Gonzalez | FAI 2950 | lautaro.gonzalez@est.fi.uncoma.edu.ar | [![github](https://img.shields.io/badge/github-121013?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Vintuwu) |
| Valentin Camusso | FAI 3208 | valentin.camusso@est.fi.uncoma.edu.ar | [![github](https://img.shields.io/badge/github-121013?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Camuss0) |
| Emiliano Lopez   | FAI 3357 | emiliano.lopez@est.fi.uncoma.edu.ar   | [![github](https://img.shields.io/badge/github-121013?style=for-the-badge&logo=github&logoColor=white)](https://github.com/EmiMlz)  |

## Requisitos
- PHP
- Composer
- Node.JS
- Laragon o poder ejecutar MySQL

## Antes de empezar
Copia el `.env.example` y renombralo como `.env` y cambia las siguientes variables<br>
DB_DATABASE=`nombre de la base de datos`<br>
DB_USERNAME=`nombre del usuario` root por defecto<br>
DB_PASSWORD=`contraseña de la base de datos` vacío por defecto<br>

## Instalación
1. Clona este repositorio con el comando `git clone https://github.com/ValentinCamussoFAI-3208/myblog.git`
2. Accede al repositorio con el comando `cd myblog`
3. Instala las dependencias con `npm install` y `composer install`
4. Instala Vite con `npm run build`
5. Crea la base de datos con `php artisan migrate --seed`
6. Crea la "Encryption Key" con el comando `php artisan key:generate`
7. Ejecuta la aplicación con `php artisan serve` o inicializala con Laragon