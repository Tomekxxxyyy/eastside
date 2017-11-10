<?php
        
    if(isset($_POST["login_form"])){
        $login = $_POST["login"];
        $password = $_POST["password"];
               
        $query = "SELECT id FROM user WHERE login = '$login' AND password = '$password'";
        if(!$result = $mysqli->query($query)){
            die($mysqli->error);
        }
        if($result->num_rows > 0){
            $row = $result->fetch_array();
            $_SESSION["id"] = $row["id"];
            $login_info = "You have been successfully logged in: <a href = 'account.php'>YOUR ACCOUNT</a>";
          
        }
        else{
            $login_info = "Incorrect login or password";
        }
    }
?>

<!-- view -->

<div class="container">
  <div class = "well">Login form</div>  
  <form action = "" method = "POST">
  <div class="form-group">
    <label for="login">Login:</label>
    <input name = "login" type=text" class="form-control" id="login">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input name = "password" type="password" class="form-control" id="pwd">
  </div>
  <button name = "login_form" type="submit" class="btn btn-default">Submit</button>
</form>
<?php echo !empty($login_info)? "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$login_info</div>" : ""; ?>  
</div>