# WEB2 TPE 1er entrega
### Consigna
Se propone diseñar una base de datos que pueda almacenar un conjunto de elementos clasificados en categorías.

### Modelo de datos
Las entidades "genre" y "production_company" se relacionan de 1 a N con la entidad "movie", ya que una película podrá tener un solo género y una sola compañia, pero un género y/o una compañia podran tener una o más películas.

La entidad "movie" tiene como clave primaria "id_movie" y como claves foráneas "id_genre" y "id_company".

La entidad "genre" tiene como clave primaria "id_genre".

La entidad "production_company" tiene como clave primaria "id_company".

<img width="500" src="https://github.com/user-attachments/assets/5b8a648e-a547-400f-bef7-392e9e7a10d4">
