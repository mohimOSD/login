<?php 
require_once('db.php');

$nameErr = $emailErr = $passwordErr = $addressErr = "";
$name = $email =  $password = $address = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $website = test_input($_POST["password"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }


  if(empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($addressErr) ){
    print_r($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (name, email, password, address)
    VALUES ('$name', '$email', '$password', '$address')";

    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: login.php"); 
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    
  
<div class="container">
  <main class="form-signin w-50 m-auto"> 

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <img class="mb-4" src="bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please Register Here</h1> 
     <?php if(!empty($errms)): ?>
         <div class="alert alert-danger" role="alert">
           <?php echo $errms; ?>
        </div>
        <?php endif; ?>
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
    <?php  if(!empty($nameErr)) { ?>
    <div  class="form-text text-danger"><?=$nameErr?></div>
     <?php } ?>
  </div>
  <div class="mb-3">
    <label  class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" >
    <?php  if(!empty($emailErr)) { ?>
    <div  class="form-text text-danger"><?=$emailErr?></div>
     <?php } ?>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
    <?php  if(!empty($passwordErr)) { ?>
    <div  class="form-text text-danger"><?=$passwordErr?></div>
     <?php } ?>
  </div>
  <div class="mb-3">
    <label  class="form-label">Address</label>
    <input type="text" class="form-control"  name="address">
    <?php  if(!empty($addressErr)) { ?>
    <div  class="form-text text-danger"><?=$addressErr?></div>
     <?php } ?>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
 </main>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>