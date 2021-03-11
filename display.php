<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display-admin</title>
    <link rel="stylesheet" type="text/css" href="resources/css/udemy_design.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,300italic' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    html{
        width: 100%;
        height: auto;
    }
    *{
        margin: 0;
        padding : 0;
        box-sizing: border-box;
    }
    .main-div{
       width: 100%;
       height: auto;
       
       display: flex;
       flex-direction:column;
       justify-content: center;
       align-items: center;
    }
    h1{
        color: black;
        
        margin: 5% auto  0%;
    }
    h1:hover{
        border-bottom: 1px solid black;
    }
    h2{
        font-size : 150%;
        font-family: 'lato' , sans-serif;
        margin-top : 5%;

    }
    .center-div{
        width: 100%;
        height: 80vh;
        padding: 20px 0 0 0;
        box-shadow: 0 10px 20px 0 rgba(0,0,0,0.03);
        border-radius: 10px;
         background-color:  #e67e22; 
    }
    table{
        border-collapse : collapse;
        background-color: white;
        box-shadow: 0 10px 15px  rgba(148, 142, 142, 0.95);
        border-radius: 10px;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
        
    }

  

    th,td{
        border: 2px solid #f2f2f2 ;
        padding: 8px 30px ;
        text-align: center ;
        color : black ;
        font-family: 'lato' , sans-serif;
    }
    th{
        text-transform: uppercase ;
        font-weight : 550;
    }
    td{
        font-size: 15px;
        color: rgb(61, 59, 59);
    }
     @media 
only screen and (max-width: 760px),
(min-device-width: 320px) and (max-device-width: 1024px)  {

	/* td { 
		
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		
		position: absolute;
		
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
    } */
    
   table{
       table-layout: unset;
       background-color: #e67e22 ;
       font-weight: bolder;
   }
   .center-div{
    height: 0%;
    background-color: white;
   }
   th,td{
    border: 2px solid wheat ;
   }
   h2{
       margin: 6% auto 0%;
   }
   .main-div{
    height: auto;
    margin-top: 10%;
   }
   h1{
    margin: -9% -40% 5% 1%;
   }

} 

    </style>
</head>
<body>
<div class="main-div">
<a href="index.php"><h1> KS Fitness World</h1></a>
    <h2> Contact-form all queries only for <mark style =
     "background-color : #e67d229f; ">  Admins  </mark> </h2>
     <div class="center-div">

       <table>
    <thead> 
        <tr>
        <th> ID </th>
        <th> Name </th>
        <th> Email </th>
        <th> Phone </th>
        <th> Refer </th>
        <th> Query </th>
        <th colspan="2">operations</th>
        </tr>
     </thead>
        <tbody>

        <?php 

include 'contact-form.php' ;

$selectquery = " select * from Contactform" ;
$query = mysqli_query($con , $selectquery);
$nums = mysqli_num_rows($query);
while($result = mysqli_fetch_array($query)){
    ?>
    <tr>
    <td> <?php echo $result['id'] ?></td>
    <td> <?php echo $result['Name'] ?></td>
    <td> <?php echo $result['Email'] ?></td>
    <td> <?php echo $result['Phone'] ?></td>
    <td> <?php echo $result['Refer'] ?></td>
    <td> <?php echo $result['query'] ?></td>
    <td> &nbsp; <a href="updates.php?id=<?php echo $result['id'] ?>"> <abbr title="UPDATE">  <i class="fa fa-wrench" aria-hidden="true"></i> </td></a> </abbr>
    <td> &nbsp; <a href="deletes.php?id=<?php echo $result['id'] ?>"> <abbr title="DELETE">  <i class="fa fa-trash" aria-hidden="true"></i> </td></a> </abbr> 
    
    
    </tr>

<?php
    
}



?>


         
        </tbody>
       </table> 

    </div>
    </div>
</body>
</html>