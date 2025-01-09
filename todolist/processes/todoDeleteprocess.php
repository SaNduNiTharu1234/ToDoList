<?php

require "db.php";

if (isset($_GET["taskId"])) {

    $id = $_GET["taskId"];

    $q1 = "DELETE FROM `task` WHERE taskId='" . $id . "'";

    $rs1 = $conn->query($q1);
    $conn->close();

    header("location: ../toDoList.php?status=Task Deleted Successfully !");
    exit();

} else {
    header("location: ../toDoList.php");
    exit();
}
