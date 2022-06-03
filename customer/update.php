<?php
    require_once "../connect.php"
?>


<?php
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $result= $mysql->query("select * from customers where id = $id");

        if($result){
            $row=$result->fetch_array();
            $name=$row["name"];
            $phone=$row["phone"];
            $addr=$row["address"];
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
    <title>Add Customer</title>
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
                <h1>Customer Details</h1>
                <div class="form-group">
                    <label>Customer Name:</label>
                    <input type="text" class="form-control" placeholder="Customer Name" value="<?php echo $name ?>" name="cname" required>
                </div>
                <div class="form-group">
                    <label>Customer Phone Number:</label>
                    <input type="number" class="form-control" placeholder="Customer PhoneNUmber" value="<?php echo $phone ?>" name="phone" required>
                </div>
                <div class="form-group">
                    <label>Customer Address:</label>
                    <input type="text" class="form-control" placeholder="Customer Address" value="<?php echo $addr ?>" name="address" required></input>
                </div>
                
                <div>
                    <input class="btn btn-primary" name="update" type="submit"></input>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['update'])){
        $name=$_POST['cname'];
        $phone=$_POST['phone'];
        $addr=$_POST['address'];
        $result = $mysql->query("update customers set name = '$name',phone = '$phone',address= '$addr' where id = '$id'");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data Updated")';  
            echo '</script>';  
            header("Location: index.php");
        }
    }
?>

