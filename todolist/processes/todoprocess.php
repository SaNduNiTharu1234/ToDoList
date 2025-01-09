<?php

require "db.php";

if (isset($_POST["submit"])) {

    $task = $_POST["task"];
    $des = $_POST["description"];
    $date = $_POST["date"];

    // set the time zone to Sri Lanka
    date_default_timezone_set('Asia/Colombo');

    // get the current time in Sri Lanka
    $dateNow = date('Y-m-d');

    if (
        empty($_POST["task"])
        || empty($_POST["description"])
        || empty($_POST["date"])
    ) {
        header("location: ../toDoList.php?status=Fill All Fields !");
        exit();
    } else {

        if (strlen($task) < 3 || strlen($task) > 100) {
            header("location: ../toDoList.php?status=Invalid Title !");
            exit();
        } elseif ($date < $dateNow) {
            header("location: ../toDoList.php?status=Invalid Date !");
            exit();
        } else {


            $q1 = "INSERT INTO `task` (`task`,`description`,`date`) 
            VALUES ('" . $task . "','" . $des . "','" . $date . "')";

            $rs1 = $conn->query($q1);
            $conn->close();

            header("location: ../toDoList.php?status=Task Added Successfully !");
            exit();
        }
    }
} else {
    header("location: ../toDoList.php");
    exit();
}
