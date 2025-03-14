## Despliegue en Amazon Web Services (AWS)
### Pasos para Implementación en AWS

1. **Crear Instancia EC2**
   1. Iniciar sesión en la consola de AWS
   2. Navegar a EC2 > Lanzar nueva instancia
   3. Seleccionar Amazon Linux 2 o Ubuntu Server
   4. Elegir tipo de instancia (t2.micro para pruebas)
   5. Configurar grupo de seguridad:
      * Permitir tráfico HTTP (puerto 80)
      * Permitir tráfico HTTPS (puerto 443)
      * Permitir acceso SSH (puerto 22)

2. **Conexión a la Instancia**
   ```bash
   # Conectar usando SSH
   ssh -i "tu-clave-privada.pem" ec2-user@tu-ip-publica
   # o para Ubuntu
   ssh -i "tu-clave-privada.pem" ubuntu@tu-ip-publica
   ```

3. **Instalación de Paquetes**
   ```bash
   # Para Amazon Linux
   sudo yum update -y
   sudo yum install -y httpd php php-mysql mariadb-server
   
   # Para Ubuntu
   sudo apt update
   sudo apt install -y apache2 php libapache2-mod-php php-mysql mysql-server
   ```

4. **Configurar Servidor Web**
   ```bash
   # Amazon Linux
   sudo systemctl start httpd
   sudo systemctl enable httpd
   
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
   CREATE USER 'tu_usuario'@'localhost' IDENTIFIED BY 'tu_contraseña';
   GRANT ALL PRIVILEGES ON proyectophp.* TO 'tu_usuario'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

6. **Clonar Repositorio**
   ```bash
   # Instalar Git
   sudo yum install git  # Amazon Linux
   # o
   sudo apt install git  # Ubuntu
   
   # Clonar repositorio
   git clone https://github.com/afpservices/ProyectoPHP2025.git
   ```

7. **Configurar Permisos**
   ```bash
   # Mover proyecto al directorio web
   sudo mv ProyectoPHP2025 /var/www/html/
   
   # Configurar permisos
   sudo chown -R apache:apache /var/www/html/ProyectoPHP2025  # Amazon Linux
   # o
   sudo chown -R www-data:www-data /var/www/html/ProyectoPHP2025  # Ubuntu
   
   sudo chmod -R 755 /var/www/html/ProyectoPHP2025
   ```

8. **Configurar Archivo .env**
   ```bash
   # Crear o editar archivo de configuración
   nano /var/www/html/ProyectoPHP2025/.env
   
   # Contenido de ejemplo:
   DB_HOST=localhost
   DB_NAME=proyectophp
   DB_USER=tu_usuario
   DB_PASS=tu_contraseña
   ```

9. **Configurar Apache (archivo de host virtual)**
   ```bash
   # Amazon Linux
   sudo nano /etc/httpd/conf.d/proyectophp.conf
   
   # Ubuntu
   sudo nano /etc/apache2/sites-available/proyectophp.conf
   
   # Contenido de ejemplo:
   <VirtualHost *:80>
       ServerAdmin webmaster@ejemplo.com
       DocumentRoot /var/www/html/ProyectoPHP2025
       ServerName tu-dominio.com
       
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
    ```bash
    # Amazon Linux
    sudo systemctl restart httpd
    
    # Ubuntu
    sudo a2ensite proyectophp
    sudo systemctl restart apache2
    ```
