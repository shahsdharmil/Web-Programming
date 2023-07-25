<?php
if (!isset($_COOKIE['username']))
	header("Location: Login.php");
?>

<!DOCTYPE html>
<html>

<head>
	<title>Expense Planner</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<style>
		#overlay {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			display: none;
			z-index: 999;
		}

		#iframe-container {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 80%;
			height: 80%;
			background-color: #fff;
		}

		#btn-open-iframe {
			padding: 10px 20px;
			background-color: #3498db;
			color: #fff;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
	</style>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

	<script src="https://code.jquery.com/jquery-3.6.4.js"
		integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.jqueryui.min.js"></script>

	<script>
		$(document).ready(function () {
			$('#myTable').DataTable();
		});
	</script>

	<script>
		window.addEventListener('message', (event) => {
			if (event.data === 'reload') {
				location.reload();
				location.href = 'Login.php'
			}
		});
	</script>

</head>

<body>
	<div class="header">
		<h2>Expense Planner</h2>
		<!-- <a href="Logout.php" class="btnLogout">Logout</a> -->
		<button id="btn-open-iframe"
			style="float: right; z-index: 999; transform: translate(-30%, -150%);">Profile</button>
	</div>

	<div id="overlay">
		<div id="iframe-container">
			<iframe src="./Profile.php" style="height: 100%; width: 100%"></iframe>
		</div>
	</div>

	<script>
		const overlay = document.querySelector('#overlay');
		const btnOpenIframe = document.querySelector('#btn-open-iframe');

		btnOpenIframe.addEventListener('click', () => {
			overlay.style.display = 'block';
		});

		overlay.addEventListener('click', () => {
			overlay.style.display = 'none';
		});
	</script>

	<div>
		<form method="post" action="process.php">
			<?php if (isset($_GET['error'])) { ?>
				<p class="error">
					<?php echo $_GET['error']; ?>
				</p>
			<?php } ?>
			<label>Description</label>
			<input type="text" name="description" required>
			<label>Amount (in ₹)</label>
			<input type="number" name="amount" required>
			<label>Date</label>
			<input type="date" name="date" required>
			<button type="submit" name="save">Save</button>
		</form>
	</div>

	<div class="table">
		<table id="myTable" class="display">
			<thead>
				<tr>
					<th>Description</th>
					<th>Amount</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Database connection
				$conn = mysqli_connect("localhost", "root", "", "expense_planner");
				$username = $_COOKIE['username'];
				// Retrieve data from database
				$result = mysqli_query($conn, "SELECT * FROM expenses WHERE username='$username' ORDER BY ID DESC");

				while ($row = mysqli_fetch_assoc($result)) {
					?>
					<tr>
						<td>
							<?php echo $row['description']; ?>
						</td>
						<td>
							₹
							<?php echo $row['amount']; ?>
						</td>
						<td>
							<?php echo $row['date']; ?>
						</td>
						<td><a href="process.php?delete=<?php echo $row['id']; ?>" class="delete">Delete</a></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>

	<div id="chartContainer" style="height: 370px; width: 100%"></div>

	<?php

	$result = mysqli_query($conn, "SELECT * FROM expenses WHERE username='$username' ORDER BY ID DESC");

	$data = array();

	// Loop through results and add data to array
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = array("label" => $row['description'], "y" => $row['amount']);
	}

	// Convert data to JSON
	$dataJSON = json_encode($data);

	?>

	<script type="text/javascript">

		var data = <?php echo $dataJSON; ?>;

		// Create new pie chart
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			title: {
				text: "Expense Breakdown"
			},
			data: [{
				type: "pie",
				startAngle: 240,
				yValueFormatString: "Rs ##0.00\"\"",
				indexLabel: "{label} {y}",
				dataPoints: data
			}]
		});

		// Render chart
		chart.render();

	</script>
</body>

</html>