<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html') ?>

<body>

<div class="container">
    <div clas="row">
        <div class="col-sm-6 offset-sm-3">
            <h1 class="panel-header">REGISTRATION</h1>
            <hr>
            <?php if(isset($message)): ?>
                <?php foreach($message as $item): ?>
                    <div><?= $item ?></div>
                <?php endforeach; ?>
            <?php endif; ?>

            <form name="reg" action="?page=register" onsubmit="return validate()" method="POST" >
                <div class="form-group row">
                    <label for="inputNick" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">account_box</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="text" class="form-control" placeholder="Nickname(only letters and numbers,max length = 36)" name="nickname" id="inputNick" pattern="[A-Za-z0-9]{1,36}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">email</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">lock</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password(Range:8-20)" type="password" minlength="8" maxlength="20" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPasswordAgain" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">lock</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="password" name="passwordrepeated" class="form-control" id="inputPasswordAgain" placeholder="Repeat password" type="password" minlength="8" maxlength="20" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputRegulamin" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">assignment</i>
                    </label>
                    <div class="col-sm-1">
                        <input type="checkbox" name="regulaminbox" class="form-control" id="inputRegulamin" placeholder="Accept regulamin""/>
                    </div>
                    <div class="form-group row">
                        <label for="regulamin" class = "col-sm-11">
                            Akceptuję regulamin.
                        </label>
                    </div>

                </div>
                <p id="demo" onclick="passCheck()"><br>Click me to change my text color.</p>
                <input type="submit"  value="Sign in" class= "btn btn-primary btn-lg float-right"  />
            </form>
        </div>
    </div>
</div>
<div class='pai-events'>test</div>

<script>
    function passCheck() {
        document.getElementById("demo").style.color = "red";
        document.getElementById("demo").innerHTML = "FUJU";

        $(document).ready(function(){
            $("p").click(function(){
                $(this).hide();
            });
        });


    }
    function validate(){
            if(document.getElementById("inputPassword").value!==document.getElementById("inputPasswordAgain").value) {
                alert("Hasla się nie zgadzają!");
                return false;
            }
            else{
                    const apiUrl = "http://localhost:80";
                    const inputNick = document.getElementById("inputNick").value;
                    const iddd = 2;
                $.post({
                    url : "http://localhost:80/pai/?page=validateNick",
                    type : "POST",
                    data : {
                        nickname : inputNick
                    },

                    success: function() {
                        alert('Selected user successfully deleted from database!');
                    }

                }).done((res) => {

                    //robimy pętlę po zwróconej kolekcji
                    //dołączając do tabeli kolejne wiersze
                    alert(res);
                });

                alert("Zgadzaja sie");
                return true;
            }


    }
    $(document).ready(function(){
        $(".pai-events").on({
            mouseenter: function(){
                $(this).css("background-color", "lightgray");
            },
            mouseleave: function(){
                $(this).css("background-color", "lightblue");
            },
            click: function(){
                $(this).css("background-color", "yellow");
            }
        });
    });

</script>