# Guía de Instalación — La Plomada

---

## Requisitos previos

Tener instalado en el equipo:

| Software | Versión | Descarga |
|---|---|---|
| PHP | 8.2 o superior | [php.net](https://php.net) |
| Composer | 2.x | [getcomposer.org](https://getcomposer.org) |
| Laravel Herd | Última versión | [herd.laravel.com](https://herd.laravel.com) |
| MariaDB / MySQL | 10.x / 8.x | incluido en Herd o [mariadb.org](https://mariadb.org) |
| HeidiSQL | Última versión | [heidisql.com](https://heidisql.com) |
| Node.js + npm | 18 LTS o superior | [nodejs.org](https://nodejs.org) |

---

## Paso 1 — Copiar el proyecto

Descomprimir la carpeta del proyecto dentro del directorio de sitios de Laravel Herd:

```
C:\Users\TuUsuario\Herd\
```

La estructura debería quedar así:

```
C:\Users\TuUsuario\Herd\
└── la-plomada\
    ├── app\
    ├── public\
    ├── .env.example
    └── ...
```

---

## Paso 2 — Instalar dependencias

Abrir una terminal dentro de la carpeta del proyecto y ejecutar:

```bash
composer install
```

```bash
npm install
```

---

## Paso 3 — Configurar el archivo de entorno

Copiar el archivo de ejemplo y renombrarlo:

```bash
cp .env.example .env
```

Abrir el archivo `.env` y configurar los datos de la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_la_plomada
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

> Reemplazar `tu_contraseña` con la contraseña de MariaDB configurada en Herd.

---

## Paso 4 — Generar la clave de la aplicación

```bash
php artisan key:generate
```

---

## Paso 5 — Crear e importar la base de datos

### 5.1 Crear la base de datos

1. Abrir **HeidiSQL** y conectarse al servidor local.
2. Hacer clic derecho en el panel izquierdo → **Crear nuevo** → **Base de datos**.
3. Asignarle el nombre `db_la_plomada` y confirmar.

### 5.2 Importar el archivo SQL

1. Con la base de datos `db_la_plomada` seleccionada, ir al menú **Herramientas → Cargar archivo SQL** (o presionar `Ctrl + Shift + O`).
2. Seleccionar el archivo `db_la_plomada.sql` incluido en el proyecto.
3. Hacer clic en **Abrir** y esperar a que finalice la importación.

La base de datos incluye todas las tablas del sistema con datos de ejemplo listos para usar.

---

## Paso 6 — Enlazar el almacenamiento de imágenes

```bash
php artisan storage:link
```

---

## Paso 7 — Compilar los assets

```bash
npm run dev
```

---

## Paso 8 — Acceder al sitio

Con Laravel Herd el sitio queda disponible automáticamente en:

```
http://la-plomada.test
```

> El nombre del sitio corresponde al nombre de la carpeta dentro de `Herd/`.

---

## Credenciales de acceso

### Administrador

| Campo | Valor |
|---|---|
| Email | antonio@gmail.com |
| Contraseña | antoniolaravel |

### Cliente

| Campo | Valor |
|---|---|
| Email | comprar@gmail.com |
| Contraseña | compradorlaravel |

---

## Solución de problemas comunes

| Problema | Solución |
|---|---|
| Error de conexión a la base de datos | Verificar los datos en `.env` y que MariaDB esté corriendo en Herd. |
| Página en blanco o error 500 | Ejecutar `php artisan config:clear` y recargar. |
| Error: `key not set` | Ejecutar `php artisan key:generate`. |
| Las imágenes no se muestran | Ejecutar `php artisan storage:link`. |
| El sitio no carga en Herd | Verificar que la carpeta del proyecto esté dentro de `~/Herd/` y que Herd esté corriendo. |

---

*La Plomada — Guía de Instalación v1.0*
