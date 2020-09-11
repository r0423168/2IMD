<?php
	
	if (isset($_GET)) {
		$id = $_GET["id"];
	} else {
		header("Location: index.php");
	}

	require_once("connection.php");

	function getCompanyInfo($conn, $id) {
		$id = $conn->real_escape_string($id);
    	$sql = "SELECT * FROM breweries WHERE id = $id";
    	$result = $conn->query($sql);

    	if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()) {
	            echo "<p>";
	            	echo "<span>";
	            		echo "Address: ";
		            	echo $row["address1"];
		            	if (!empty($row["address2"])) {
		            		echo " / " . $row["address2"];
		            	}
		            	echo ", " . $row["city"] . " " . $row["state"] . " " . $row["code"] . ", " . $row["country"];
	            	echo "</span>";
	            	echo "<span>";
	            		echo "Phone: ";
		            	echo $row["phone"];
	            	echo "</span>";
	            	if (!empty($row["website"])) {
	            		echo "<span>";
		            		echo "Website: ";
			            	echo $row["website"];
		            	echo "</span>";
	            	}
	            echo "</p>";
	            if (!empty($row["descript"])) {
	            	echo "<h5>";
			           	echo "Website: ";
				        echo $row["descript"];
		           	echo "</h5>";
	            }
	        }
	    }
    }

    function getName($conn, $id) {
    	$sql = "SELECT * FROM breweries WHERE id = $id";
    	$result = $conn->query($sql);

    	if ($result->num_rows > 0) {
	        while($row = $result->fetch_assoc()) {
	            return $row["name"];
	        }
	    }
    }

    $sql = "SELECT *, breweries.name AS brewery,
			beers.name AS beer,
			beers.descript AS beerDesc
			FROM breweries, beers, categories, styles 
			WHERE  beers.brewery_id = breweries.id 
			AND beers.cat_id = categories.id 
			AND beers.style_id = styles.id AND beers.brewery_id = $id";
	$result = $conn->query($sql);
?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8">
	<title>
		<?php
			echo "Details | " . getName($conn, $id);
		?>
	</title>
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://template68191.motopreview.com/mt-includes/css/assets.min.css">
	<link rel="stylesheet" type="text/css" href="https://template68191.motopreview.com/mt-demo/68100/68191/mt-content/assets/styles.css?_build=1550004938">
	<link rel="stylesheet" type="text/css" href="css/details.css">
</head>
<body>
	<div class="title">
		<div class="inner">
			<h1>
				<?php
					echo getName($conn, $id);
				?>
			</h1>
			<?php
				getCompanyInfo($conn, $id)
			?>;
		</div>
	</div>

	<div class="padding">
	<?php
		if ($result->num_rows > 1) {
	        while($row = $result->fetch_assoc()) {
	?>
		<div class="moto-widget moto-widget-row moto-justify-content_center moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-grid-type="xs" data-widget="row" data-spacing="aaaa" style="" data-bg-position="left top">
	    	<div class="container-fluid">
	        	<div class="row" data-container="container">
					<div class="moto-widget moto-widget-row__column moto-cell col-xs-9 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
						<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation="">
							<div class="moto-widget-text-content moto-widget-text-editable">
								<p class="moto-text_system_9">
									<?php echo $row["beer"] . " (" . $row["style_name"] . ")"; ?>
								</p>
							</div>
						</div>
					</div>
					<div class="moto-widget moto-widget-row__column moto-cell col-xs-3 moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" style="" data-widget="row.column" data-container="container" data-spacing="aaaa" data-bg-position="left top">
		            	<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation="">
	    					<div class="moto-widget-text-content moto-widget-text-editable">
	    						<p class="moto-text_201" style="text-align: right;">
	    							<?php echo $row["cat_name"]; ?>
	    						</p>
	    					</div>
						</div>
					</div>          
	        	</div>
	    	</div>
		</div>
		<?php
	    	if (!empty($row["beerDesc"])):	
	    ?>
		<div class="moto-widget moto-widget-text moto-preset-default moto-spacing-top-auto moto-spacing-right-auto moto-spacing-bottom-auto moto-spacing-left-auto" data-widget="text" data-preset="default" data-spacing="aaaa" data-animation="">
	    	<div class="moto-widget-text-content moto-widget-text-editable">
	    		<p class="moto-text_202">
	    			<?php echo $row["beerDesc"]; ?>
	    		</p>
			</div> 
		</div>
		<?php
			endif;
		?>
		<div class="line">
			<hr>
		</div>
	<?php
		 	}
	    } else {
	        echo "0 results";
	    }
	?>
	</div>
</body>
</html><?php
	require_once("endConnection.php");
?>