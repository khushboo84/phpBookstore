<?php 
  $connect = mysqli_connect('localhost', 'root');
  mysqli_select_db($connect, 'bookstore');
  $sql="SELECT * FROM books WHERE featured= 1";
  $featured = $connect->query($sql);
?>



<div class="col-md-8">
  <div class = "row">
    <h2 class="text-center">Book Details</h2><br><br>
    <?php
      while($books=mysqli_fetch_assoc($featured)):
      ?>
      <div class="col-md-5">
        <h4><?=$books['bookName'];?></h4>
        <img src="<?=$books['bookImage'];?>" alt="<?=$books['bookName'];?>"/>
        <p class='bprice'> CAD <?=$books['bookPrice'];?></p>
        <p class='bauthor'> Written by <?=$books['authorName'];?></p>
        <p class='bdesc'><?=$books['bookDescription'];?></p>
        <a href="details.php">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-1">More</button>
      </a>
      </div>
    <?php endwhile; ?>
  </div>
 </div>