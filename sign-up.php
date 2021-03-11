<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign-up.page</title>
        <link rel="stylesheet" type="text/css" href="resources/css/sign-up_design.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="resources/css/User-queries.css">

    </head>
    <body>
        
        
        <div class="overlay">
            <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" autocomplete="on" class="box box2">
                <h1 class="heading h2">Sign-up</h1>
                    <input type="text" class="type" name="first-name" placeholder="First-Name" required>
                    <input type="text" class="type" name="last-name" placeholder="Last-Name" required>
                    <input type="number" class="type" name="phone" placeholder="Phone-Number" required>
                    <input type="email" class="type" name="email" placeholder="E-mail" required>
                    <input type="password" class="type" id="password" name="create-password" placeholder="Create-Passsword" required>
                    <input type="password" class="type" id="confirm_password" name="confirm-password" placeholder="Confirm-Password" required>
                    <input type="submit" class="type-2" name="submit" value="Sign-up">  
                    <script>
                        var password = document.getElementById("password")
                        , confirm_password = document.getElementById("confirm_password");

                        function validatePassword(){
                         if(password.value != confirm_password.value) {
                         confirm_password.setCustomValidity("Passwords Don't Match");
                         } else {
                         confirm_password.setCustomValidity("");
                         }
                        }

                        password.onchange = validatePassword;
                        confirm_password.onkeyup = validatePassword;


                     </script>             
            </form>
            <div class="user-login"> <a href="login-page.php"><p>Already a user? login </a></p> <a href="index.php"><p>Home-page </a></p></div> 
            
        </div>
    </body>
</html>

<?php

// include 'contact-form.php';

$username = "root";
$password = "";
$server = "localhost";
$db = "ks-fitness-world";

$con = mysqli_connect($server,$username,$password,$db);

 if(isset($_POST['submit'])){
   $first_name = mysqli_real_escape_string($con,$_POST['first-name']);
    $last_name = mysqli_real_escape_string($con,$_POST['last-name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $create_password = mysqli_real_escape_string($con,$_POST['create-password']);
    $confirm_password = mysqli_real_escape_string($con,$_POST['confirm-password']);

    $encrypted_pass = password_hash($create_password , PASSWORD_BCRYPT);
    $encrypted_cpass = password_hash($confirm_password , PASSWORD_BCRYPT);
     
    $email_query = " SELECT * FROM `Registrations` WHERE Phone_number = '$phone' ";
    $query = mysqli_query($con , $email_query);
    $emailcount = mysqli_num_rows($query);
    if($emailcount != 0 ){
        echo "Phone already registered";
    }else{

   $insertquery = " INSERT INTO `Registrations`(`First_name`, `Last_name`, `Phone_number`, `Email`, `Password`) VALUES ('$first_name','$last_name', '$phone', ' $email' , '$encrypted_pass')  ";
   $result = mysqli_query($con,$insertquery);
   
    if($result){
        ?>
        <script> alert('Thanks for your registration! ');</script>
        <?php
        
    }else{
        ?>
        <script> alert('sorry something went wrong!'); </script>
        <?php
    }

    }
}

?>