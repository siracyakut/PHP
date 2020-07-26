<?php
$sehir = "Istanbul";
$context = stream_context_create(array(
    'http' => array(
        'method' => 'GET',
        'header' => "authorization: apikey 5nfzqcvrBYQLsprPklm6VW:0BXlS1ExwVoC8WC3mcmlSt\r\n" .
                    "content-type: application/json\r\n"
    )
));
$data = file_get_contents("https://api.collectapi.com/health/dutyPharmacy?il=" . $sehir, false, $context);

$veri = json_decode($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	echo("<title>$sehir Nöbetçi Eczaneler</title>");
	?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">İsim</th>
								<th class="column2">İl</th>
								<th class="column3">İlçe</th>
								<th class="column4">Adres</th>
								<th class="column5">Telefon</th>
								<th class="column6">Konum</th>
							</tr>
						</thead>
						<tbody>
								<?php
								for($sayi = 0; $sayi < count($veri->result); $sayi++)
								{
									echo "<tr>";
									echo "<td class=\"column1\">" . $veri->result[$sayi]->name . "</td>";
									echo "<td class=\"column2\">" . $sehir . "</td>";
									echo "<td class=\"column3\">" . $veri->result[$sayi]->dist . "</td>";
									echo "<td class=\"column4\">" . $veri->result[$sayi]->address . "</td>";
									echo "<td class=\"column5\">" . $veri->result[$sayi]->phone . "</td>";
									echo "<td class=\"column6\">" . $veri->result[$sayi]->loc . "</td>";
									echo "</tr>";
								}
								?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>