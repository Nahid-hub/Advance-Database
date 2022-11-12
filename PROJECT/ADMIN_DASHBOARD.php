<?php  include('dbcon.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>ADMIN DASHBOARD</title>
        
        <link rel = "stylesheet" type = "text/css" href = "CSS/ADMIN_DASHBOARD_STYLE.css">

    </head>
    
    <body>
        <h2>TABLES</h2>

     
            <ul id="myUL">
                
                <li><a href="http://localhost/Database Final/PROJECT/TABLES/OWNER.php">OWNER</a></li>                
                <li><a href="http://localhost/Database Final/PROJECT/TABLES/Shop.php">SHOP</a></li>
                <li><a href="http://localhost/Database Final/PROJECT/TABLES/Customer.php">CUSTOMER</a></li>
                <li><a href="http://localhost/Database Final/PROJECT/TABLES/Manager.php">MANAGER</a></li>
                <li><a href="http://localhost/Database Final/PROJECT/TABLES/Menucard.php">MENUCARD</a></li>
                <li><a href="http://localhost/Database Final/PROJECT/TABLES/Salaryscale.php">SALARYSCALE</a></li>
            </ul>

        
            
       


        <script>
            function myFunction() {
                var input, filter, ul, li, a, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL");
                li = ul.getElementsByTagName("li");
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("a")[0];
                    txtValue = a.textContent || a.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
        </script>
    </body>
</html>
