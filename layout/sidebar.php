<?php require_once __DIR__ . '/../data/datas.php'; ?>

<div class="sidebar d-flex flex-column flex-shrink-0 p-3">

    <?php if ($title === 'Administration' || $title === 'Nouvel Article' || $title === 'Éditeur') { ?>
        <a href="admin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">
                <?php echo 'Administration';
    } else { ?>
        <a href="encyclopedie.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">
                <?php echo 'Encyclopédie' ;
            } ?>
            </span>
        </a>

    <hr>

    <ul class="nav flex-column mb-auto">

    <?php foreach ($categories as $categorie) { ?>
        <li class="nav-item">
            <a href="categorie.php?name=<?php echo $categorie['cat_name']?>" class="nav-link <?php echo ($title === $categorie['cat_name']) ? 'nav_highlight' : 'text-white' ?>" aria-current="page"><?php echo $categorie['cat_name'] ?></a>
        </li>
    <?php } ?>

    </ul>

</div>