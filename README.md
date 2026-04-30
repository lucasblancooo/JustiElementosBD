#  Justi Elementos - BackEnd de la ferretería

Elementos Justi es una ferretería con sistema de venta online. La aplicación permite a los clientes registrarse, seleccionar productos con su cantidad deseada y elegir un método de pago. El sistema calcula automáticamente el monto final aplicando los descuentos correspondientes según el método de pago elegido.
Además, el panel incluye funcionalidades de administración para gestionar productos, clientes, métodos de pago y órdenes desde una interfaz web centralizada.

# Lenguajes de programación utilizados:
Backend: PhP
Base de datos: MySQL
FrontEnd: HTML y CSS 

## Requisitos

PHP 7.4 o superior
MySQL 5.7 o superior
Servidor local: XAMPP


## Base de datos:

Tablas

clientes — ID, Nombre, Apellido, Teléfono, ID_destino
destino — ID_destino, Nom_destino, cod_postal, dirección
producto — ID_prod, nom_prod, precio
metodo_de_pago — ID_metodo, nom_metodo, descuento (%)
orden — ID_orden, Fecha_inicio, Fecha_term, monto_total, ID_cliente, ID_metodo
detalle_orden — ID_orden, ID_prod, cantidad, precio_unitario

##  Uso
Descargar y copiar los archivos de este repositorio a la carpeta C:\xampp\htdocs\"Nombre de carpeta"

Luego, crear la base de datos desde XAMPP:

CREATE DATABASE justi_elementos_v2;

Importar el archivo .sql de este repositorio.

Configurar las credenciales en bd.php:

$ubicacion = "localhost";
$usuario   = "root";
$clave     = "tu_contraseña";
$base      = "justi_elementos_v2";

Encender Apache y MySQL desde el panel de XAMPP

Abrir el navegador en:
127.0.0.1/"Nombre de Carpeta"/index.php

## Estructura de archivos:

index.php Página de inicio con accesos rápidos a cada módulo
clientes.php Registro y listado de clientes
prod.php Completo de productos con buscador
met_pago.php Registro y listado de métodos de pago
orden.php Creación de órdenes y listado de pedidos
menu.php Barra de navegación compartida
bd.php Conexión a la base de datos 
estilo.css Estilos globales (tema oscuro)

Hecho por: Lucas Blanco, Nicolás Meijide y Dante Ramirez.
ET 21 de 10 "Fragata Escuela Libertad" 
Ciclo lectivo 2026
