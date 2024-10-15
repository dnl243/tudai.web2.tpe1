# Blockbuster

## Bienvenidos a Blockbuster, donde encontraras tu próxima película!

### Requerimientos Funcionales

#### Acceso público
- En el home se estarán listadas las películas, pudiendo acceder a los detalles de cada una clickeando en el título. En cada sección se verá la categoría a la cual pertenece cada una.
- En la barra de navegación se encontrará el enlace para acceder a las categorias (géneros), donde se accederá a una lista de enlaces que llevarán a un listado de películas según el género, al igual que en el enlace de cada detalle de película.

#### Acceso administrador
- Previo al ingreso a la sección del adminstrador, será necesario loguearse con email `web@admin.com` y usuario `admin`
- Una vez hecha la validación será redireccionado a un panel de administrador con acceso a la lista de películas y categorías, donde se podrá insertar, editar y eliminar tanto películas como géneros.
- El administrador podrá desloguearse para salir y será redirijido al home.

#### Base de datos
- Utilizamos una base de datos de tres tablas: "genre", "movie" y "user".
- El sistema accede a la misma a través del archivo config.php.

### Pasos para desplegar el sitio

- Iniciar Apache y phpMyAdmin.
- Clonar el repositorio "https://github.com/dnl243/tudai.web2.tpe1.git" dentro de la carpeta "C:\xampp\htdocs\".
- En el browser ingresar en "http://localhost/phpmyadmin/".
- En caso de ser necesario, en la raiz del proyecto, modificar el archivo config.php (usuario y contraseña de phpMyAdmin).

--> Opcion 1 <--

- Crear una DB con nombre "g1_db_movies" sin tablas.
- El sitio se encargará de crear y completar las tablas en la DB.
- En el browser ingresar en "http://localhost/tudai.web2.tpe1/".

--> Opcion 2 <--

- Importar el archivo "g1_db_movies.sql".
- En el browser ingresar en "http://localhost/tudai.web2.tpe1/".
