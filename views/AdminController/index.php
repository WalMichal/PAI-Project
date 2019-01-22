<!DOCTYPE html>
<html>

<?php include(dirname(__DIR__).'/head.html'); ?>

<body>

<div class="container">
    <div class="row">
        <h1 class="col-12 pl-0">ADMIN PANEL</h1>

        <h4 class="mt-4">Your data:</h4>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nickname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $user->getNickname(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td><?php if($user->getRole()=='1'){echo "admin";} else echo "user"; ?></td>
                <td>-</td>
            </tr>
            </tbody>
            <tbody class="users-list">
            </tbody>
        </table>

        <button class="btn btn-dark btn-lg" type="button" onclick="getUsers()">Get all users</button>
    </div>
</div>

</body>
</html>
<script>
    function deleteUser(id) {
        if (!confirm('Do you want to delete this user?')) {
            return;
        }
        const apiUrl = "http://localhost:80/pai";
        $.ajax({
            url : apiUrl + '/?page=admin_delete_user',
            method : "POST",
            data : {
                id : id
            },
            success: function() {
                alert('Selected user successfully deleted from database!');
                getUsers();
            }
        });
    }
    function getUsers() {
        const apiUrl = "http://localhost:80/pai";
        const $list = $('.users-list');

        var zm = 'user';
        $.ajax({
            url : apiUrl + '/?page=admin_users',
            dataType : 'json'
        })
            .done((res) => {
                $list.empty();
                //robimy pętlę po zwróconej kolekcji
                //dołączając do tabeli kolejne wiersze

                res.forEach(el => {



                    if(el.idPermission==="2"){zm = 'user';
                        $list.append(`
                    <tr>
                     <td>${el.nickname}</td>
                     <td>${el.email}</td><td>${zm}</td>
                     <td>
                         <button class="btn btn-danger" type="button" onclick="deleteUser(${el.idUser})">
                          <i class="material-icons">delete_forever</i>
                          </button>
                     </td>
                     </tr>`);}
                    else{zm = 'admin';
                        $list.append(`<tr>
                     <td>${el.nickname}</td>
                     <td>${el.email}</td>
                        <td>${zm}</td>
                        <td>-</td>
                        </tr>`);}



                })
            });
    }


</script>