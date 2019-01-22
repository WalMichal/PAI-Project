<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html'); ?>

<body>


<div class="container">
    <header>
        <?php include(dirname(__DIR__) . '/navbar.html'); ?>
        <h1>
            <?php
            echo $item['iName']; ?>
        </h1>
    </header>
    <div class="row">
        <div class="col-sm-4">
            <figure>
                <?php
                if (!isset($_GET['id'])) {
                    $idItem = 1;
                } else {
                    $idItem = $_GET['id'];
                }
                $itemName = $item['iName'];
                $itemPath = 'views\\itemsImg\\' . $itemName . '.jpg';
                echo "<a href=\"?page=item&id=$idItem\"><img src=\"$itemPath\" class = \"img-fluid\" alt=\"$itemName\" width = \"425\" height = \"572\"> </a> ";
                ?>
            </figure>
        </div>
        <div class="col-sm-8">
            <?php echo $item['iDescription']; ?>
        </div>
    </div>
    <div class="row" style="text-align: center;">
        <div class="col-sm-3 bg-secondary text-white ">
            <h3>
                <?php
                echo $item['clName']; ?>
            </h3>
        </div>


    </div>
</div>
</body>
