<?php
include "header.php";
?>

<div class="container">
  <h1>Hello</h1>
  <p>Welcome to our site</p>
</div>

<?php
if(isset($_GET["login"])){
    include "includes/login.php";
}
if(isset($_GET["register"])){
    include "includes/register.php";
}

include "footer.php";
?>
        
    
