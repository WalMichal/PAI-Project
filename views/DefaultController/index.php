<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>


<div class="container">
    <header>
    <?php include(dirname(__DIR__).'/navbar.html'); ?>
    </header>
        <div class="row">
        <h1 class="col-12">GODS</h1>
        </div>
            <?php echo "<div class=\"row\">";
            foreach ($gods as $god)
            {
                #echo $god['name'];
                #$godPath = __DIR__.'/../views/godsImg/'.$god['name'].'.jpg';
                $godName = $god['name'];
                $idGod = $god['idGod'];
                #$godPath = str_replace('\\','/',$godPath);
                $godPath ='views\\godsImg\\'.$godName.'.jpg';

                #echo $godPath;
                #$godPath = __DIR__.$god['name'].jpg;
                echo "<div class=\"col-sm-4\">";
                echo "<figure>";
                echo "<a href=\"?page=god&id=$idGod\"><img src=\"$godPath\" class = \"img-fluid\" alt=\"$godName\" width = \"120\" height = \"160\"> </a> ";
                echo "<figcaption> $godName</figcaption>";
                echo "</figure>";
                echo "</div>";
            }
            echo "</div>";?>

    </div>


</body>
</html>