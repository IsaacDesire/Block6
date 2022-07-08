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
				<th width="100px">Target ID<br><hr></th>
				<th width="300px">Target Name<br><hr></th>
				<th width="150px">First Mission<br><hr></th>
				<th width="300px">Target Type<br><hr></th>
				<th width="150px">Number of Missions<br><hr></th>
			</tr>
			
			<?php
			
			$sql = mysqli_query($link, "SELECT target_id, name, first_mission, target_type, no_missions FROM target");
			while ($row = $sql->fetch_assoc()) {
				echo "
				<tr>
					<th>{$row['target_id']}</th>
					<th>{$row['name']}</th>
					<th>{$row['first_mission']}</th>
					<th>{$row['target_type']}</th>
					<th>{$row['no_missions']}</th>
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