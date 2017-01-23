<!DOCTYPE HTML>
<hmtl>
	<head>
		<title>Student Registration Page</title>
		<meta charset = 'UTF-8'/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="scripts/first.js"></script>
		<link rel="stylesheet" href="styles/main.css"/>
	</head>
	<body>
		<div id="imgcontainer">
			<img id="image" src="images/student.jpg" alt="Student"/>
			<img id="image" src="images/register.jpg" alt="register"/>
		</div>
		<div id="link">
			<a href = "allslots.php"> <h3> View all Slots </h3> </a>
		</div>
		<main id="main">
		<h3>Student Registration</h3>
		<form method="post" name ="register" id="register" action ="register.php">
			<table>				
				<tr>
					<td><label>UMID</label></td>
					<td><input type = "text" id = "umid" name = "umid" onblur ="check('error1',this.value)"/><span id="error1"></span></td>
				</tr>
				<tr>
					<td><label>First Name</label></td>
					<td><input type = "text" id = "fname" name= "fname" onblur ="check('error2',this.value)"/><span id="error2"></span></td>
				</tr>
				<tr>
					<td><label>Last Name</label></td>
					<td><input type = "text" id = "lname" name= "lname" onblur ="check('error3',this.value)"/><span id="error3"></span></td>
				</tr>
				<tr>
					<td><label>Project Title</label></td>
					<td><input type ="text" id="ptitle" name="ptitle" onblur ="check('error4',this.value)"/><span id="error4"></span></td>
				</tr>
				<tr>
					<td><label>Phone </label></td>
					<td><input type="text" id ="phone" name="phone" placeholder="123-123-1234" onblur="check('error5',this.value)"/><span id="error5"></span></td>	
				</tr>
				<tr>
					<td><label>Email</label></td>
					<td><input type="text" id="email" name="email" placeholder="example@ex.com" onblur="check('error6',this.value)"/><span id="error6"></span></td>
					<td>
							
				</tr>
				<tr>
					<td>
						<button id ="submit" name="submit">Submit</button>
					</td>		
				</tr>
			</table>
		</form>	
		</main>
		
	</body>
</hmtl>