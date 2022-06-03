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
    <title>Document</title>
</head>
<body>
    <?php
        $result = $mysql->query("select * from customers");
    ?>
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
    <div class="container text-center">
        <a href="new.php">
            <div class="btn">+ Add</div>
        </a>
    </div>
    <hr>
    <div class="container">
        <div class="row justify-content-center container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">
                            Id
                        </th>
                        <th class="text-center">
                            Name
                        </th>
                        <th class="text-center">
                            Phone
                        </th>
                        <th class="text-center">
                            Address
                        </th>
                        <th class="text-center">
                            Edit or Delete
                        </th>
                    </tr>
                </thead>
                <?php
                    while($row=$result->fetch_assoc()):?>
                        <tr>
                            <td class="text-center" >
                                <?php echo $row['id']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['name']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['phone']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['address']; ?>
                            </td>
                            <td class="text-center">
                                <a href="update.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
                                <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                
                <?php endwhile;?>
            </table>
        </div>
    </div>
</body>
</html>