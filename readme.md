# Aergibide S.L.

APRENDIZAJE COLABORATIVO BASADO EN RETOS 2024/2025 RETO 1: “GESTIÓN DEL CONOCIMIENTO”

![Logo](https://github.com/CloudSphere-Web/Reto-1-Gestion-del-Conocimiento/blob/main/Documentos/banner%20aergibide.jpg?raw=true)

## Guia de Estilos

- Guia de Estilos: https://www.figma.com/design/unWJXWA3r8w7IQXHQUwNX0/Aergibide?node-id=6-2

- Fuente Predeterminada: https://fonts.google.com/specimen/Lato

- Fuente Secundaria (En caso de que no cargue la predeterminada): https://fonts.google.com/specimen/Montserrat

## Instalacion Proyecto en Local

    1. Clonamos el Repositorio: https://github.com/CloudSphere-Web/Reto-1-Gestion-del-Conocimiento.git

    2. Lo metemos en la carpeta "htdocs" de Xampp o en la carpeta "www" en caso de estar usando Laragon.

        2.1 En caso de estar conectado a la red "arfplh" deberemos tener activa esta conexion en
            el archivo "config.php"
            
![ConexionArfplh](https://github.com/CloudSphere-Web/Reto-1-Gestion-del-Conocimiento/blob/main/Documentos/conexion-arfplh.PNG?raw=true)
    
        2.2 En caso de estar conectado a cualquier otra red deberemos tener activa esta conexion en
            el archivo "config.php"

![conexionCualquiera](https://github.com/CloudSphere-Web/Reto-1-Gestion-del-Conocimiento/blob/main/Documentos/conexion-otra-red.PNG?raw=true)

        2.3 En caso de preferir usarlo en localhost deberemos tener activa esta conexion en
            el archivo "config.php"

        2.4 Para que funcione correctamente con la base de datos local (en "phpmyadmin" si estas usando 
            Xampp o en "HeidiSQL" si estas usando Laragon) debemos crear una nueva conexion 
            llamada "proyecto" o en caso de preferir otro nombre deberas actualizarlo en el config.php
            importar las tablas y todos los datos. Para ello dispones del archivo "carga_datos.sql" en 
            la carpeta "BD" de la raiz del repositorio.

![conexionLocal](https://github.com/CloudSphere-Web/Reto-1-Gestion-del-Conocimiento/blob/main/Documentos/conexion-local.png?raw=true)

    3. Ejecutamos Xampp o Laragon y entramos desde un navegador a la ruta "http://localhost/"

    4. Entramos al repositorio que acabamos de clonar, una vez dentro de la carpeta del repositorio 
        nos metemos en la carpeta "Codigo".

    5. Si hemos seguido correctamente todos los pasos deberia salirnos el login de la pagina. 
        Los usuarios con permisos de usuario y permisos de admin se encuentran en sus respectivos
        manuales. La sesion tiene una duracion de 60 minutos.

![exito](https://github.com/CloudSphere-Web/Reto-1-Gestion-del-Conocimiento/blob/main/Documentos/exito.PNG?raw=true)

## Acceso Proyecto en Remoto (Tiempos de Carga Mayores)

    * Disclaimer: Al acceder desde el siguiente dominio las peticiones al servidor pueden tardar algo 
                  mas que en local.

    1. Accedemos a "https://aergibide.site/"

    2. Si el servidor se encuentra activo y funcionando correctamente deberia salirnos la pagina de 
        login. Los usuarios con permisos de usuario y permisos de admin se encuentran en sus respectivos
        manuales. La sesion tiene una duracion de 60 minutos.

![exito](https://github.com/CloudSphere-Web/Reto-1-Gestion-del-Conocimiento/blob/main/Documentos/exito-remoto.PNG?raw=true)


## Autores

- [@adriloma21](https://github.com/adriloma21)
- [@OskarPerezGomez](https://github.com/OskarPerezGomez)
- [@ZahirRiveraChacon](https://github.com/ZahirRiveraChacon)
