<?php
require_once 'classes/Utils.php';
require_once 'classes/ErrorCode.php';
require_once 'data/datas.php';

// var_dump($_POST['title']);
// var_dump($_POST['content']);

$stmtEdit = $pdo->prepare
    ("UPDATE pages
    SET title = :title, content = :content
    WHERE id = :id");

$stmtEdit->execute([
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'id' => intval($_GET['id'])
]);

// var_dump($_GET['id']);

// Utils::redirect('admin.php');