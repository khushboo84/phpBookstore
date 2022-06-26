<?php 
  $connect = mysqli_connect('localhost', 'root');
  mysqli_select_db($connect, 'bookstore');
  $sql="SELECT * FROM books";
  $featured = $connect->query($sql);
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
<div class="body">
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


<div class="col-md-12">
  <div class = "row">
    <h2 class="text-center">Top Books</h2><br><br>
    <?php
      while($books=mysqli_fetch_assoc($featured)):
      ?>
    
      <div class="col-sm-3" style="margin-top:60px;">
        <h4><?=$books['bookName'];?></h4>
        <img src="<?=$books['bookImage'];?>" alt="<?=$books['bookName'];?>"/>
        <p class='bprice'> CAD <?=$books['bookPrice'];?></p>
        <a href="checkout.php?bookID=<?php echo $books['bookID'];?>">
          <button type="button" class="btn btn-success" data-toggle="modal">Buy Now</button>
      </a>
      </div>
    
    <?php endwhile; ?>
  </div>
 </div>
</div>
</body>
</html>
