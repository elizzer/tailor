<?php
    require_once "../connect.php"
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
            <form method="post" action="process.php">
                <h1>Role Details</h1>
                <div class="form-group">
                    <label>Select customer</label>
                    <select class="form-control" name="customer">
                    <?php
                   
                    if($result=$mysql->query("select * from customers"))
                    {
                        while($row=mysqli_fetch_row($result))
                        {
                            echo "<option value=$row[0]>$row[1]</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Handler</label>
                    <select class="form-control" name="handler">
                    <?php
                   
                    if($result=$mysql->query("select * from employees"))
                    {
                        while($row=mysqli_fetch_row($result))
                        {
                            echo "<option value=$row[0]>$row[1]</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Order Date</label>
                    <input type="date" class="form-control" placeholder="Customer Name" name="od" required>

                </div>
                <div class="form-group">
                    <label>Due Date</label>
                    <input type="date" class="form-control" placeholder="Customer Name" name="dueDate" required>
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input type="number" class="form-control" placeholder="Customer Name" name="qty" required>
                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="number" class="form-control" placeholder="Customer Name" name="cost" required>
                </div>
                <div class="form-group">
                    <label>Stage:</label>
                    <select class="form-control" name="stage">
                    <?php
                   
                    if($result=$mysql->query("select * from stages"))
                    {
                        while($row=mysqli_fetch_row($result))
                        {
                            echo "<option value=$row[0]>$row[1]</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
               
                <div class="form-group">
                    <label>Description:</label>
                    <textarea type="text" class="form-control" placeholder="Employee Address" name="description" required></textarea>
                </div>
                
                <div>
                    <input class="btn btn-primary" name="new" type="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
