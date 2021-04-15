<?php
 include_once 'header.php';
?>
    
 <?php if(isset($_SESSION['useruid'])): ?>

    <?php
      if(isset($_SESSION["username"])){
        echo "<h2 class='welcome-msg'>Welcome ". $_SESSION['username']."</h2>";
    }
    ?>

    <section class="main-index">

        <div class="buttons-container">
        <a href="form.php"> <i class="fa fa-address-book fa-3x"></i> <br><br> Book</a>
        <a href="./preference.php"><i class="fa fa-user fa-3x"></i> <br><br> Check</a>
        </div>

    </section>


<?php else: ?> 

    <div class="err">
    <h1>Please login to proceed.</h1>
    <img src="./images/warning.gif" alt="404" style="height: 200px; width:200px;">
    </div>
   
<?php endif; ?>   
   <?php
    include_once 'footer.php';
    ?>
    