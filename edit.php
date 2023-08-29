<?php
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'data/datas.php';

var_dump($pdo);
$stmtEdit = $pdo->prepare(
    "UPDATE pages SET title=:title, content=:content WHERE id=:id"
);
var_dump($stmtEdit);
$stmtEdit->execute([
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'id' => intval($_GET['id'])
]);

Utils::redirect('admin.php');