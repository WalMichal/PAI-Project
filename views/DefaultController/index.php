<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>
<?php include(dirname(__DIR__).'/navbar.html'); ?>

<div class="container">
    <div class="row">
        <h1 class="col-12">HOMEPAGE</h1>
        <p>
            <?= $text ?>
        </p>


        <?php
        if(isset($_SESSION) && !empty($_SESSION)) {
            print_r($_SESSION);
        }
        ?>

        <div class="position">
            <div id="turquise" class="static">Static</div>
            <div id="blue" class="static">Static</div>
            <div id="violet" class="relative">Relative</div>

            <div id="red" class="fixed">Fixed</div>
            <div id="yellow">Default</div>
        </div>
    </div>
</div>

</body>
</html>