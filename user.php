<?php
include './CRUD.php';
$post =$_POST;
$id = $_GET['id'] ?? 0;
$action = $_GET['action'] ?? null;
$columns =['firstname','lastname','email','phone',' about'];
if (isset($post['action']) && $post['action'] === 'create' ) {
    if (isset($post['firstname'])) {
        if (isset($post['lastname'])) {
            if (isset($post['email'])) {
                if (isset($post['phone'])) {
                    $crud = new CRUD('users', $columns, $post);
                    $succes = $crud->create();
                    if ($succes === 'Succsess'){
                        header("Location: index.php");
                    }else{
                        echo "Users is dont";
                        header("Location: index.php");
                    }
                } else {
                    echo "Phone is dont";
                    header("Location: index.php");
                }
            } else {
                echo "Email is dont";
                header("Location: index.php");
            }
        } else {
            echo "Lastname is dont";
            header("Location: index.php");
        }
    } else {
        echo "Firstname is dont";
        header("Location: index.php");
    }

}
if (isset($post['action']) && $post['action'] === 'update' ){
    $crud = new CRUD('users', $columns, $post,$id);
    $succes = $crud->update();
    if ($succes === 'Succsess'){
        header("Location: index.php");
    }else{
        echo "Users is dont";
        header("Location: index.php");
    }
}
if (isset($action) && $action === 'delete' ){
    $crud = new CRUD('users',[],[],$id);
    $succes = $crud->delete();
    if ($succes === 'Succsess'){
        header("Location: index.php");
    }else{
        echo "Users is dont";
        header("Location: index.php");
    }
}


?>
