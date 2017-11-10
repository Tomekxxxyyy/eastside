<?php
    
    function registerValidator($login, $email, $password, $mysqli){
        
        $lower_case = preg_match("/[a-z]/", $password);
        $upper_case = preg_match("/[A-Z]/", $password);
        $digit = preg_match("/\d/", $password);
        $special_char = preg_match('/[^a-zA-Z\d]/', $password);
        
        $query = "SELECT * FROM user WHERE login = '$login'";
        $result = $mysqli->query($query);
        $num_rows = $result->num_rows;
        
        if(trim($login) == "" || trim($email) == "" || trim($password) == ""){
            return "All fields are required";
        }
        else if($num_rows > 0){
            return "Login is already in use";
        }
        else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            return "Email is not a valid email address";
        }
        else if(strlen($password) < 6){
            return "The password must be at least 6 characters long";
        }
        else if($lower_case + $upper_case + $digit + $special_char < 2){
            return "At least two of the following criteria must be fulfilled in the password: lower case letters, upper case letters, numbers, special characters.";
        }
        else{
            return "";
        }
    }
        
    if(isset($_POST["register_form"])){
        $login = $_POST["login"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $register_info = registerValidator($login, $email, $password, $mysqli);
        
        if($register_info == ""){
                     
            $query = "INSERT INTO user VALUES (NULL, '$login', '$email', '$password')";
            if($mysqli->query($query) == true){
                $register_info = "Your account has been created successfully";
            }else{
                die("Data insert failed: " . $mysqli->connect_error);
            }
            mkdir("uploads/$login");
        }
    }
?>

<!-- view -->

<div class="container">
  <div class = "well">Register form</div>  
  <form action = "" method = "POST">
  <div class="form-group">
    <label for="login">Login:</label>
    <input name = "login" type="text" class="form-control" id="login">
  </div>
  <div class="form-group">
    <label for="login">Email:</label>
    <input name = "email" type="text" class="form-control" id="login">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input name = "password" type="password" class="form-control" id="pwd">
  </div>
  <button name = "register_form" type="submit" class="btn btn-default">Submit</button>
</form>
<?php echo !empty($register_info)? "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$register_info</div>" : ""; ?>  
</div>