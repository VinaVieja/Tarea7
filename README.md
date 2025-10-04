# Sistema de Registro y Login con CodeIgniter 4

## Descripción

Este proyecto es un sistema básico de autenticación desarrollado con CodeIgniter 4. Permite a los usuarios registrarse y luego iniciar sesión con su correo, contraseña y tipo de usuario (usuario o administrador). Cada usuario puede subir un avatar (imagen de perfil). Si no sube avatar, se asigna una imagen predeterminada.

Al iniciar sesión correctamente, el usuario es redirigido a una página de bienvenida que muestra su nombre completo y su avatar.

---

## Base de Datos

Se utiliza una base de datos MySQL llamada `miapp`. La estructura de la tabla `users` se creó mediante migraciones de CodeIgniter.

### Creación de la base de datos

Ejecuta en tu servidor MySQL:

```sql
CREATE DATABASE miapp;
USE miapp;

