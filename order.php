<?php
    
    $connect = mysqli_connect('localhost', 'root');
    mysqli_select_db($connect, 'bookstore');

    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $allErrors= [];
        
            if(!empty($firstname)){
                $firstname = filter_var(trim($firstname),FILTER_SANITIZE_STRING);
            }
            else{
                $allErrors[] = "Please enter firstname";
            }
        
            if(!empty($lastname)){
                $lastname = filter_var(trim($lastname),FILTER_SANITIZE_STRING);
            }
            else{
                $allErrors[] = "Please enter lastname";
            }
        
            if(!empty($email)){
                $email = filter_var(trim($email),FILTER_SANITIZE_STRING);
            }
            else{
                $allErrors[] = "Please enter email";
            }

            if(!empty($phone)){
                $email = filter_var(trim($phone),FILTER_SANITIZE_STRING);
            }
            else{
                $allErrors[] = "Please enter phone";
            }
        
            if(!empty($allErrors)){
                foreach($allErrors as $error){
                    echo " <p>$error";
                }
            }
            
            else if(empty($allErrors)){

                if (isset($_SESSION['bookID'])) {

                    $sql = "SELECT bookQuantity FROM bookstoreinventory bi JOIN books bo ON bi.bookID = bo.bookID WHERE bi.bookID = '".$_SESSION['bookID']."';";
                    $data = $connect->query($sql);
        
                    $data = $data->fetch_assoc();
        
                    $quantity = $data['bookQuantity'] - 1;
        
                    $sql = "UPDATE bookstoreinventory SET `bookQuantity` = '".$quantity."' WHERE bookID = '".$_SESSION['bookID']."';";
                    $data = $connect->query($sql);    
        
                    $sql = "SELECT * FROM books WHERE bookID = '".$_SESSION['bookID']."';";
                    $books = $connect->query($sql);
        
                    $books = $books->fetch_assoc();
        
                    $sql = "INSERT INTO `orders`(`bookID`, `bookName`, `price`) VALUES ('{$_SESSION['bookID']}','{$books['bookName']}','{$books['bookPrice']}')";
                    $data = $connect->query($sql);  
        
                    echo "Order placed successfully. Thank you for your visit.";
               
            }
            
                
            
                
            }
        }
    

?>