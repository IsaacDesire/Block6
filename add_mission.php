<html>
	<head>
		<title>
		</title>
	</head>
	<body>
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
		
		<?php
		$host = 'localhost';
			$username = 'root';
			$password = '';
			$database_name = 'esa';
			
			$link = mysqli_connect($host, $username, $password, $database_name);
			
			if ($link === false) {
				die ('Error: could not connect');
			} else {
				echo ('Succesfully connected');
			}
		?>
		
		<h3>Add a new mission</h3>
		<form method="post" action="add_mission.php">
		
			<label>Mission name</label>
			<br>
			<input type="text" name="mission_name">
			<br>
			<label>Destination</label>
			<br>
			<input type="text" name="destination">
			<br>
			<label>Launch date</label>
			<br>
			<input type="date" name="launch_date">
			<br>
			<label>Mission type</label>
			<br>
			<input type="text" name="mission_type">
			<br>
			<label>Crew size</label>
			<br>
			<input type="text" name="crew_size">
			<br>
			<label>Select astronaut: </label> 
			<br>
			
			<select name="astronaut_id">
				<?php
				$sql = mysqli_query($link, "SELECT astronaut_id, astronaut_name FROM astronaut");
				while ($row = $sql->fetch_assoc()) {
					echo "<option value='{$row['astronaut_id']}'>{$row['astronaut_name']}</option>";
				}
				?>
			</select><br>
				<label>Select target: </label> 
			<br>
			
			<select name="target_id">
				<?php
				$sql = mysqli_query($link, "SELECT target_id, name FROM target");
				while ($row = $sql->fetch_assoc()) {
					echo "<option value='{$row['target_id']}'>{$row['name']}</option>";
				}
				?>
			</select>
			
			<input type="submit" name="submit">
		</form>
		
		<?php
		
		if (isset($_POST['submit'])) {

			$mission_name = $_POST['mission_name'];
			$destination = $_POST['destination'];
			$launch_date = $_POST['launch_date'];
			$mission_type = $_POST['mission_type'];
			$crew_size = $_POST['crew_size'];
			$astronaut_id = $_POST['astronaut_id'];
			$target_id = $_POST['target_id'];
			
			$sql = "INSERT INTO mission (name, destination, launch_date, mission_type, crew_size, astronaut_id, target_id) VALUES ('$mission_name', '$destination', '$launch_date', '$mission_type', '$crew_size','$astronaut_id', '$target_id')";
			
			
			// Validation that mission has been added
			if (mysqli_query($link, $sql)) {
				echo ("Mission has been added");
			} else {
				echo ("Error: problem adding mission");
			}
		}
			mysqli_close($link);
		?>
	</body>
</html>