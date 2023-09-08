<?php

abstract class Utils
{
  public static function redirect(string $location): void
  {
    header('Location: ' . $location);
    exit;
  }

  /**
   * Create an instance of PDO using a db.ini file
   *
   * @return PDO
   */
  public static function newPDO(): PDO
  {
      $dbSettings = parse_ini_file(__DIR__ . '/../data/db.ini');
      [
        'DB_HOST' => $host,
        'DB_PORT' => $port,
        'DB_NAME' => $name,
        'DB_CHARSET' => $charset,
        'DB_USER' => $user,
        'DB_PASSWORD' => $password
      ] = $dbSettings;

      //DSN = Data Source Name
      $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$name;charset=$charset",
        $user,
        $password, 
        [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
      return $pdo;
  }

  /**
   * Send a SQL query to select all from a given table
   *
   * @param object $pdo
   * @param string $tableName
   * @return array
   */
  public static function selectFrom(object $pdo, string $tableName): array
  {
    $stmt = $pdo->query("SELECT * FROM $tableName");
    $table = $stmt->fetchAll();
    return $table;
  }

  // Exploration de la possibilité de passer par une méthode statique pour l'édition d'articles
  //
  // public static function editArticle(object $pdo, string $tableName): void
  // {
  //   $stmt = $pdo->query
  //     ("UPDATE $tableName
  //     SET column1 = value1, column2 = value2, ...
  //     WHERE condition;");
    
    
  // }
}

