<?php
include_once 'header.php'
?>

<section class="signup-form">
    <h2> Login! </h2>
    <div class="login-form-form">
        <form action="includes/login.inc.php" method="post"> 
            
            <input type="text" name="name" placeholder="Email/Username...">
            <input type="text" name="pwd" placeholder="Password...">
            <button type="submit" name="submit" >Login</button>

        </form>
    </div>
</section>

<?php
include_once 'footer.php'
?>
