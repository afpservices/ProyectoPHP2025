# ProyectoPHP2025

## Descripción del Proyecto
En este proyecto hemos implementado PHP junto con una arquitectura MVC (Modelo-Vista-Controlador), en el cual hemos desarrollado una pagina basada en informatica en la cual le hemos implementado una gran variedad de funciones bastante utiles para la base de una pagina web funcional 

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
│   └── templates/       # Plantillas
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

## Tecnologías Utilizadas
- PHP
- MySQL
- HTML5
- CSS3
- JavaScript

- Proceso de implementacion en AWS
- 

## Contacto
Proyecto mantenido por AFP Services
- GitHub: [@afpservices](https://github.com/afpservices)
