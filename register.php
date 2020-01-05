<?php
// Include config file
require_once "sql_connect.php";

// Define variables and initialize with empty values
$namer = $passwordr = $confirm_passwordr = "";
$name_errr = $password_errr = $confirm_password_errr = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    if(empty(trim($_POST["namer"]))){
        $name_errr = "Please enter a name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE name = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = trim($_POST["namer"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $name_errr = "This name is already taken.";
                } else{
                    $namer = trim($_POST["namer"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["passwordr"]))){
        $password_errr = "Please enter a password.";     
    } elseif(strlen(trim($_POST["passwordr"])) < 6){
        $password_errr = "Password must have atleast 6 characters.";
    } else{
        $passwordr = trim($_POST["passwordr"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_passwordr"]))){
        $confirm_password_errr = "Please confirm password.";     
    } else{
        $confirm_passwordr = trim($_POST["confirm_passwordr"]);
        if(empty($password_errr) && ($passwordr != $confirm_passwordr)){
            $confirm_password_errr = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_errr) && empty($password_errr) && empty($confirm_password_errr)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_password);
            
            // Set parameters
            $param_name = $namer;
            $param_password = password_hash($passwordr, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<title>Modal Popup Box</title>
<style>
*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size:16px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
    font-size:20px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
    height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
    display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 10% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
    padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
</style>
<body background="../background1.png">


<div id="modal-wrapper-r" class="modal">
  
  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper-r').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <h1 style="text-align:center">REGISTER</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Enter name" name="name" value="<?php echo $namer; ?>">
      <input type="password" placeholder="Enter Password" name="password" value="<?php echo $passwordr?>"> 
      <input type="text" placeholder="confirm password" name="confirm_password" value="<?php echo $confirm_passwordr?>">  
      <button type="submit" method="post" action="$_php">Login</button>
       
    </div>
    
  </form>
  
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal-r = document.getElementById('modal-wrapper-r');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
