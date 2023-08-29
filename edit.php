<?php
require_once 'classes/Utils.php';
require_once 'data/datas.php';

var_dump($pdo);
$stmt = $pdo->prepare(
    "UPDATE pages SET title=:title, content=:content WHERE id=:id"
);
var_dump($stmt);
$stmt->execute([
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'id' => intval($_GET['id'])
]);

Utils::redirect('admin.php');