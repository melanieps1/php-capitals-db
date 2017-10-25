<!DOCTYPE html>
<html>
<head>
	<title>State Capitals</title>

	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body class="container">

<?php

	function getDb() {
		$db = pg_connect("host=localhost port=5432 dbname=capitals_dev user=statesuser password=statescapitals");
		return $db;
	}

	function getInventory() {
		$request = pg_query(getDb(), "
			SELECT * FROM states;
		");

		return pg_fetch_all($request);

	}

?>

<h1>State Capitals</h1>
<br>
<table class="table">
		<tr>
			<th>Capital</th>
			<th>State</th>
		</tr>
	
	<?php

		// var_dump(getinventory());

		// foreach ($capital as $field => $value) {
		// 		echo "<td>$value</td>";
		// 	}
		// 	echo "</tr>\n";

		foreach (getInventory() as $capital) {
			echo "<tr>";
				echo "<td>" . $capital['capital'] . "</td>";
				echo "<td>" . $capital['name'] . "</td>";
			echo "<tr>\n";
		}	

	?>

</table>

</body>
</html>