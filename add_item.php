<!DOCTYPE html>
<html>
<head>
	<title>Menu Update</title>

    <style>
        body{
            background-image: url('images/bg02.jpg');
            background-size: cover;
        }
            h2,input{
                font-family: montserrat;
            }
    </style>
    <button type="button" onclick="back_home()" style=" font-size: 200%;">Home</button>
    <br> <br>
</head>

<body>
	<h2>Add a new book: </h2>

	<?php
		session_start();
		$rid = $_SESSION['rid'];
	?>

        <form action="add_item_proc.php" method="GET">
            Book Name: <br><input type="text" name="iname"><br><br>
            Book Price: <br><input type="text" name="price"><br><br>
            Catagory (New/Used): <br><input type="text" name="cat"><br><br>
            <input type="submit" value="Add Book">
        </form>
        <br><br>
        
        <button type="button" onclick="back()" style="font-size: 200%;">Menu</button><br>

		<br><input type="button" value="Sign Out" id="signout" style="font-size: 150%;">

        <script>
          	var elm=document.getElementById('signout');
            elm.addEventListener('click', processlogout);
                    
            function processlogout(){

                window.location.assign('res_logout.php');
                
            }

            var elm2 = document.getElementById('homepage');
            elm2.addEventListener('click', back_home);

            function back_home(){
                window.location.assign('res_home.php');
            }

            function back(){
            	window.location.assign('menu.php');
            }

        </script>
</body>
</html>