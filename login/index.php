<?php 
session_start();

if(!$_SESSION['login']){
     header("Location: login.php"); 
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

<div class="container"> <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"> <svg class="bi me-2" width="40" height="32" aria-hidden="true"><use xlink:href="#bootstrap"></use></svg> <span class="fs-4">Simple header</span> </a> <ul class="nav nav-pills"> <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li> <li class="nav-item"><a href="#" class="nav-link">Features</a></li> <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li> <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li> <li class="nav-item"><a href="#" class="nav-link">About</a></li> 

<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
</ul> </header> </div>


<div class="px-4 py-5 my-5 text-center"> <img class="d-block mx-auto mb-4" src="bootstrap-logo.svg" alt="" width="72" height="57"> <h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1> <div class="col-lg-6 mx-auto"> <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> <div class="d-grid gap-2 d-sm-flex justify-content-sm-center"> <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button> <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button> </div> </div> </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>