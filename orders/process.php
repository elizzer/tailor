<?php
    require_once "../connect.php"
?>

<?php

    if(isset($_POST["new"])){
        $customer=$_POST["customer"];
        $handler=$_POST["handler"];
        $orderDate=$_POST["od"];
        $dueDate=$_POST["dueDate"];
        $qty=$_POST["qty"];
        $cost=$_POST["cost"];
        $stage=$_POST["stage"];
        $description=$_POST["description"];

        $result= $mysql->query("insert into orders (orderDate,dueDate,qty,cid,sid,eid,cost,description) values('$orderDate','$dueDate','$qty','$customer','$stage','$handler','$cost','$description')");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("New customer saved successfully")';  
            echo '</script>';  
            header("Location:index.php");
        }
    }

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $result= $mysql->query("delete from orders where id = $id");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data deleted")';  
            echo '</script>';  
            header("Location: index.php");
        }
    }

?>
