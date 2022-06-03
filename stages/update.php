<?php
    require_once "../connect.php"
?>


<?php
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $result= $mysql->query("select * from stages where id = $id");

        if($result){
            $row=$result->fetch_array();
            $stage=$row["stage"];
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
    <title>Add Customer</title>
</head>
<body>
    <div class="container" style="width:75%">

        <div >
            <form method="post" action="#">
                <h1>stage Details</h1>
                <div class="form-group">
                    <label>Stage Name:</label>
                    <input type="text" class="form-control" placeholder="Customer Name" name="stage" value="<?php echo $stage ?>" required>
                </div>
               
                <div class="form-group">
                    <label>Stage Description:</label>
                    <input type="text" class="form-control" placeholder="Customer Address" name="description" value="<?php echo $description ?>" required></input>
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
        $stage=$_POST['stage'];
        $description=$_POST['description'];
        $result = $mysql->query("update stages set stage = '$stage',description = '$description' where id = '$id'");
        if($result){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Data Updated")';  
            echo '</script>';  
            header("Location: index.php");
        }
    }
?>

