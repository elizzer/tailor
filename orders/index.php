<?php
    require_once "../connect.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<?php
        $result = $mysql->query("select o.id,c.name as cname,e.name as ename,o.orderDate as ood,o.dueDate as odd,stage,qty,o.description as odes,cost from customers as c,stages as s,employees as e,orders as o where o.cid=c.id and o.sid=s.id and o.eid=e.id order by s.id desc ");
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
                            Customer
                        </th>
                        <th class="text-center">
                            Handler
                        </th>
                        <th class="text-center">
                            OrderDate
                        </th>
                        <th class="text-center">
                            DueDate
                        </th>
                        <th class="text-center">
                            Stage
                        </th>
                        <th class="text-center">
                            Qty
                        </th>
                        <th class="text-center">
                            Description
                        </th>
                        <th class="text-center">
                            Cost
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
                                <?php echo $row['cname']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['ename']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['ood']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['odd']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['stage']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['qty']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['odes']; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $row['cost']; ?>
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