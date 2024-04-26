<?php 

// including header file

include "../templates/Header.php";

// including autoload file

include "../autoload/autoload2.php";

$dataPost = new DataPost();


?>

<?php 
if(isset($_POST['bookTable'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $user_Id = $_SESSION['userId'];

    if($date > date("n/j/y")){
        $dataPost->bookTable($firstName, $lastName, $date, $time, $phone, $message, $user_Id);
   
        echo "<script>alert('You have booked a table successfully');
        window.location.href = 'http://localhost/coffee-blend/';
        </script>";
   
    } else {
        
        header("location: http://localhost/coffee-blend/");
        exit();
    }
     
}

?>

<?php 

// including footer file

include "../templates/Footer.php";

?>