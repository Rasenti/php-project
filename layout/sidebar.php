<?php require_once __DIR__ . '/../data/datas.php'; ?>

<div class="sidebar d-flex flex-column flex-shrink-0 p-3">

    <a href="/project/admin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4"><?php echo $title ?></span>
    </a>

    <hr>

    <ul class="nav flex-column mb-auto">

    <?php foreach ($categories as $categorie) { ?>
        <li class="nav-item">
            <a href="" class="nav-link text-white" aria-current="page"><?php echo $categorie['cat_name'] ?></a>
        </li>
    <?php } ?>

    </ul>

</div>