<?php
    //Connect DataBase
    include_once 'pdo.php';
    
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['user_id']);
    unset($_SESSION['error']);

    

    if(isset($_POST["cancel"])){
        header('Location: index.php');
        return;
    }

    $salt= 'XyZzy12*_';


    if(isset($_POST['submit'])){

        

        if(isset($_POST['email']) && isset($_POST['password'])) {
            $email= $_POST['email'];

        if( strlen($_POST['email']) < 1 ||  strlen($_POST['password']) < 1){
            $_SESSION['error'] = "email and password are required!";
            header("Location: login.php");
            return;
        }
        
        
        $check = hash('md5', $salt.$_POST['pass']);
        $stmt = $pdo->prepare('SELECT user_id, name FROM users
        WHERE email = :em AND password = :pw');
        $stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ( $row !== false ) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_id'] = $row['user_id'];
            // Redirect the browser to index.php
            header("Location: index.php");
            return;
        } else {
            $_SESSION['error'] = "password is incorrecte";
            $msg_error=true;
            header("Location: login.php");
            return;
        }

    }

    }

    

    

?>