<?php 



?>


<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resources/css/udemy_design.css">
    <title>update-contactForm</title>
</head>
<body>
  <a href="index.php"> <h1  style ="color:black; margin: 5% auto 5% 2%;"> ks-fitness-world</h1> </a>
    <h2 style="font-weight:500;"> Edit Contact-Form</h2>
<form method="POST" action =""  autocomplete="on" class="contact-form" style="zoom:1.5;">
<?php
 include 'contact-form.php';

 $ids = $_GET['id'];
 $showquery = "select * from Contactform where id={$ids} ";
 $showdata = mysqli_query($con,$showquery);
 $arrdata = mysqli_fetch_array($showdata);

 $username = "root";
 $password = "";
 $server = "localhost";
 $db = "ks-fitness-world";
 
 $con = mysqli_connect($server,$username,$password,$db);

 if(isset($_POST['submit'])){

    $idupdate = $_GET['id'];

      $name = $_POST['name'];
       $email = $_POST['email'];
      $phone = $_POST['phone'];
      $refer = $_POST['Find-us'];
       $newsletter = $_POST['news'];
       $query = $_POST['msg'];
    //  $id = 1;   

   // $insertquery= " INSERT INTO `contact-form`(`ID`, `Name`, `Email`, `Phone`, `Refer`, `News letter`, `query`) VALUES ([$id],[$name],[$email],[$phone],[$refer],[$newsletter],[$query])";
  //  $insertquery = " insert into contact-form(Name,Email,Phone,Refer,News letter,query) values('$name' ,'$email' ,'$phone' ,'$refer' ,'$newsletter' ,'$query')";

   $query = " update Contactform set id=$idupdate, Name='$name', Email='$email', Phone='$phone', Refer='$refer', query='$query'where id=$idupdate";
   $result= mysqli_query($con,$query);
   header('location: display.php');

 }
 

?>

                        <div class="row">
                            <div class=" span-1-of-4">
                                <label> Name</label>
                            </div>
                            <div class="col">
                                <input type="text" name="name" value="<?php echo $arrdata['Name'] ?>" id="name" placeholder="Your name" required>
                            </div>

                         </div> 
                        <div class="row">
                            <div class=" span-1-of-4">
                                <label>Email</label>
                            </div>
                            <div class="col ">
                                <input type="Email" name="email" id="name" value="<?php echo $arrdata['Email'] ?>" placeholder="Your Email" required>
                            </div>

                        </div>
                         <div class="row">
                            <div class=" span-1-of-4">
                                <label>Phone</label>
                            </div>
                            <div class="col ">
                                <input type="text" name="phone" id="name" value="<?php echo $arrdata['Phone'] ?>" placeholder="Your Phone" required>
                            </div>

                       </div>
                        <div class="row">
                            <div class=" span-1-of-4">
                                <label> How did you Find us?</label>
                            </div>
                            <div class="col ">
                                <select name="Find-us" id="find-us" value ="<?php echo $arrdata['Refer'] ?>">
                                    <option value="Friends">Friends</option>
                                    <option value="Search">Search Engine</option>
                                    <option value="ad">Through an ad.</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="span-1-of-4">
                                <label>News letter? &nbsp; &nbsp; &nbsp; &nbsp; </label>
                            </div> 
                            <div class="col ">
                                <input type="checkbox" name="news" id="news" checked> Yes,please
                            </div>

                       </div>
                        <div class="row">
                            <div class="span-1-of-4">
                                <label>Any Query?</label>
                            </div>
                            <div class="col ">
                                <textarea name="msg" placeholder="your message" value="<?php echo $arrdata['query'] ?>"></textarea>
                            </div>

                        </div>
                        <div class="row">
                            <div class="span-1-of-4">
                                <label> &nbsp; </label>
                            </div> 
                            <div class="col ">
                                <input type="submit" value="Update" name="submit">
                            </div>

                        </div>
                    </form>
</body>
</html>