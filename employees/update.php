<?php
    require_once "../connect.php"
?>


<?php
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $result= $mysql->query("select * from employees where id = $id");

        if($result){
            $row=$result->fetch_array();
           
            $name=$row["name"];
            $phone=$row["phone"];
            $role=$row["rid"];
            $salary=$row["salary"];
            $doj=$row["doj"];
            $address=$row["address"];
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
    <div class="container" style="width:75%">

        <div >
            <form method="post" action="#">
                <h1>Role Details</h1>
                <div class="form-group">
                    <label>Employee Name:</label>
                    <input type="text" class="form-control" placeholder="Customer Name" value=<?php echo $name; ?> name="name" required>
                </div>
                <div class="form-group">
                    <label>Employee Phone Number:</label>
                    <input type="number" class="form-control" placeholder="Customer Name" value=<?php echo $phone; ?> name="phone" required>
                </div>
                <div class="form-group">
                    <label>Employee Role:</label>
                    <select class="form-control" name="role">
                    <?php
                   
                    if($result=$mysql->query("select * from roles"))
                    {
                        while($row=mysqli_fetch_row($result))
                        {
                            if($row[0]!=$role)
                            echo "<option value=$row[0]>$row[1]</option>";
                            else
                            echo "<option value=$row[0] selected>$row[1]</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Employee Salary:</label>
                    <input type="number" class="form-control" placeholder="Customer Name" value=<?php echo $salary; ?> name="salary" required>
                </div>
                <div class="form-group">
                    <label>Employee Date of join:</label>
                    <input type="date" class="form-control" placeholder="Customer Name" value=<?php echo $doj; ?> name="doj" required>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" placeholder="Employee Address" value=<?php echo $address; ?> name="address" required>
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
        $name=$_POST["name"];
        $phone=$_POST["phone"];
        $role=$_POST["role"];
        $salary=$_POST["salary"];
        $doj=$_POST["doj"];
        $address=$_POST["address"];
        $result = $mysql->query("update employees set name = '$name',phone = '$phone',rid = '$role',address = '$address',salary = '$salary',doj = '$doj' where id = '$id'");
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

