<?php
    
    $connect = mysqli_connect('localhost', 'root');
    mysqli_select_db($connect, 'bookstore');

    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_SESSION['bookID'])) {


            //$sql = "SELECT `product_quantity` FROM `products` WHERE id = '".$_SESSION['product_id']."';";
            $sql = "SELECT bookQuantity FROM bookstoreinventory bi JOIN books bo ON bi.bookID = bo.bookID WHERE bi.bookID = '".$_SESSION['bookID']."';";
            $data = $connect->query($sql);

            $data = $data->fetch_assoc();

            $quantity = $data['bookQuantity'] - 1;

            $sql = "UPDATE bookstoreinventory SET `bookQuantity` = '".$quantity."' WHERE bookID = '".$_SESSION['bookID']."';";
            $data = $connect->query($sql);    

            header("Location: http://localhost/Webapps/Exercises/Project1/");
            exit();

        } else {
            echo '123';
        }

    }

?>