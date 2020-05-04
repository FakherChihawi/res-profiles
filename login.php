<?php
    //Connect DataBase
    include_once 'pdo.php';
    
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['user_id']);

    

    if(isset($_POST["cancel"])){
        header('Location: index.php');
        return;
    }

    $salt= 'XyZzy12*_';


    if(isset($_POST['submit'])){

        

        if(isset($_POST['email']) && isset($_POST['password'])) {
            if( strlen($_POST['email']) < 1 ||  strlen($_POST['password']) < 1){
                $_SESSION['error'] = "email and password are required!";
                header("Location: login.php");
                return;
            }
        
        
        $check = hash('md5', $salt.$_POST['pass']);
        $stmt = $pdo->prepare('SELECT user_id, name FROM users
        WHERE email = :em AND password = :pw');
        $stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check));
        $rowuser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $rowuser !== false ) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_id'] = $row['user_id'];
            // Redirect the browser to index.php
            header("Location: index.php");
            return;
        } 
        if ( $rowuser === false ){
            $_SESSION['error'] = "password is incorrecte";
            header("Location: login.php");
            return;
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
        <h1 class="title">Please Log In</h1>
        <?php if( isset($_SESSION['error'])):?>
            <div class="alert alert-danger">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>    
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email </label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" name="submit" onclick=" return doValidation()" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-Success" name="cancel">cancel</button>
        </form>
        </div>
    </div>

    <!-- JS -->
    <script>
        function doValidation() {
            console.log("validation..");
            try{
                email = document.getElementById("email").value;
                password = document.getElementById("password").value;
                console.log("validation: email: "+ email+" password: " + password);
                
                if(email == null || email =="" || password == null || password==""){
                    alert("Both fields must be filled out!");
                    return false;
                }
                if(email.indexOf('@') == -1   ){
                    alert("enter your password correctely!");
                    return false;
                }
                return true;

                
            } catch(e){
                return false;
            }
            return false;
        }
    </script>
</body>
</html>