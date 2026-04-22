# 🧾 Sistema Punto de Venta (POS)

Sistema web de punto de venta desarrollado para negocios como papelerías y refaccionarias. Permite gestionar ventas, productos y operaciones básicas de caja.

---

## 🚀 Tecnologías utilizadas

* PHP (Backend)
* MySQL (Base de datos)
* JavaScript (Frontend)
* HTML5 / CSS3
* XAMPP / Laragon (entorno local)

---

## 📦 Requisitos

Antes de ejecutar el proyecto, asegúrate de tener instalado:

* PHP >= 7.4
* MySQL / MariaDB
* Servidor local (XAMPP, Laragon, WAMP, etc.)
* Navegador web moderno

---

## ⚙️ Instalación en entorno de desarrollo

### 1. Clonar repositorio

```bash
git clone https://github.com/TU_USUARIO/TU_REPO.git
cd TU_REPO
```

---

### 2. Configurar servidor local

Coloca el proyecto dentro de tu carpeta de servidor:

* XAMPP: `htdocs/`
* Laragon: `www/`

Ejemplo:

```
C:\xampp\htdocs\pos-app
```

---

### 3. Crear base de datos

Entra a phpMyAdmin o consola MySQL y ejecuta:

```sql
CREATE DATABASE pos_db;
```

---

### 4. Ejecutar script de base de datos

El proyecto ya incluye el script SQL dentro de la carpeta:

```
/config/database.sql
```

Solo necesitas importarlo en la base de datos creada (`pos_db`).

#### Opción 1: phpMyAdmin

1. Selecciona la base de datos `pos_db`
2. Ir a la pestaña **Importar**
3. Selecciona el archivo `/config/database.sql`
4. Ejecutar

#### Opción 2: consola

```bash
mysql -u root -p pos_db < config/database.sql
```

---

### 5. Configurar conexión

Edita el archivo de conexión (ejemplo):

```
/config/database.php
```

Configura tus credenciales:

```php
$host = "localhost";
$db   = "pos_db";
$user = "root";
$pass = "";
```

---

### 6. Ejecutar el proyecto

Abre en navegador:

```
http://localhost/pos-app
```

---

## 🧪 Modo desarrollo

* No requiere build
* Cambios se reflejan en tiempo real
* Puedes usar herramientas como:

  * Postman / Insomnia (para pruebas de API)

---

## 📁 Estructura del proyecto

```
/controllers   → Lógica de negocio
/models        → Acceso a datos
/views         → Interfaz
/config        → Configuración y script SQL
/public        → Assets (JS, CSS)
```

---

## 🔐 Notas

* Proyecto enfocado a entorno local (desarrollo)
* Para producción se recomienda:

  * Variables de entorno
  * Seguridad en credenciales
  * Hosting adecuado

---

## 👨‍💻 Autor

Desarrollado por Miguel Ibañez
Software Developer | Sistemas a medida

---
