<?php
include "header.php";
include "includes/user.php";
include "includes/file.php";

$id = $_SESSION["id"];
$query = "SELECT login, email FROM user WHERE id = '$id'";
$result = $mysqli->query($query);
$row = $result->fetch_array();
$login = $row["login"];
$email = $row["email"];

$user = new User($id, $login, $email);

if(isset($_POST["delete"])){
    unlink("uploads/$login/{$_POST["file_name"]}");
}
if(isset($_POST["rename"])){
    rename("uploads/{$user->getLogin()}/{$_POST["old_file_name"]}", "uploads/{$user->getLogin()}/{$_POST["new_file_name"]}");
}
if(isset($_POST["file_submit"])){
    $target_dir = "uploads/$login/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $file_info = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    }
    else{
        $file_info = "Sorry, there was an error uploading your file.";
    }
}

$dir = opendir("uploads/$login");
while(!(($file = readdir($dir)) === false )){
    if($file != "." && $file != ".."){
        $files[] = new File($file, "uploads/{$user->getLogin()}/$file", filesize("uploads/{$user->getLogin()}/$file"));
    }
}
if(empty($files)){
    $table = "There are no files in your account";
}
else{
    $table = "<table class = 'table'><thead><tr><th>Download</th><th>Rename</th><th>Delete</th></thead>";
    foreach($files as $file){
        $table .= "<tr><td><a href = '".$file->getPath()."' download>".$file->getName()."</a></td><td><form action = '' method = 'POST'><input type = 'hidden' name = 'old_file_name' value = '{$file->getName()}'><input placeholder = '{$file->getName()}'name = 'new_file_name' type = 'text'> <button name = 'rename' type = 'submit'>Rename</button></form></td><td><form action = '' method = 'POST'><input type = 'hidden' name = 'file_name' value = '".$file->getName()."'><button name = 'delete' type = 'submit'>Delete</button></form></td></tr>";
       
    }
    $table .= " <tbody></table>";    
}    
 

?>

<!-- view -->

<div class="container">
    <h1>Hello <?php echo $user->getLogin(); ?></h1>
    <p>Start to manage your files</p>
    <form action="" method="post" enctype="multipart/form-data">
        <div class = "well">
            <p>Select file to upload:</p>
            <div class="form-group">    
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group">       
                <input type="submit" value="Upload Image" name="file_submit">
            </div>
        </div>
    </form>
    <?php 
        echo !empty($file_info)? "<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$file_info</div>" : ""; 
        echo $table;
    ?>  
    </div>


<?php
include "footer.php";
?>


