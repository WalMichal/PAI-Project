<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>


<div class="container">
    <header>
    <?php include(dirname(__DIR__).'/navbar.html'); ?>
    </header>
        <div class="row">
        <h1 class="col-12">HOMEPAGE</h1>
        <p>
            <a href="?page=login">Zaloguj</a>
            <a href="?page=register">Zajerestruj</a>
            <a href="?page=logout">Wyloguj</a>
            <a href="?page=admin">Admin Panel</a>

            <br><br>
        </p>
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


        <div class="position">
            <div id="turquise" class="static">Static</div>
            <div id="blue" class="static">Static</div>
            <div id="violet" class="relative">Relative</div>

            <div id="red" class="fixed">Fixed</div>
            <div id="yellow">Default</div>
        </div>
    </div>


</body>
</html>