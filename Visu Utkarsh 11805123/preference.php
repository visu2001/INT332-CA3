<?php
 include_once 'header.php';
 include_once "./includes/formSubmit.inc.php";
?>

<link rel="stylesheet" href="./css/form.css">
<?php if(isset($_SESSION['useruid'])): ?>


    <?php if(empty($user_bookings)): ?>
    <div class="bookings-msg">
        <h1>You have not done any bookings yet.</h1>
        <img src="./images/empty-posts.png" alt="empty-error" style="height:200px; width:200px;"> 
    </div>
<?php else: ?>
    <div class="table-responsive">
    <table class="blueTable">
        <thead>
            <tr>
                <th>Booking no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Street</th>
                <th>City</th>
                <th>Pin</th>
                <th>Country</th>
            </tr>
        </thead>
    <?php foreach($user_bookings as $key=>$booking):?>
        <tbody>
            <tr>
                <td><?php echo $booking['id'];?></td>
                <td><?php echo $booking['name'];?></td>
                <td><?php echo $booking['email'];?></td>
                <td><?php echo $booking['street'];?></td>
                <td><?php echo $booking['city'];?></td>
                <td><?php echo $booking['post-code'];?></td>
                <td><?php echo $booking['country'];?></td>
            </tr>
        </tbody>
    <?php endforeach; ?>
    </table>
    </div>
<?php endif; ?>




<?php else: ?> 
    <?php header("location:./index.php"); ?>
<?php endif; ?>

<?php
 include_once 'footer.php';
?>