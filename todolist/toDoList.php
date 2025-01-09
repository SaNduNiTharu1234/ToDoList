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

$q1 = "SELECT * FROM `task`";
$rs1 = $conn->query($q1);
$n1 = $rs1->num_rows;

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
        <form id="taskForm" action="./processes/todoprocess.php" method="post">

            <input type="text" id="taskName" name="task" placeholder="Task">

            <textarea id="taskDescription" name="description" placeholder="Description"></textarea>

            <input type="date" name="date" id="taskDate" placeholder="List Date">

            <button type="submit" name="submit">Add Task</button>

        </form>

        <table id="taskTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>List Date</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                <?php

                for ($i = 0; $i < $n1; $i++) {
                    $d1 = $rs1->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $d1["TaskId"]; ?></td>
                        <td><?php echo $d1["task"]; ?></td>
                        <td><?php echo $d1["description"]; ?></td>
                        <td><?php echo $d1["date"]; ?></td>
                        <td class="action-buttons">
                            <a href="toDoListUpdate.php?id=<?php echo $d1["TaskId"]; ?>"><button>Edit</button></a>
                            <a
                                href="./processes/todoDeleteprocess.php?taskId=<?php echo $d1["TaskId"]; ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                    <?php
                }

                ?>
            </tbody>
        </table>

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