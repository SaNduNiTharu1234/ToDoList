<?php

require "db.php";

if (isset($_POST["submit"])) {

    $id = $_POST["taskId"];
    $task = $_POST["task"];
    $des = $_POST["description"];
    $date = $_POST["date"];

    // set the time zone to Sri Lanka
    date_default_timezone_set('Asia/Colombo');

    // get the current time in Sri Lanka
    $dateNow = date('Y-m-d');

    $q1 = "SELECT * FROM `task` WHERE taskId='" . $id . "'";
    $rs1 = $conn->query($q1);
    $n1 = $rs1->num_rows;
    $d1 = $rs1->fetch_assoc();

    if (
        empty($_POST["task"])
        || empty($_POST["taskId"])
        || empty($_POST["description"])
        || empty($_POST["date"])
    ) {
        header("location: ../toDoListUpdate.php?id=$id&status=Fill All Fields !");
        exit();
    } else {

        if ((strlen($task) < 3 || strlen($task) > 100) && $d1["task"] != $task) {
            header("location: ../toDoListUpdate.php?id=$id&status=Invalid Title !");
            exit();
        } elseif (($date < $dateNow) && $d1["date"] != $date) {
            header("location: ../toDoListUpdate.php?id=$id&status=Invalid Date !");
            exit();
        } else {

            $q1 = "UPDATE `task` SET task = '" . $task . "', description = '" . $des . "', date = '" . $date . "' 
            WHERE taskId = '" . $id . "'";

            $rs1 = $conn->query($q1);
            $conn->close();

            header("location: ../toDoListUpdate.php?id=$id&status=Task Updated Successfully !");
            exit();
        }
    }
} else {
    header("location: ../toDoListUpdate.php?id=$id");
    exit();
}
