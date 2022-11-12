<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/LOGIN_STYLE.css">
    <title>CREATE ACCOUNT</title>
</head>
<body>
<?php

    include "dbcon.php";

    if(isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $emailQ = oci_parse($conn, "select * from signup where email='$email' ");
        $query = oci_execute($emailQ);

        if ($uname!="" || $email!="" || $password!="" || $cpassword!=""){
            
            if($password === $cpassword){
                $insertquery = oci_parse($conn,"insert into signup(username, email, password, cpassword) values('$uname', '$email', '$password', '$cpassword')");//<!--insertion-->

                $iquery = oci_execute($insertquery);

                if($conn){
                   $pattern = '/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/';
                   if(preg_match($pattern, $email)){
                    echo "<script> window.location.href='LOGIN.php';</script>";
                        


                    }
                    else{
                        ?>
                        <script>alert("PLEASE ENTER A VALID EMAIL !!! ")</script>
            
                        <?php

                    }

                }
                else {
                   ?>
                   <script>alert("NOT CREATED ACCOUNT")</script>
            
                    <?php
                }
            }
            else {
                ?>
                <script>alert("PASSWORD AND CONFIRM PASSWORD ARE NOT MATCHED")</script>
                <?php
            }
        }
        else{
            ?>
            <script>alert("PLEASE FILL ALL INPUT FIELD")</script>
            <?php

        }

        
        
       
        
    }

?>
    <div class="container">
        <header>CREATE ACCOUNT</header>
        <form action="#" method="POST">
            <!--USER NAME-->
            <div class="area email">
                <div class="input-area">
                    <input type="text" name="uname" placeholder="USER NAME">
                </div>
            </div>

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

            <!--CONFIRM PASSWORD-->

            <div class="area password">
                <div class="input-area">
                    <input  name="cpassword" type="password" placeholder="CONFIRM PASSWORD">
                </div>
            </div>



            <!--SUBMIT BUTTON-->

            <input name="submit" type="submit" value="CREATE ACCOUNT">

            <!--CREATE NEW ACCOUNT-->

            <div class="createacc-link">I ALREADY HAVE AN ACCOUNT! <a href="http://localhost/Database Final/PROJECT/LOGIN.php">LOG-IN</a></div>
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