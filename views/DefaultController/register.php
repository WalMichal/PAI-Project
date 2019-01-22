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

            <form name="reg" action="?page=addUser" " method="POST" >
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
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password(Range:8-20)" type="password" minlength="8" maxlength="20" onblur = "validatePass1()" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPasswordAgain" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">lock</i>
                    </label>
                    <div class="col-sm-11">
                        <input type="password" name="passwordrepeated" class="form-control" id="inputPasswordAgain" placeholder="Repeat password" type="password" minlength="8" maxlength="20" onblur = "validatePass2()" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputRegulamin" class="col-sm-1 col-form-label">
                        <i class="material-icons md-48">assignment</i>
                    </label>
                    <div class="col-sm-2">
                        <input type="checkbox" name="regulaminbox" class="form-control" id="inputRegulamin" placeholder="Accept regulamin""/>
                    </div>
                    <div>
                        <label for="regulamin" class = "col-sm-12">
                            I accept the <a href="?page=statute">terms and conditions.</a>
                        </label>
                    </div>

                </div>
                <a href = "?page=index" class = "btn btn-dark btn-primary btn-lg float-left">Return.</a>
                <input type="submit"  value="Sign in." class= "btn btn-primary btn-lg float-right"  />
            </form>
        </div>
    </div>
</div>


<script>

    var pass1 = false;
    var pass2 = false;
    function validatePass1(){
        pass1 = true;
        if(pass2){
            validatePass();
        }
    }
    function validatePass2() {
        pass2 = true;
        if(pass1){
            validatePass();

    }
}

        function validatePass(){

        if(pass2){
            if(document.getElementById("inputPassword").value!==document.getElementById("inputPasswordAgain").value) {

                $("#inputPassword").css({
                    'border' :' 4px solid red',
                    'text-decoration' :' none',
                    'color' : 'red'
                });
                $("#inputPasswordAgain").css({
                    'border' :' 4px solid red',
                    'text-decoration' :' none',
                    'color' : 'red'
                });

            }
            else {
                $("#inputPassword").css({
                    'border' :' 2px solid green',
                    'text-decoration' :' none',
                    'color' : 'black'
                });
                $("#inputPasswordAgain").css({
                    'border' :' 2px solid green',
                    'text-decoration' :' none',
                    'color' : 'black'
                });
            }
        }

    }
    function validate(){

                    const apiUrl = "http://localhost:80/pai";
                    const inputNick = document.getElementById("inputNick").value;
                    const inputEmail = document.getElementById("inputEmail").value;

                    var option = false;
                $.post({
                    url: apiUrl + "/?page=validateNick",
                    type: "POST",
                    data: {
                        nickname: inputNick
                    },
                    async: 'false',

                    success: function () {

                    },
                    statusCode:
                        {
                            200: function () {

                            },
                            400: function () {
                                if(!option){
                                alert("User with this name already exist. Try change nickname :).");
                                }
                                option = true;
                            },

                            404: function () {
                                alert("Serwer didn't response. Try it in a moment.");
                            }
                        }


                });


    $.post({
        url: apiUrl + "/?page=validateEmail",
        type: "POST",
        data: {
            email: inputEmail
        },
        async: 'false',

        success: function () {

        },
        statusCode:
            {
                200: function () {

                },
                400: function () {
                    if(!option) {
                        alert("User with this email already exist. Use other email :).");
                    }
                    option = true;
                },

                404: function () {
                    alert("Serwer didn't response. Try it in a moment.");
                    returnValue = false;
                }
            }


    });
    }



</script>