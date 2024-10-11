<?php

require_once 'config.php';

class MovieModel
{
  private $db;

  public function __construct()
  {
    $this->db = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", MYSQL_USER, MYSQL_PASS);
    $this->deploy();
  }

  // AUTODEPLOY
  private function deploy()
  {
    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();
    if (count($tables) == 0) {
      $sql = "CREATE TABLE `genre` (
        `id_genre` int(11) NOT NULL,
        `main_genre` varchar(45) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        INSERT INTO `genre` (`id_genre`, `main_genre`) VALUES
        (12, 'aventura'),
        (14, 'fantasia'),
        (16, 'animación'),
        (27, 'terror'),
        (28, 'acción'),
        (35, 'comedia'),
        (53, 'suspenso'),
        (80, 'crimen'),
        (878, 'ciencia fición'),
        (10751, 'familia');
        
        CREATE TABLE `movie` (
        `id_movie` int(11) NOT NULL,
        `title` varchar(45) NOT NULL,
        `poster_path` varchar(70) NOT NULL,
        `release_date` date NOT NULL,
        `overview` text NOT NULL,
        `company` varchar(45) NOT NULL,
        `id_genre` int(11) NOT NULL)
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        INSERT INTO `movie` (`id_movie`, `title`, `poster_path`, `release_date`, `overview`, `company`, `id_genre`) VALUES
        (365177, 'Borderlands', '/jtEZi4eZxDjxcDIeMbkQ8HmvRs1.jpg', '2024-08-07', 'Borderlands se desarrolla en el planeta Pandora. Atraídas por las aparentemente vastos yacimientos minerales, muchas naves colonizadores de la Dahl Corporation (una de las muchas diversas megacorporaciones que aparentemente controlan y gobiernan planetas enteros) viajan al planeta para construir asentamientos. Las operaciones de minería son llevadas a cabo por una cantidad enorme de convictos llevados al planeta por la propia corporación.\r\n', 'Lionsgate', 28),
        (519182, 'Mi villano favorito 4', '/kqph8UWNOoYgTjYnkAx8dRlLLCq.jpg', '2024-06-20', 'Gru, Lucy y las niñas -Margo, Edith y Agnes- dan la bienvenida a un nuevo miembro en la familia: Gru Junior, que parece llegar con el propósito de ser un suplicio para su padre. Gru tendrá que enfrentarse en esta ocasión a su nueva némesis Maxime Le Mal y su sofisticada y malévola novia Valentina, lo que obligará a la familia a tener que darse a la fuga.\r\n', 'Universal Pictures', 16),
        (533535, 'Deadpool y Wolverine', '/9TFSqghEHrlBMRR63yTx80Orxva.jpg', '2024-07-24', 'Un Wade Wilson apático se esfuerza en la vida civil. Sus días como el mercenario moralmente flexible Deadpool quedaron atrás. Cuando su mundo natal se enfrenta a una amenaza existencial, Wade debe, a regañadientes, volver a la acción junto a un reacio Wolverine.\r\n', 'Marvel Studios', 28),
        (573435, 'Bad Boys: Hasta la muerte', '/zp0Y7Nsl4UnWiwX4LxXQXgDfXSz.jpg', '2024-06-05', 'Tras escuchar falsas acusaciones sobre su excapitán y mentor Mike y Marcus deciden investigar el asunto incluso volverse los más buscados de ser necesarios.', 'Sony Pictures Releasing', 28),
        (646097, 'Rebel Ridge', '/ymTgBQ8rCouE27oHpAUfgKEgRAj.jpg', '2024-08-27', 'Un exmarine debe enfrentarse a la corrupción en un pequeño pueblo cuando la policía le confisca injustamente la bolsa con el dinero para pagar la fianza de su primo.\r\n', 'Netflix', 80),
        (889737, 'Joker: Folie à Deux', '/tMMYwxrPwVPrxz3DqXs8DnVIOx0.jpg', '2024-10-01', 'Secuela de Joker (2019), de nuevo con Phoenix como Arthur Fleck, y que muestra su relación con el personaje de Harley Quinn, interpretado por Lady Gaga.', 'Warner Bros Pictures', 80),
        (917496, 'Beetlejuice Beetlejuice', '/kWJw7dCWHcfMLr0irTHAPIKrJ4I.jpg', '2024-09-04', 'Después de una tragedia familiar, tres generaciones de la familia Deetz regresan a su hogar en Winter River. La vida de Lydia, que aún sigue atormentada por Beetlejuice, da un vuelco cuando su hija adolescente, Astrid, abre accidentalmente el portal al más allá.\r\n', 'Warner Bros. Pictures', 35),
        (1022789, 'IntensaMente 2', '/aQnbNiadeGzGSjWLaXyeNxpAUIx.jpg', '2024-06-11', 'Riley, ahora adolescente, enfrenta una reforma en la Central de sus emociones. Alegría, Tristeza, Ira, Miedo y Asco deben adaptarse a la llegada de nuevas emociones: Ansiedad, Vergüenza, Envidia y Ennui.', 'Pixar Animation Studios', 16),
        (1184918, 'Robot salvaje', '/sDoXpaKZmrzCSJH63zZvQQ9A7VK.jpg', '2024-09-12', 'Una robot (la unidad ROZZUM 7134 o «Roz») ha naufragado en una isla deshabitada y deberá aprender a adaptarse al duro entorno, forjando poco a poco relaciones con la fauna local y convirtiéndose en madre adoptiva de una cría de ganso huérfana.', 'DreamWorks Animation', 16);
        
        CREATE TABLE `user` (
        `id_user` int(11) NOT NULL,
        `email` varchar(100) NOT NULL,
        `password` char(100) NOT NULL)
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
              
        INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
        (1, 'web@admin.com', '\$2y\$10\$th8zeOQxEIOTkYz4J0ePmuueSxKJWoCdn2P1MPWymyqZLPQSIf3h2');
        
        ALTER TABLE `genre`
        ADD PRIMARY KEY (`id_genre`),
        ADD KEY `id_genre` (`id_genre`);
            
        ALTER TABLE `movie`
        ADD PRIMARY KEY (`id_movie`),
        ADD KEY `id_genre` (`id_genre`);
        
        ALTER TABLE `user`
        ADD PRIMARY KEY (`id_user`);
          
        ALTER TABLE `user`
        MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
            
        ALTER TABLE `movie`
        ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;
        COMMIT;
        ";
      $this->db->query($sql);
    }
  }

