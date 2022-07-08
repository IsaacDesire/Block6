<html>
	<head>
		<title>Add new astronaut</title>
	</head>
	
	<body>
		
<!-- Navigation bar -->
		
		<h1>European Space Agency</h1>
		<hr>
		<p>Choose an option below: </p>
		<a href="index.php">Home page</a> |
		<a href="add_astronaut.php">Add an astronaut</a> |
		<a href="add_mission.php">Add a mission</a> |
		<a href="add_target.php">Add a target</a> |
		<a href="see_astronauts.php">See all astronauts</a> |
		<a href="see_missions.php">See all missions</a> |
		<a href="see_targets.php">See all targets</a> |
		<hr>
		
		
<!-- Form to receive astronaut name and number of missons input -->
		
		<h3>Add new astronaut</h3>
		<form method="post" action="add_astronaut.php">
			<label>Astronaut name </label><br>
			<input type="text" name="astronaut_name"><br>
			<label>Number of missions</label><br>
			<input type="text" name="no_missions"><br>
			<input type="submit" name="submit">
		</form>

		
<!-- PHP script to connect to sql database -->
		
		<?php
		$host = 'localhost';
			$username = 'root';
			$password = '';
			$database_name = 'esa';
			
			$link = mysqli_connect($host, $username, $password, $database_name);
			
			if ($link === false) {
				die ('Error: could not connect ');
			} else {
				echo ('Succesfully connected ');
			}
		
// PHP script to insert values from the form above into database (esa) table (astronaut) columns (name and missions)
		
		if (isset($_POST['submit'])) {
			$astronaut_name = $_POST['astronaut_name'];
			$no_missions = $_POST['no_missions'];
			$sql = "INSERT INTO astronaut (astronaut_name, no_missions) VALUES ('$astronaut_name', '$no_missions')";
			
// Validation that astronaut has been added
			
			if (mysqli_query($link, $sql)) {
				echo ("Astronaut has been added");
			} else {
				echo ("Error: problem adding astronaut");
			}
		}
			mysqli_close($link);
		?>
	</body>
</html>