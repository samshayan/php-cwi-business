<!------------------------------------------------------------------------------
  Modification Log
  Date           Name            Description
  ----------    -------------   -----------------------------------------------
  9-13-2019      Sam Shayan     Added add_visitor function to add visitors 
  ----------------------------------------------------------------------------->
<?php
// Getting the data from the form with assigning a var
$fName = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$reason = filter_input(INPUT_POST, 'reason');

$comments = filter_input(INPUT_POST, 'Message');
// preventing the special html characters and also allowing newline on the comment section
$comments = htmlspecialchars($comments);
$comments = nl2br($comments);


// Setting an error message if the information entered are inadequate
if (
    $fName == null || $email == null ||
    $phone == null || $reason == null || $comments == null
) {
    $error = "Invalid input data. Check all fields and try again.";

    echo "Form Data Error: " . $error;
    exit();
} else {

    // Connect to db
    // try {
    //     require './model/database.php';
    //     require './model/function.php';
    // } catch (PDOException $e) {
    //     echo 'Connection error: ' . $e->getMessage();
    //     exit();
    // }

    //$error_message = false;
    require_once "model/database.php";
    require_once "model/function.php";
    // $db = new Database;
    // $dbname = $db->getDB();

    // include "model/database.php";
    // include "model/function.php";
    // if (!is_object($db)) {
    //     $message = "We are experiencing technical difficulties. Please check back later.";
    // } else {
    //     $fName = add_visitor($fName, $email, $phone, $reason, $comments);
    //     if ($fName == 1) {
    //         $message = "Unable to add to database. Please check back later.";
    //     } else {
    //         $message = "Thank you, $fName, for contacting me! I will get back to you shortly.";
    //     }
    // }
    if (isset($db)) {
        $fName = add_visitor($fName, $email, $phone, $reason, $comments);
        if ($fName == 1) {
            $message = "Unable to add to database. Please check back later.";
        } else {
            $message = "Thank you, $fName , for contacting us, we will get back to you shortly.";
        }
       
    } else {
        $message = "We are experiencing technical difficulties. Please check back later.";
       
    }
    // adding function to add visitors through submitting form
    //add_visitor($fName, $email, $phone, $reason, $comments);
}

?>

<!DOCTYPE html>
<html>

<!--
Thank you page after submitting the form
-->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="personal business page" />
    <meta name="author" content="Sam Shayan">

    <link rel="stylesheet" href="css/bizStyle.css">
</head>

<body>
    <nav class="horizontal">
        <a id="navicon" href="#"><img src="images/navi.png" alt="icon" /></a>
        <ul class="menu">
            <li> <a href="index.html">Home</a></li>
            <li> <a href="Newslette.html">E-Newslette</a></li>
            <li> <a href="Car.html">Our Cars</a></li>
            <li> <a href="ContactBusiness.html">Contact Us</a></li>
            <li><a href="login.php">Admin</a></li>
        </ul>
    </nav>
    <section>
        <!--Using PHP to aquire the name of the user for the thank you message-->
        <h2><?php echo $message; ?></h2>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <footer>
            <p id="leftfooter">Email me: <a href="mailto:samirshayan@mycwi.cc">samirshayan@mycwi.cc</a><br><br>Official
                website: <a href="www.bmw.us">www.bmw.us</a> </p>
            <!--social network logos-->
            <a href="https://www.linkedin.com/" class="logos" target="_blank"><img src="images/linin.png" height="50px"></a>
            <a href="https://github.com/" class="logos" target="_blank"><img src="images/github.png" height="56px"></a>
            <a href="https://plus.google.com/" class="logos" target="_blank"><img src="images/google.png" height="50px"></a>
            <a href="https://twitter.com/" class="logos" target="_blank"><img src="images/twitter.png" height="50px"></a>
            <a href="https://facebook.com/" class="logos" target="_blank"><img src="images/facebook.png" height="50px"></a>

            <p id="rightfooter">Phone No: <a href="tel:+1555555555">555-555-5555</a> <br> <br> Fax No: <a href="tel:+1555555555">555-555-5555</a></p>

        </footer>
</body>

</html>