<?php 
  define('__CONFIG__', true);
  require_once "inc/config.php" ;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3 p-3 border" >
  <?php
     echo "Hello World: Today is ";
     echo date("Y-m-d");
  ?>

</div>
<div class="container">
  <a href="/login.php">login</a>
  <a href="/register.php">register</a>
</div>
<?php 
  require_once "inc/footer.php" ;
?>



</body>
</html> 