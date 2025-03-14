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

## Despliegue en Amazon Web Services (AWS)
### Pasos para Implementación en AWS

1. **Crear Instancia EC2**
   1. Iniciamos sesión en la consola de AWS
   2. Navegamos a EC2 > Lanzar nueva instancia
   3. Seleccionar Ubuntu Server
   4. Elegir tipo de instancia (t2.micro)
   5. Configurar grupo de seguridad:
      * Permitir tráfico HTTP (puerto 80)
      * Permitir tráfico HTTPS (puerto 443)
      * Permitir acceso SSH (puerto 22)

2. **Conexión a la Instancia**
   ```bash
   # Conectar usando SSH
   ssh -i "archivo.pem" ec2-user@la ip publica que te asigne
  
   ```

3. **Instalación de Paquetes**
   ```bash
   sudo apt update
   sudo apt install -y apache2 php libapache2-mod-php php-mysql mysql-server
   ```

4. **Configurar Servidor Web**
   ```bash
   # Ubuntu
   sudo systemctl start apache2
   sudo systemctl enable apache2
   ```

5. **Configurar Base de Datos**
   ```bash
   # Iniciar MySQL/MariaDB
   sudo systemctl start mariadb
   sudo systemctl enable mariadb
   
   # Configurar base de datos
   sudo mysql_secure_installation
   
   # Crear base de datos
   mysql -u root -p
   CREATE DATABASE proyectophp;
   CREATE USER 'root'@'localhost' IDENTIFIED BY '1234';
   GRANT ALL PRIVILEGES ON proyectophp.* TO 'root'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

6. **Clonar Repositorio**
   ```bash
   #Instalamos git
   sudo apt install git  # Ubuntu
   
   # Clonamos el repositorio
   git clone https://github.com/afpservices/ProyectoPHP2025.git
   ```

7. **Configurar Permisos**
   ```bash
   # Mover proyecto al directorio web
   sudo mv ProyectoPHP2025 /var/www/html/
  
   sudo chown -R www-data:www-data /var/www/html/ProyectoPHP2025  # Ubuntu
   
   sudo chmod -R 755 /var/www/html/ProyectoPHP2025
   ```

8. **Configurar Apache**
   ```bash
   # Ubuntu
   sudo nano /etc/apache2/sites-available/proyectophp.conf
   
   # Contenido de ejemplo:
   <VirtualHost *:80>
       ServerAdmin webmaster@ejemplo.com
       DocumentRoot /var/www/html/ProyectoPHP2025
       
       <Directory /var/www/html/ProyectoPHP2025>
           Options Indexes FollowSymLinks
           AllowOverride All
           Require all granted
       </Directory>
       
       ErrorLog ${APACHE_LOG_DIR}/error.log
       CustomLog ${APACHE_LOG_DIR}/access.log combined
   </VirtualHost>
   ```

10. **Habilitar Sitio y Reiniciar Servidor**
    sudo a2ensite proyectophp
    sudo systemctl restart apache2
    ```
11. **Probar sitio web**
    --Accedemos mediante (http://ip publica asignada)

## Contacto
Proyecto mantenido por AFP Services
- GitHub: [@afpservices](https://github.com/afpservices)
