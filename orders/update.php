<?php
    require_once "../connect.php"
?>


<?php
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $result= $mysql->query("select * from orders where id = $id");

        if($result){
            $row=$result->fetch_array();
           
        $customer=$row["cid"];
        $handler=$row["eid"];
        $orderDate=$row["orderDate"];
        $dueDate=$row["dueDate"];
        $qty=$row["qty"];
        $cost=$row["cost"];
        $stage=$row["sid"];
        $description=$row["description"];
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Add New Role</title>
</head>
<body>
<div class="title">
        <h1 class="text-center">
            <a href="../index.html" class="btn btn-primary m-1">
                <h1>
                Tailor Management
                </h1>
            </a>
        </h1>
        <hr>
    </div>
    <div class="container" style="width:75%">

        <div >
            <form method="post" action="#">
                <h1>Role Details</h1>
                <div class="form-group">
                    <label>Customer:</label>
                    <select class="form-control" name="customer">
                    <?php
                   
                    if($result=$mysql->query("select * from customers"))
                    {
                        while($row=mysqli_fetch_row($result))
                        {
                            if($row[0]!=$customer)
                            echo "<option value=$row[0]>$row[1]</option>";
                            else
                            echo "<option value=$row[0] selected>$row[1]</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Handler:</label>
                    <select class="form-control" name="handler">
                    <?php
                   
                    if($result=$mysql->query("select * from employees"))
                    {
                        while($row=mysqli_fetch_row($result))
                        {
                            if($row[0]!=$handler)
                            echo "<option value=$row[0]>$row[1]</option>";
                            else
                            echo "<option value=$row[0] selected>$row[1]</option>";
                        }
                    }
                    ?>
                    </select>

                </div>
                <div class="form-group">
                    <label>Order date:</label>
                    <input type="date" class="form-control" placeholder="Customer Name" value=<?php echo $orderDate; ?> name="orderDate" required>
                </div>
                <div class="form-group">
                    <label>Due Date:</label>
                    <input type="date" class="form-control" placeholder="Customer Name" value=<?php echo $dueDate; ?> name="dueDate" required>
                </div>
                
                <div class="form-group">
                    <label>Stage:</label>
                    <select class="form-control" name="stage">
                        <?php
                    
                            if($result=$mysql->query("select * from stages"))
                            {
                                while($row=mysqli_fetch_row($result))
                                {
                                    if($row[0]!=$stage)
                                    echo "<option value=$row[0]>$row[1]</option>";
                                    else
                                    echo "<option value=$row[0] selected>$row[1]</option>";
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Qty:</label>
                    <input type="number" class="form-control" placeholder="Customer Name" value=<?php echo $qty; ?> name="qty" required/>
                </div>

                <div class="form-group">
                    <label>Cost:</label>
                    <input type="number" class="form-control" placeholder="Customer Name" value=<?php echo $cost; ?> name="cost" required>
                </div>
                
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" placeholder="Employee Address" value=<?php echo $description; ?> name="description" required>
                </div>
                
                <div>
                    <input class="btn btn-primary" name="update" type="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['update'])){
        $customer=$_POST["customer"];
        $handler=$_POST["handler"];
        $orderDate=$_POST["orderDate"];
        $dueDate=$_POST["dueDate"];
        $qty=$_POST["qty"];
        $cost=$_POST["cost"];
        $stage=$_POST["stage"];
        $description=$_POST["description"];
        $result = $mysql->query("update orders set orderDate = '$orderDate',dueDate = '$dueDate',qty = '$qty',cid = '$customer',eid = '$handler',sid = '$stage',cost = '$cost',description = '$description' where id = '$id'");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data Updated")';  
            echo '</script>';  
            header("Location: index.php");
        }
        else{
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data not updated")';  
            echo '</script>'; 

        }
    }
?>

