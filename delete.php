<?php
    //Connect DataBase
    include_once 'pdo.php';
    $id = $_SESSION['user_id'];
 
//deleting the row from table
$sql = "DELETE FROM users WHERE profile_id=:id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $id));
 
header("Location:index.php");

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
            <div class="alert alert-success">
            yor profile deleting is success
            </div>
            <a href="" class="btn btn-success">Back</a>
        </div>
    </div>
</body>
</html>