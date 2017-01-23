<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['searchError'])) {
	$searchError = $_SESSION['searchError'];
}
$_SESSION['searchError'] = '';
$nameError = "";
$timeError = "";
if (isset($_POST['Search'])) {
	//parse_str($_SERVER['QUERY_STRING']);
	$skillName = filter_input(INPUT_POST, 'skillName');
	$time = filter_input(INPUT_POST, 'time');
	$category = filter_input(INPUT_POST, 'category');
	$location = filter_input(INPUT_POST, 'location');

	if (empty($_POST['skillName']) && $_POST['category'] === '' && empty($_POST['location']) && $_POST['time'] === '') {
		$error = "Select atleast one criteria";
	} else {
		if (!empty($_POST['skillName'])) {
			if (!preg_match('/^[a-z0-9 .\-]+$/i', $skillName)) {
				$nameError = "Only letters and white space allowed";
			}
		}
		if (!empty($_POST['time'])) {
			if (!preg_match("/^[a-zA-Z ]*$/", $time)) {
				$timeError = "Only letters allowed";
			}
		}
	}
	if ($nameError === "" && $timeError === "") {
		$_SESSION['skillName'] = $skillName;
		$_SESSION['category'] = $category;
		$_SESSION['location'] = $location;
		$_SESSION['time'] = $time;
		header("Location: fetch.php");
	}
}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Search Skills</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/homestyle.css"/>
		<script src="validation.js"></script>
	</head>
	<body>
		<header>
			<div id="headercontainer">	
				<div id="tagline">
					<span class="site_name">Trade'A'Skill</span>
					<br>
					<span class="tag_line">Meet,share and learn.</span>
				</div>
				<div id="links">
					<?php
					include ("links.php");
 ?>
				</div>
			</div>
		</header> 
		<main>
		<div id="bgimage">
			<img src="Images/Collage.jpg" />
		<div id="formsection">
			<h3>Find what you need here.</h3>
			<span id="error" class="errormessage"><?php
				if (isset($searchError)) {echo $searchError;
				}
 ?></span>
			<form name="search" id="search" method="post" action="search1.php">
				<table>
					<tr>
						<td>
							<label>Search by Skill</label>
						</td>
						<td>
							<input type="text" name="skillName" id="skillName" value="<?php echo isset($_POST["skillName"]) ? $_POST["skillName"] : ''; ?>"/>
							<span id="nameError"  class="errormessage"></span>
						</td>
					</tr>
					<tr>
						<td>
							<label>Search by Category</label>		
						</td>
						<td>
							<select name ="category">
								<option value="">Select</option>
								<option value="Music">Music</option>
								<option value="Academics">Academics</option>
								<option value="Photography">Photography</option>
								<option value="Sports">Sports</option>
								<option value="Cooking">Cooking</option>
								<option value="Computers">Computers</option>
								<option value="Art and DIYs">Art and DIYs</option>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							<label>Search by Location</label>	
						</td>
						<td>
							<input type="text" name="location" id="location" value="<?php echo isset($_POST["location"]) ? $_POST["location"] : ''; ?>"/>
							<span id="locationError" class="errormessage"></span>
						</td>
					</tr>
					<tr>
						<td>
							<label>Search by Free Time</label>
						</td>
						<td>
							<select name ="time">
								<option value="">Select</option>
								<option value="Morning">Morning</option>
								<option value="Afternoon">Afternoon</option>
								<option value="Evening">Evening</option>
							</select>
						</td>
					</tr>
					<tr>						
						<td>
							<input type="submit" value="Search" name="Search" onclick="return validateSearch()"/>
						</td>	
					</tr>
				</table>
				
			</form>
		</div>
		</div>
		</main>
	</body>
	
	<footer>
		<?php
		include ('footerpage.html');
		?>
	</footer>
</html>
