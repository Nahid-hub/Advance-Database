<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/LOGIN_STYLE.css">
    <title>SIGNIN</title>
</head>
<body>
    <?php
    include "dbcon.php";

    if(isset($_POST['submit'])){
        $user = $_POST['email'];
        $pass = $_POST['password'];
        $s = oci_parse($conn, "select username,password from signup where email='$user' and password='$pass'");       
        oci_execute($s);
        $row = oci_fetch_all($s, $res);

        if($user!="" or $pass!=""){
            if($row){
             echo "<script> window.location.href='ADMIN_DASHBOARD.php';</script>";
                            
            }
            else{
                ?>
                <script>alert("INVLID EMAIL OR PASSWORD!!!")</script>
                <?php
            }
        }
        else{
            ?>
            <script>alert("PLEASE FILL ALL INPUT FIELD!!!")</script>
            <?php

        }
    }

    ?>
    <body>
    <div class="container">
        <header>LOG-IN</header>
        <form action="#" method="POST">
            <!--EMAIL-->
            <div class="area email">
                <div class="input-area">
                    <input type="text" name="email" placeholder="E-MAIL ADDRESS">
                </div>
            </div>

            <!--PASSWORD-->

            <div class="area password">
                <div class="input-area">
                    <input class="pass" name="password" type="password" placeholder="PASSWORD">
                    <span class="show">SHOW</span>
                </div>
            </div>

            <!--FORGOT PASSWORD-->

            <div class="forgot-pass"><a href="#">FORGOT PASSWORD???</a></div>

            <!--SUBMIT BUTTON-->

            <input name="submit" type="submit" value="LOG-IN">

            <!--CREATE NEW ACCOUNT-->

            <div class="createacc-link">I DON'T HAVE AN ACCOUNT! <a href="http://localhost/Database Final/PROJECT/REGESTRATION.php">CREATE ACCOUNT NOW</a></div>
        </form>
    </div>
        <script>
            var input = document.querySelector('.pass');
            var show = document.querySelector('.show');

            show.addEventListener('click', active);

            function active (){
              if(input.type === "password") {
                  input.type = "text";
                 show.style.color = "#1DA1F2";
                 show.textContent = "HIDE";
                }else{
                  input.type = "password";
                  show.style.color = "#111";
                 show.textContent = "SHOW";
                }
            }
        </script>

</body>

</html>