  // -- ACCESO PÚBLICO -- 
  // obtener todas las películas
  public function getMovies()
  {
    $query = $this->db->prepare('SELECT id_movie, title, poster_path, release_date, overview, company, main_genre FROM movie INNER JOIN genre ON movie.id_genre = genre.id_genre');
    $query->execute();
    $movies = $query->fetchAll(PDO::FETCH_OBJ);

    return $movies;
  }

  // buscar película según título
  public function getMovieByTitle($title)
  {
    $query = $this->db->prepare('SELECT id_movie, title, poster_path, release_date, overview, company, main_genre FROM movie INNER JOIN genre ON movie.id_genre = genre.id_genre WHERE title = ?');
    $query->execute([$title]);
    $movie = $query->fetch(PDO::FETCH_OBJ);

    return $movie;
  }

  // obtener la lista de géneros
  public function getGenres()
  {
    $query = $this->db->prepare('SELECT * FROM genre');
    $query->execute();
    $genres = $query->fetchAll(PDO::FETCH_OBJ);

    return $genres;
  }

  // obtener la lista de películas según género
  public function getMoviesByGenre($genre)
  {
    $query = $this->db->prepare('SELECT id_movie, title, poster_path, release_date, overview, company, main_genre FROM movie INNER JOIN genre ON movie.id_genre = genre.id_genre WHERE main_genre = ?');
    $query->execute([$genre]);
    $movies = $query->fetchAll(PDO::FETCH_OBJ);

    return $movies;
  }

  // -- ACCESO ADMINISTRADOR --
  // insertar una película
  public function add($id_movie, $title, $poster_path, $release_date, $overview, $company, $id_genre)
  {
    $query = $this->db->prepare('INSERT INTO movie (id_movie, title, poster_path, release_date, overview, company, id_genre) VALUES (?,?,?,?,?,?,?)');
    $query->execute([$id_movie, $title, $poster_path, $release_date, $overview, $company, $id_genre]);

    $id = $this->db->lastInsertId();
    return $id;
  }

  // eliminar una película
  public function delete($title)
  {
    $query = $this->db->prepare('DELETE FROM movie WHERE title = ?');
    $query->execute([$title]);
  }

  // buscar película según id
  public function getMovieById($id)
  {
    $query = $this->db->prepare('SELECT id_movie, title, poster_path, release_date, overview, company, main_genre FROM movie INNER JOIN genre ON movie.id_genre = genre.id_genre WHERE id_movie = ?');
    $query->execute([$id]);
    $movie = $query->fetch(PDO::FETCH_OBJ);

    return $movie;
  }

  // editar una película
  public function edit($id_movie, $title, $poster_path, $release_date, $overview, $company, $id_genre)
  {
    $query = $this->db->prepare("UPDATE movie SET title = ?, poster_path = ?, release_date = ?, overview = ?, company = ?, id_genre = ? WHERE movie.id_movie = ?");
    $query->execute([$title, $poster_path, $release_date, $overview, $company, $id_genre, $id_movie]);

    $id = $this->db->lastInsertId();
    return $id;
  }
}
