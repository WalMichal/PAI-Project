<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__) . '/head.html'); ?>

<body>


<div class="container">
    <header>
        <?php include(dirname(__DIR__) . '/navbar.html'); ?>
        <h1>
            <?php
            echo $god['godName']; ?>
        </h1>
    </header>
    <div class="row">
        <div class="col-sm-4">
            <figure>
                <?php
                if (!isset($_GET['id'])) {
                    $idGod = 1;
                } else {
                    $idGod = $_GET['id'];
                }
                $godName = $god['godName'];
                $godPath = 'views\\godsImg\\' . $godName . '.jpg';
                echo "<a href=\"?page=god&id=$idGod\"><img src=\"$godPath\" class = \"img-fluid\" alt=\"$godName\" width = \"425\" height = \"572\"> </a> ";
                ?>
            </figure>
        </div>
        <div class="col-sm-8">
            <?php echo $god['godDescription']; ?>
        </div>
    </div>
    <div class="row" style="text-align: center;">
        <div class="col-sm-3 bg-success text-white">
            <h3>
                <?php
                echo $god['mName']; ?>
            </h3>
        </div>
        <div class="col-sm-3 bg-secondary text-white">
            <h3>
                <?php
                echo $god['rName']; ?>
            </h3>
        </div>
        <div class="col-sm-3 bg-success text-white ">
            <h3>
                <?php
                echo $god['comName']; ?>
            </h3>
        </div>
        <div class="col-sm-3 bg-secondary text-white ">
            <h3>
                <?php
                echo $god['clName']; ?>
            </h3>
        </div>


    </div>

    <?php
    if (isset($_SESSION['id'])) { ?>
        <br><br>
        <form action="?page=god&id=<?php echo $idGod?>$com=1" method="POST">
            <div class="form-group row">
                <label for="inputComment" class="col-sm-1 col-form-label">
                    <i class="material-icons md-48">comment</i>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputComment" name="comment" placeholder="Enter comment..." />
                </div>
                <input type="submit" value="Send" class="btn btn-primary btn-lg float-right" />
            </div>
        </form>
    <?php
    }
    foreach ($com as $c) {
        ?>
        <br>
        <div class="row">
            <div class="col-sm-2 bg-info text-white">
                <h3>
                    <?php
                    echo $c['nick']; ?>
                </h3>
            </div>
            <div class="col-sm-2 bg-warning text-dark">
                <h3>
                    <?php
                    echo $c['timee']; ?>
                </h3>
            </div>
            <div class="col-sm-8 ">
                <h3>
                    <?php
                    echo $c['comm']; ?>
                </h3>
            </div>
        </div>
        <?php
    }
    ?>

</div>
</body>
