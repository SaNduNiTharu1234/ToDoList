<?php

require_once ("db.php");

$User_ID = $_SESSION["user_ID"];

if (isset($_POST['submit'])) {

  $Section = $_POST['section'];
  $Name = $_POST['userName'];
  $Address = $_POST['address'];
  $Ph_Num = $_POST['number'];
  $Comment = $_POST['c/f'];

  $sql = "INSERT INTO `complaint_and_feedback`(`Section`, `Name`, `Address`, `Ph_Num`, `Comment`, `User_ID`)
        VALUES ('$Section','$Name','$Address','$Ph_Num','$Comment','$User_ID')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("location: ../contact.php?status=Message Sent !");
  }
}
?>
<?php
mysqli_close($conn);
?>