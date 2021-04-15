<?php
    include_once 'header.php';
?>

<?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<div class='modal-bg'>
                <span class='err-modal'>Fill in all fields.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
            }
            else if($_GET["error"] == "wronglogin"){
                echo " <div class='modal-bg'>
                <span class='err-modal'>Invalid credentials.
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
            }
            else if($_GET["error"] == "none"){
                echo " <div class='modal-bg'>
                <span class='err-modal'>Loggin In...
                <button class='err-close'>X</button>
                </span>
                </div>
                ";
            }
        }
        ?>
  
    <section class="login-form-wrapper">

<div class="wrapper">
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <h2><i class="fa fa-user fa-3x"></i></h2>
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <h2>Login</h2>
        <form  action="includes/login.inc.php" method="POST">
          <p>
            <input type="text" name="uid" placeholder="Username/Email" autocomplete="off" >
          </p>
          <p>
            <input type="password" name="pwd" placeholder="Password" >
          </p>
          <p>
            <input class="btn" type="submit" name="submit" value="Log In " />
          </p>
          <p class="signup-link">
            <a href="./signup.php"><span>Or </span>Create an account.</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>

    </section>


    <script src="./js/errorHandler.js"></script>


<?php
    include_once 'footer.php';
?>

