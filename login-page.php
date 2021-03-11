<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login.page</title>
            <link rel="stylesheet" type="text/css" href="resources/css/login-page_design.css">
            <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" type="text/css" href="resources/css/User-queries.css">
    </head>
    <body>
        <div class="overlay">
           
            <form action="" method="POST" autocomplete="on" class="box" <?php echo htmlentities( $_SERVER['PHP_SELF']); ?> >
                <h1 class="heading">Login</h1>
                <input class="type" type="text" name="username" placeholder="Phone" required>
                <input class="type" type="password" name="password" placeholder="Password" required>
                <input class="type-2" type="submit" name="submit" placeholder="Login"></a>
            </form>
          <div class="forgot-password"> <p> <a href="#">forgot password?</a> </p> <a href="sign-up.php"><p>New? Sign-up. </a></p> </div>
          
          </div>
    </body>
</html>

<?php


include 'contact-form.php';


 if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $email_search = " SELECT * FROM `Registrations` WHERE Phone_number = '$username' ";
   $query = mysqli_query($con , $email_search);

  $email_count = mysqli_num_rows($query);
  

   if($email_count != 0){

    $email_pass = mysqli_fetch_assoc($query);
    $db_pass = $email_pass['Password'];
    $pass_decode = password_verify($password, $db_pass);

     if($pass_decode){
    ?>
    <script> alert('Login successful'); </script>
    <?php
    }else{
    ?>
    <script> alert('Incorrect password'); </script>
    <?php
    }
   }else{
       ?>
        <script> alert('Incorrect phone'); </script>
       <?php
   }
 }

?>



