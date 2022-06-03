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
    <div class="container" style="width:75%">

        <div >
            <form method="post" action="process.php">
                <h1>Role Details</h1>
                <div class="form-group">
                    <label>Employee Name:</label>
                    <input type="text" class="form-control" placeholder="Customer Name" name="name" required>
                </div>
                <div class="form-group">
                    <label>Employee Phone Number:</label>
                    <input type="number" class="form-control" placeholder="Customer Name" name="phone" required>
                </div>
                <div class="form-group">
                    <label>Employee Role:</label>
                    <select class="form-control" name="role">
                    <?php
                   
                    if($result=$mysql->query("select * from roles"))
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
                    <label>Employee Salary:</label>
                    <input type="number" class="form-control" placeholder="Customer Name" name="salary" required>
                </div>
                <div class="form-group">
                    <label>Employee Date of join:</label>
                    <input type="date" class="form-control" placeholder="Customer Name" name="doj" required>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <textarea type="text" class="form-control" placeholder="Employee Address" name="address" required></textarea>
                </div>
                
                <div>
                    <input class="btn btn-primary" name="new" type="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>