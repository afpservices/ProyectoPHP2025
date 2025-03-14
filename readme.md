# ProyectoPHP2025

## Descripción del Proyecto
Aplicación web desarrollada en PHP para gestión de productos y usuarios, siguiendo una arquitectura MVC (Modelo-Vista-Controlador).

## Estructura del Proyecto
```
ProyectoPHP2025/
│
├── assets/              # Recursos estáticos
│   ├── css/             # Hojas de estilo
│   └── img/             # Imágenes
│
├── Controllers/         # Controladores de la aplicación
│   ├── AdminController.php
│   ├── CartController.php
│   ├── OrderController.php
│   └── ProductsController.php
│
├── db/                  # Configuración de base de datos
│   └── Database.php
│
├── Models/              # Modelos de datos
│   ├── Carrito.php
│   ├── Funciones.php
│   └── Producto.php
│
├── Views/               # Vistas del proyecto
│   ├── admin/           # Vistas de administración
│   │   ├── create_product.php
│   │   ├── edit_product.php
│   │   ├── login.php
│   │   └── panel.php
│   │
│   ├── cart/            # Vistas del carrito
│   │   └── index.php
│   │
│   ├── orders/          # Vistas de pedidos
│   │   ├── checkout.php
│   │   └── confirmation.php
│   │
│   ├── products/        # Vistas de productos
│   │   ├── index.php
│   │   ├── search.php
│   │   └── show.php
│   │
│   └── templates/       # Plantillas comunes
│       ├── footer.php
│       └── header.php
│
└── index.php            # Punto de entrada de la aplicación
```

## Requisitos del Sistema
- PHP 7.4 o superior
- MySQL/MariaDB
- Servidor web Apache

## Configuración

### Base de Datos
1. Crear base de datos `proyectophp`
2. Importar el esquema de base de datos
3. Configurar credenciales de conexión

### Credenciales de Acceso
- **Administrador**
  - Usuario: admin
  - Contraseña: admin
- **cliente**
  - Usuario: felipe
  - Contraseña: felipe
## Características Principales
- Autenticación de usuarios
- Gestión de productos
- Panel de administración
- Interfaz responsive

## Tecnologías Utilizadas
- PHP
- MySQL
- HTML5
- CSS3
- JavaScript



## Contacto
Proyecto mantenido por AFP Services
- GitHub: [@afpservices](https://github.com/afpservices)
