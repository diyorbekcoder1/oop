<?php
include './CRUD.php';
$id =$_GET['id'];
$crud = new CRUD( 'users',['id','firstname','lastname','email','phone','about'], [] ,$id);
$user = $crud->show();

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
            <form method="post" action="user.php?id=<?=$id ?>" enctype="multipart/form-data">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="firstname" value="<?=$user->firstname ?>" id="form6Example1" class="form-control" />
                            <label class="form-label"  for="form6Example1">First name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" name="lastname" value="<?=$user->lastname ?>" id="form6Example2" class="form-control" />
                            <label class="form-label" for="form6Example2">Last name</label>
                        </div>
                    </div>
                </div>



                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" value="<?=$user->email ?>" id="form6Example5" class="form-control" />
                    <label class="form-label"  for="form6Example5">Email</label>
                </div>

                <!-- Number input -->
                <div class="form-outline mb-4">
                    <input type="tel" name="phone" value="<?=$user->phone ?>" id="form6Example6" class="form-control" />
                    <label class="form-label" for="form6Example6">Phone</label>
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                    <textarea class="form-control " name="about"  id="form6Example7" rows="4"><?= $user->about ?></textarea>
                    <label class="form-label" for="form6Example7">Additional information</label>
                </div>

                <!-- Checkbox -->


                <div class="form-outline mb-4">
                    <input type="hidden" name="action" value="update" id="form6Example6" class="form-control" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
            </form>
        </div>
    </div>
</div>







</body>

</html>

