<?php
    require_once "../connect.php"
?>

<?php

    if(isset($_POST["new"])){
        $cname=$_POST["cname"];
        $phone=$_POST["phone"];
        $addr=$_POST["address"];

        $result= $mysql->query("insert into customers (name,phone,address) values('$cname','$phone','$addr')");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("New customer saved successfully")';  
            echo '</script>';  
            header("Location:index.php");
        }
    }

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $result= $mysql->query("delete from customers where id = $id");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data deleted")';  
            echo '</script>';  
            header("Location: index.php");
        }
    }

?>
