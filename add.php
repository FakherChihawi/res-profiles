<?php
    //Connect DataBase
    include_once 'pdo.php';

    if(isset($_POST['submit'])){

        if(isset($_POST['submit'])){
            if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['headLine']) && isset($_POST['summary']) ) {
        $_SESSION['user_id']=1;
        $stmt = $pdo->prepare('INSERT INTO Profile
        (user_id, first_name, last_name, email, headline, summary)
        VALUES ( :uid, :fn, :ln, :em, :he, :su)');
        $stmt->execute(array(
            ':uid' => $_SESSION['user_id'],
            ':fn' => $_POST['first_name'],
            ':ln' => $_POST['last_name'],
            ':em' => $_POST['email'],
            ':he' => $_POST['headline'],
            ':su' => $_POST['summary'])
        );
    
    header("location:index.php");
    }
}
}
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
    <div class="container">
        <div class="jumbotron">
        <h1 class="title">Adding Profile for <?php echo $_SESSION['name']; ?></h1>
        <form action="add.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name: </label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name: </label>
                <input type="text" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="headLine">Headline</label>
                <input type="text" class="form-control" name="headLine" id="headLine">
            </div>
            <div class="form-group">
                <label for="headLine">Headline</label>
                <textarea class="form-control" name="summary" id="summary" cols="100" rows="6"></textarea>
            </div>
            <button type="submit"  name="submit" id="submit" onclick=" return doValidation()" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
    </div>
</body>
</html>