<?php

class Utils
{
  public static function redirect(string $location): void
  {
    header('Location: ' . $location);
    exit;
  }

  public static function newPDO(): object|false
  {
    try {
      //DSN = Data Source Name
      $pdo = new PDO("mysql:host=host.docker.internal;port=3306;dbname=php_project;charset=utf8mb4", 'root', '');
      return $pdo;
    } catch (PDOException){
      return false;
    }
  }

  public static function selectFrom(object $pdo, string $tableName): array
  {
    $stmt = $pdo->query("SELECT * FROM $tableName");
    $table = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $table;
  }
}