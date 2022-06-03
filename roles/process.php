<?php
    require_once "../connect.php"
?>

<?php

    if(isset($_POST["new"])){
        $role=$_POST["role"];
        $description=$_POST["description"];

        $result= $mysql->query("insert into roles (role,description) values('$role','$description')");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("New customer saved successfully")';  
            echo '</script>';  
            header("Location:index.php");
        }
    }

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $result= $mysql->query("delete from roles where id = $id");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data deleted")';  
            echo '</script>';  
            header("Location: index.php");
        }
    }

?>
