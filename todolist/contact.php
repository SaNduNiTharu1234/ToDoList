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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Me</title>
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

    <div class="contentContact">

        <div class="details">
            <img id="tele" src="images/telephone.jpeg" alt="telephone">
            <h3>Call us:</h3>
            <h4>+94(71) 200 8781</h4>
            <img id="loca" src="images/location.jpg" alt="location">
            <h3>Write to us:</h3>
            <h4>NO.11,MAin Street, Negambo</h4>
            <img id="mail" src="images/mail.jpeg" alt="mail">
            <h3>Mail Us:</h3>
            <h4>easymeplanner@gmail.com</h4>
        </div>
        <script>
            function validsubmitcon() {
                const f1 = document.getElementById('txt1').value;
                const f2 = document.getElementById('txt2').value;
                const f3 = document.getElementById('txt3').value;
                const f4 = document.getElementById('txt4').value;

                var alert = document.getElementById('almsg');

                if (f1 === '' || f2 === '' || f3 === '' || f4 === '') {
                    alert.style.display = 'block';
                    alert.innerText = "Fill all the fields";
                    return false;
                } else {
                    alert.style.display = 'none';
                    alert.innerText = "";
                    return true;
                }
            }

        </script>

        <div id="form">
            <div class="fTitle">
                <h2>Add your feedback/complain here:</h2>
            </div>
            <div class="form_con">
                <form id="myform" action="./processes/contacthandler.php" method="POST"
                    onsubmit="return validsubmitcon()">
                    <label class="ff" id="section" style="margin-top: 0rem;">Select a section :</label><br>
                    <select name="section" id="conDrop">
                        <option value="Bill plan" selected>Bill plan</option>
                        <option value="Budget plan">Budget plan</option>
                        <option value="Event plan">Event plan</option>
                        <option value="To do list">To do list</option>
                    </select><br><br>

                    <label class="ff" id="userName">Name :</label><br>
                    <input id="txt1" class="iFeild" type="text" name="userName"
                        style="height: 30px;width: 20rem;"><br><br>

                    <label class="ff" id="address">Address :</label> <br>
                    <textarea id="txt2" class="iFeild" name="address" rows="4" cols="50"
                        style="height:75px;width:20rem;"></textarea><br><br>

                    <label class="ff" id="number">Contact Number : </label><br>
                    <input id="txt3" type="tel" name="number" class="iFeild" placeholder="0777777777"
                        pattern="[0-9]{10}" style="height:40px;width:15rem;"><br><br>

                    <label class="ff" id="c/f">Feedback/Complain:</label><br>
                    <textarea id="txt4" class="iFeild" name="c/f" rows="4" cols="50"></textarea><br><br>

                    <div id="almsg" style="display:none">
                        <span>Error Occured</span>
                    </div>

                    <button type="submit" value="Submit" name="submit" id="submitbtn" class="bttn">Submit</button>
                </form>

            </div>
        </div>
    </div>

    <section class="leg">
        <div class="footer_content">
            <img src="Images/logo.jpg" alt="logo" height="125px" width="200px">
            <p>Easyme offers seamless online billing and event reminder services, <br> providing users with efficient
                payment solutions and timely event notifications.</p>

            <div class="icons">
                <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-whatsapp'></i></a>
            </div>
        </div>

        <div class="footer_conte">
            <h4>Sections</h4>
            <li><a href="#">Online Billing</a></li>
            <li><a href="#">Budget Planning</a></li>
            <li><a href="#">Event Planning</a></li>
            <li><a href="#">To Do List</a></li>

        </div>

        <div class="footer_conte">
            <h4>Privacy</h4>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Contact Us</a></li>

        </div>
        <form class="search">
            <input type="email" placeholder="Enter your email here" required>
            <button type="submit" class="btn3">Subscribe</i></button>
        </form>

    </section>
</body>

</html>