<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>

<div class="container">
    <header>
        <?php include(dirname(__DIR__).'/navbar.html'); ?>
    </header>
    <div class="row">
        <h1 class="col-12">ITEMS</h1>
    </div>
    <?php echo "<div class=\"row\">";
    foreach ($items as $item)
    {
        #echo $god['name'];
        #$godPath = __DIR__.'/../views/godsImg/'.$god['name'].'.jpg';
        $itemName = $item['name'];
        $idGod = $item['idItem'];
        #$godPath = str_replace('\\','/',$godPath);
        $itemPath ='views\\itemsImg\\'.$itemName.'.jpg';

        #echo $godPath;
        #$godPath = __DIR__.$god['name'].jpg;
        echo "<div class=\"col-sm-4\">";
        echo "<figure>";
        echo "<a href=\"?page=item&id=$idGod\"><img src=\"$itemPath\" class = \"img-fluid\" alt=\"$itemName\" width = \"120\" height = \"160\"> </a> ";
        echo "<figcaption> $itemName</figcaption>";
        echo "</figure>";
        echo "</div>";
    }
    echo "</div>";?>

</div>
</body>
</html>
