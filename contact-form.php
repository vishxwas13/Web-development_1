<?php

$username = "root";
$password = "";
$server = "localhost";
$db = "ks-fitness-world";

$con = mysqli_connect($server,$username,$password,$db);
if($con){
   // echo"connection successful";
?>
<script>
    alert('connection successful vishxwas!');
    </script>
<?php
}
 else{ echo"connection failed"; }
?>












