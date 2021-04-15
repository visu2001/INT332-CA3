<?php
    ob_start();
    session_start();
    // define('MyConst', TRUE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="./images/round.png">
    <link rel="shortcut icon" href="./images/calendar.png" type="image/x-icon">
    <title>Visu Utkarsh</title>
</head>
<body>
<div class="nav">
    <div class="width-container">
  <input type="checkbox" id="nav-check">
  <div class="nav-header">
    <div class="nav-title">
      <a href="./index.php" style="text-decoration: none; color:beige;">HarshNoob</a> 
    </div>
  </div>
  <div class="nav-btn">
    <label for="nav-check">
      <span></span>
      <span></span>
      <span></span>
    </label>
  </div>
  
  <div class="nav-links">
    <a href="./index.php" >Home</a>
    <?php
         if(isset($_SESSION["useruid"])){
           echo "<a href='#'>".substr($_SESSION['useruid'],0,10)."</a>";
         } else{
            echo "<a href='./signup.php' >Signup</a>";
         }
    ?>
    
    <?php
         if(isset($_SESSION["useruid"])){
           echo "<a href='./includes/logout.inc.php'>Logout</a>";
         } else{
            echo "<a href='./login.php'>Login</a>";
         }
    ?>
   
    
  </div>
  </div>
</div>

    <div class="main-wrapper">
