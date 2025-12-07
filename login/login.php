<?php 
require('db.php');
session_start();

$errms ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

     $sql = "SELECT * FROM users WHERE email='$email' ";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
        if($_POST['email'] == $row['email'] && $_POST['password'] == $row['password']){
           $_SESSION['login'] = true;
           header("Location: index.php"); 
        } else {
            $errms = 'Email or password not match';
        }
            
      } else {
       $errms = 'User Not Found';
      }

      mysqli_close($conn);

    
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
         <h1 class="h3 mb-3 fw-normal">Please sign in</h1> 
         <?php if(!empty($errms)): ?>
         <div class="alert alert-danger" role="alert">
           <?php echo $errms; ?>
        </div>
        <?php endif; ?>
         <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"> 
            <label for="floatingInput">Email address</label> </div> <div class="form-floating"> 
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"> 
                <label for="floatingPassword">Password</label> </div> <div class="form-check text-start my-3"> 
                    <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"> 
                    <label class="form-check-label" for="checkDefault">Remember me</label> 
        </div> 
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button> <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p> 
</form>
 </main>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>