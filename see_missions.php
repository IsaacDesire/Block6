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
				die("Error: could not connect");
			}
		?>
			
		<table>
			<tr>
				<th width="100px">Mission ID<br><hr></th>
				<th width="300px">Mission Name<br><hr></th>
				<th width="300px">Destination<br><hr></th>
				<th width="200px">Launch Date<br><hr></th>
				<th width="300px">Mission Type<br><hr></th>
				<th width="100px">Crew size <br><hr></th>
				<th width="100px">Astronaut ID<br><hr></th>
				<th width="100px">Target ID<br><hr></th>
			</tr>
			
			<?php
			
			$sql = mysqli_query($link, "SELECT mission_id, name, destination, launch_date, mission_type, crew_size, astronaut_id, target_id FROM mission");
			while ($row = $sql->fetch_assoc()) {
				echo "
				<tr>
					<th>{$row['mission_id']}</th>
					<th>{$row['name']}</th>
					<th>{$row['destination']}</th>
					<th>{$row['launch_date']}</th>
					<th>{$row['mission_type']}</th>
					<th>{$row['crew_size']}</th>
					<th>{$row['astronaut_id']}</th>
					<th>{$row['target_id']}</th>
				</tr>
				";
			}
			?>
		</table>
			
		<?php	
			mysqli_close($link);
		?>
	</body>
</html>