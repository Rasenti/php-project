<?php

class Utils
{
  public static function redirect(string $location): void
  {
    header('Location: ' . $location);
    exit;
  }

  public static function newPDO(): PDO
  {
      //DSN = Data Source Name
      $pdo = new PDO(
        "mysql:host=host.docker.internal;port=3306;dbname=php_project;charset=utf8mb4",
        'root',
        '', 
        [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
      return $pdo;
  }

  public static function selectFrom(object $pdo, string $tableName): array
  {
    $stmt = $pdo->query("SELECT * FROM $tableName");
    $table = $stmt->fetchAll();
    return $table;
  }

  public static function editArticle(object $pdo, string $tableName): void
  {
    $stmt = $pdo->query
      ("UPDATE $tableName
      SET column1 = value1, column2 = value2, ...
      WHERE condition;");
    
    
  }
}

