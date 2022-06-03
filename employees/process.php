<?php
    require_once "../connect.php"
?>

<?php

    if(isset($_POST["new"])){
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $role=$_POST["role"];
        $salary=$_POST["salary"];
        $doj=$_POST["doj"];
        $address=$_POST["address"];

        $result= $mysql->query("insert into employees (name,phone,rid,salary,doj,address) values('$name','$phone','$role','$salary','$doj','$address')");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("New customer saved successfully")';  
            echo '</script>';  
            header("Location:index.php");
        }
    }

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $result= $mysql->query("delete from employees where id = $id");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data deleted")';  
            echo '</script>';  
            header("Location: index.php");
        }
    }

?>
