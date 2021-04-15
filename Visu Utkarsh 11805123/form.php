<?php
 include_once 'header.php';
 include_once "./includes/formSubmit.inc.php";
?>

<link rel="stylesheet" href="./css/form.css">
<?php if(isset($_SESSION['useruid'])): ?>
<?php
if(isset($_SESSION['status'])){
    echo "<h3 class='success-msg'>".$_SESSION['status']."</h3>";
    unset($_SESSION['status']);
}
?>
   <form action="./includes/formSubmit.inc.php" method="POST">
  <!--  General -->
  <div class="form-group">
    <h2 class="heading">Booking & contact</h2>
    <div class="controls">
      <input type="text" id="name" class="floatLabel" name="name" required>
      <label for="name">Name</label>
    </div>
    <div class="controls">
      <input type="email" id="email" class="floatLabel" name="email" required>
      <label for="email">Email</label>
    </div>       
    
          <div class="controls">
           <input type="text" id="street" class="floatLabel" name="street" required>
           <label for="street">Street</label>
          </div>          
       
        
     
      <div class="grid">
        <div class="col-2-3">
          <div class="controls">
            <input type="text" id="city" class="floatLabel" name="city" required>
            <label for="city">City</label>
          </div>         
        </div>
        <div class="col-1-3">
          <div class="controls">
            <input type="number" id="post-code" class="floatLabel" name="post-code" required>
            <label for="post-code">Post Code</label>
          </div>         
        </div>
      </div>
      <div class="controls">
        <input type="text" id="country" class="floatLabel" name="country" required>
        <label for="country">Country</label>
      </div>
  </div>
  
            <button type="submit" value="Submit" name="submit" class="col-1-4">Submit</button>
      </div>  
  </div> <!-- /.form-group -->
</form>

<?php else: ?> 
    <?php header("location:./index.php"); ?>
<?php endif; ?>

<?php
 include_once 'footer.php';
?>