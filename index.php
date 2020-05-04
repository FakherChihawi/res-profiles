<?php
    //Connect DataBase
    include_once 'pdo.php';

    $id = $_SESSION['user_id'];
    $stmt = $pdo->prepare('SELECT * FROM profile WHERE user_id = $id ');
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fakher Chihaoui</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center">
        <div class="jumbotron">
        <h1 class="title">
        Chuck Severance's Resume Registry
        </h1>
        <?php if( !isset($_SESSION['user_id'])): ?>
        <a class="btn btn-secondary" href="login.php">Please log in</a>
        <?php else: ?>
            <a class="btn btn-secondary" href="logout.php">log out</a>
            <?php if( isset($rows)): ?>
            <table>
                <th>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Headline</td>
                    <td>Sammry</td>
                </th>
                <?php foreach($rows as $row): ?>
                    <td> <?php echo $row[2] ?> </td>
                    <td> <?php echo $row[3] ?> </td>
                    <td> <?php echo $row[5] ?> </td>
                    <td> <?php echo $row[6] ?> </td>
                <?php endforeach; ?>
            </table>
            <?php endif ?>
        <?php endif; ?>   
        <p>Note: Your implementation should retain data across multiple logout/login sessions. This sample implementation clears all its data periodically - which you should not do in your implementation.</p>
    
        </div>
    </div>
</body>
</html>