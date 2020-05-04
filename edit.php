<?php
   //Connect DataBase
   include_once 'pdo.php';
   
   $id = $_SERVER['profile_id'];
   $id_user = $_SERVER['user_id'];
   //select the row from table
   $sql = "SELECT * FROM profile WHERE id=:id";
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array(':profile_id' => $profile_id));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if(isset($_POST['submit'])){
    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['headLine']) && isset($_POST['summary']) ) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $headLine = $_POST['headLine'];
        $summary = $_POST['summary'];

         //updating the table
         $sql = "UPDATE users SET profile_id=:profile_id, user_id=:user_id, first_name=:first_name, last_name=:last_name
         , email=:email, headLine=:headLine, summary=:summary WHERE profile_id=:profile_id";
         $query = $dbConn->prepare($sql);
                 
         $query->bindparam(':profile_id', $profile_id);
         $query->bindparam(':user_id', $user_id);
         $query->bindparam(':first_name', $first_name);
         $query->bindparam(':last_name', $last_name);
         $query->bindparam(':email', $email);
         $query->bindparam(':headLine', $headLine);
         $query->bindparam(':summary', $summary);
         $query->execute();
         
         // Alternative to above bindparam and execute
         // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                 
         //redirectig to the display page. In our case, it is index.php
         header("Location: index.php");
   }}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fakher Chihaoui</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <div class="conatiner">
            <div class="jumbotron">
            <h1 class="title">Adding Profile for <?php echo $_SESSION['name']; ?></h1>
            <form action="add.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name: </label>
                <input type="text" value="<?php $row['first_name'] ?>" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name: </label>
                <input type="text" value="<?php $row['last_name'] ?>" class="form-control" id="lastName" name="lastName">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" value="<?php $row['email'] ?>"  class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="headLine">Headline</label>
                <input type="text" value="<?php $row['headLine'] ?>"  class="form-control" name="headLine" id="headLine">
            </div>
            <div class="form-group">
                <label for="headLine">Headline</label>
                <textarea class="form-control" value="<?php $row['headLine'] ?>"  name="summary" id="summary" cols="100" rows="6"></textarea>
            </div>
            <button type="submit"  name="submit" id="submit" onclick=" return doValidation()" class="btn btn-primary">Submit</button>
        </form>
            </div>
        </div>
    </body>
</html>