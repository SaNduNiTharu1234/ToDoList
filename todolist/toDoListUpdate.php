<?php
session_start();
$_SESSION["user_ID"] = 3;

require "processes/db.php";

if (isset($_GET["status"])) {
    echo '<script>
    setTimeout(function() {
        alert("' . $_GET["status"] . '");
    }, 1000); </script>';
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("location: ../toDoList.php");
    exit();
}

$q1 = "SELECT * FROM `task` WHERE taskId='" . $id . "'";
$rs1 = $conn->query($q1);
$n1 = $rs1->num_rows;
$d1 = $rs1->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/todolist.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>To-Do List</title>
</head>

<body>

    <header class="header_1">
        <a href="#" class="logo">Logo</a>
        <div class="group">
            <ul class="navigation">
                <li><a href="#">B&B Plan</a></li>
                <li><a href="#">Event Plan</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="contact.php">Contact us</a></li>
            </ul>
        </div>
        <div class="search">
            <input type="text" placeholder="Search">
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="icon">
            <button class="btn">LOGIN</button>
            <i class='bx bx-user-circle'></i>

        </div>
    </header>

    <div class="container">

        <h1>To Do List</h1>
        <form id="taskForm" action="./processes/todoUpdateprocess.php" method="post">

            <input style="visibility: hidden;" type="text" name="TaskId" value="<?php echo $d1["TaskId"]; ?>">
            <input type="text" id="taskName" name="task" placeholder="Task" value="<?php echo $d1["task"]; ?>">

            <textarea id="taskDescription" name="description"
                placeholder="Description"><?php echo $d1["description"]; ?></textarea>

            <input type="date" name="date" id="taskDate" placeholder="List Date" value="<?php echo $d1["date"]; ?>">

            <button type="submit" name="submit">Update Task</button>

        </form>

        <a href="toDoList.php">Go back</a>

    </div>

    <script>
        function addTask() {
            var taskName = document.getElementById('taskName').value;
            var taskDescription = document.getElementById('taskDescription').value;
            var taskDate = document.getElementById('taskDate').value;

            // Create a new row
            var newRow = document.createElement('tr');

            // Add task details to the row
            newRow.innerHTML = `
            <td>${taskName}</td>
            <td>${taskDescription}</td>
            <td>${taskDate}</td>
            <td class="action-buttons">
                <button onclick="editTask(this)">Edit</button>
                <button onclick="deleteTask(this)">Delete</button>
            </td>
        `;

            // Append the new row to the table
            document.getElementById('taskTable').getElementsByTagName('tbody')[0].appendChild(newRow);

            // Reset form fields
            document.getElementById('taskForm').reset();
        }

        function editTask(button) {
            var row = button.parentNode.parentNode;
            var cells = row.getElementsByTagName('td');
            var taskName = cells[0].innerText;
            var taskDescription = cells[1].innerText;
            var taskDate = cells[2].innerText;

            // Populate form fields with current values
            document.getElementById('taskName').value = taskName;
            document.getElementById('taskDescription').value = taskDescription;
            document.getElementById('taskDate').value = taskDate;

            // Remove the current row
            row.remove();
        }

        function deleteTask(button) {
            var row = button.parentNode.parentNode;
            row.remove();
        }
    </script>

</body