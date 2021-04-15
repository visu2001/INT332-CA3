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
                </div>";
            }
            else if($_GET["error"] == "invaliduid"){
                echo "<div class='modal-bg'>
                <span class='err-modal'>Username can be letters and numbers only.
                <button class='err-close'>X</button>
                </span>
                </div>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo "<div class='modal-bg'>
                <span class='err-modal'>Choose a proper email.
                <button class='err-close'>X</button>
                </span>
                </div>";
            }
            else if($_GET["error"] == "shortpassword"){
                echo "<div class='modal-bg'>
                <span class='err-modal'>Password should be atleast 8 characters and must include an uppercase, a number and a special character.
                <button class='err-close'>X</button>
                </span>
                </div>";
            }
            else if($_GET["error"] == "unmatchedpasswords"){
                echo "<div class='modal-bg'>
                <span class='err-modal'>Passwords don't match.
                <button class='err-close'>X</button>
                </span>
                </div>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo "<div class='modal-bg'>
                <span class='err-modal'>Something went wrong, try again!
                <button class='err-close'>X</button>
                </span>
                </div>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo "<div class='modal-bg'>
                <span class='err-modal'>Username already exists
                <button class='err-close'>X</button>
                </span>
                </div>";
            }
            else if($_GET["error"] == "none"){
                echo "<div class='modal-bg'>
                <span class='err-modal success-msg'>Signed up Successfully. Login to continue.
                <button class='err-close'>X</button>
                </span>
                </div>";
            }
           
        }
    ?>

    <section class="signup-form-wrapper">

<div class="wrapper">
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <h2><i class="fa fa-user-plus fa-3x"></i></h2>
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <h2>Signup</h2>
        <form action="includes/signup.inc.php" method="POST">
          <p>
            <input type="text" name="name" placeholder="Enter full name" autocomplete="off">
          </p>
          <p>
            <input type="text" name="email" placeholder="Enter email" autocomplete="off">
          </p>
          <p>
            <input type="text" name="uid" placeholder="Enter username" autocomplete="off">
          </p>
          <p>
            <input type="password" name="pwd" placeholder="Enter password">
          </p>
          <p>
            <input type="password" name="pwdrepeat" placeholder="Confirm password">
          </p>
          <p>
            <input class="btn" type="submit" name="submit" value="Sign up" />
          </p>
          <p class="signup-link">
            <a href="./login.php"><span>Or </span>Login.</a>
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
