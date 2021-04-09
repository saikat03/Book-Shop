<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Seller's Login Page</title>
	<title></title>
	<style>
		#fields {
			color: black;
			font-size: 150%;
			font-weight: bold;
			font-family: cocomat;
			text-align: left;
			margin-leftt: 8%;
		}
		input{
			font-size: 120%;
		}
		h1{
			font-weight: bold;
			font-family: montserrat;
			text-align: left;
		}

		body{
			background-image: url('images/bg02.jpg');
			background-size: cover;
		}
	</style>

<button onclick="home()" style="float: left; font-size: 100%; margin-left: 0%; color: black" id="fields">HomePage</button>
<br>
</head>
<body>
	<h1 margin-left: 300px;>Seller's Login Page</h1>
	<form action="verify_res.php" method="POST">
		<p id="fields">
		Email: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
		<input type="email" name="rmail"><br><br>
		Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
		<input type="password" name="rpass"><br><br>
		<input type="submit" value="Sign In" style="margin-leftt: 0%; font-size: 100%" id="fields"><br>
		</p>
	</form>
		<button onclick="myfunc()" style="float: left; margin-left: 0%; font-size: 89%; color: black" id="fields">Sign Up</button><br><br>
		
	<script>
		function myfunc(){
			window.location.assign('res_sign_up.php')
		}
		function home(){
			window.location.assign('http://localhost/bookshop/')
		}
	</script>
</body>
</html>