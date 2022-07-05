<?php
include './CRUD.php';
$crud =new CRUD( 'users',['id','firstname','lastname','email','phone']);
$users = $crud->list();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>OOP</title>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 m-5">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $key => $user){?>
                <tr>
                    <th scope="row"><?= ++$key ?></th>
                    <td><?= $user->firstname ?></td>
                    <td><?= $user->lastname ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                    <td>
                        <a href="./edit.php?id=<?=$user->id ?>" class="btn btn-primary">Edit</a>
                        <a href="./user.php?id=<?=$user->id ?>&action=delete" class="btn btn-danger">Delete</a>

                    </td>

                </tr>
                      <?php } ?>
                </tbody>
            </table>



        </div>
    </div>
</div>







</body>

</html>