<?php
$connect = mysqli_connect('localhost', 'root');
mysqli_select_db($connect, 'bookstore');
session_start();
$_SESSION['bookID'] = $_GET['bookID'];
$sql="SELECT * FROM books WHERE bookID = '".$_SESSION['bookID']."'";
$data = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ecommerce-Project1</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href ="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<div class="body" style="background-color:#89cff0;">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">BookWorm</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mb-2 mb-lg-2">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bookstore.php">BookStore</a>
      </li>
     
    </ul>
  </div>
</nav>
<h3> Order Details</h3>
<?php
$data = $data->fetch_assoc();
?>
<div class="order" style="margin-left:40%; margin-top:20px; margin-bottom:20px;">
<h2><?=$data['bookName'];?></h2>
<img src="<?=$data['bookImage'];?>"/>
<h4><?=$data['authorName'];?></h4>
<h4>CAD <?=$data['bookPrice'];?></h4>
</div>

<form style="margin-top: 50px; margin-left:30px;" action="order.php" method="post">
  <div class="form-group row">
    <label for="firstName" class="col-sm-2 col-form-label">First Name:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" placeholder="first name">
    </div>
  </div>
  <div class="form-group row">
    <label for="lastName" class="col-sm-2 col-form-label">Last Name:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control"  placeholder="last name">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Payment Method: </legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
           Credit Card
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Debit Card
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
            UPI
          </label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-success" data-toggle="modal">Buy</button><br><br><br><br>
    </div>
  </div>
</form>
</body>
</html>