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
                    <label>Role Name:</label>
                    <input type="text" class="form-control" placeholder="Customer Name" name="role" required>
                </div>
               
                <div class="form-group">
                    <label>Role Description:</label>
                    <textarea type="text" class="form-control" placeholder="Customer Address" name="description" required></textarea>
                </div>
                
                <div>
                    <input class="btn btn-primary" name="new" type="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
