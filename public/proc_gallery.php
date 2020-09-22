<html>

<head>
  <title> Project 1: PHP-based Website </title>

  <!--Default styles have been used, with little to no alterations.-->
  <style>
    div.defaultFont {
        font-family: Helvetica, Arial, sans-serif;
    }
    
    div.secondaryFont {
        font-family: serif;
    }

    h1 {
        font-family: Georgia, sans-serif;
        font-weight: normal;
    }

    h2 {
        font-family: Georgia, sans-serif;
        font-weight: normal;
    }

    h3 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    h4 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    h5 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    h6 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
    }

    p {
    	font-family: Arial, sans-serif;
    	font-size: 14px;
    }

    .imageMatrix {
    	width: 100%;
    	height: 50%;
    }
    .imageList {
    	margin-left: auto;
    	margin-right: auto;
    	width: 100%;
    	height: 100%;
    }

    <!-- link href="default.css" rel="stylesheet" type="text/css -->
  </style>

</head>

<body>
<div class="defaultFont">

<script type="text/javascript"> var ScreenWidth = window.innerWidth; </script>

<?php

  # DEFINITION: Displays the images in a specified mode by a certain order.
  function proc_gallery ($image_list_filename, $mode, $sort_mode) {

  	$images = array();
  	$descriptions = array();

  	$file1 = fopen($image_list_filename, "r") or die("Couldn't open that file!");

    while(!feof($file1)) {

        #Splits the line according to our Regex pattern.
    	$result = fgets($file1);
    	$component = preg_split("/,(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $result);

        if(!feof($file1)) {

        	array_push($images, $component[0]);

    		array_push($descriptions, $component[1]);

    	}
    }

  	fclose($image_list_filename);

  	$splitter = "/\*(?=([^\"]*\"[^\"]*\")*[^\"]*$)/";


  	#Sorts the Image and Description arrays based on the selected input. For the date and the size, the filemtime and filesize functions
  	#are used to add the time/size to the front of the image and description name so that they can both be sorted appropriately with the
  	#sort fucntion. The random option results in ten iterations over every element, running a random check everytime and pushing the element
  	#to the back of the array 50% of the time.
  	if ($sort_mode === "orig") {
  		#Keep the same order.
  	} else if ($sort_mode === "date_newest") {

  		for ($i = 0; $i < sizeof($images); $i++) {
  			$descriptions[$i] = filemtime($images[$i]) . "*" . "$descriptions[$i]"; 
  			$images[$i] = filemtime($images[$i]) . "*" . "$images[$i]";
  		}

  		rsort($images);
  		rsort($descriptions);

  		for ($i = 0; $i < sizeof($images); $i++) {
  			$descriptions[$i] = (preg_split($splitter, $descriptions[$i]))[1]; 
  			$images[$i] = (preg_split($splitter, $images[$i]))[1];
  		}

  	} else if ($sort_mode === "date_oldest") {

  		for ($i = 0; $i < sizeof($images); $i++) {
  			$descriptions[$i] = filemtime($images[$i]) . "*" . "$descriptions[$i]"; 
  			$images[$i] = filemtime($images[$i]) . "*" . "$images[$i]";  
  		}

  		sort($images);
  		sort($descriptions);

  		for ($i = 0; $i < sizeof($images); $i++) {
  			$descriptions[$i] = (preg_split($splitter, $descriptions[$i]))[1]; 
  			$images[$i] = (preg_split($splitter, $images[$i]))[1];
  		}

  	} else if ($sort_mode === "size_largest") {

  		for ($i = 0; $i < sizeof($images); $i++) {

  			$imageSize = filesize($images[$i]);
  			$imageSize = substr("0000000000{$imageSize}", -10);

  			$descriptions[$i] = "$imageSize" . "*" . "$descriptions[$i]"; 
  			$images[$i] = "$imageSize" . "*" . "$images[$i]";
  		}

  		rsort($images);
  		rsort($descriptions);

  		for ($i = 0; $i < sizeof($images); $i++) {
  			$descriptions[$i] = (preg_split($splitter, $descriptions[$i]))[1]; 
  			$images[$i] = (preg_split($splitter, $images[$i]))[1];
  		}

  	} else if ($sort_mode === "size_smallest") {

  		for ($i = 0; $i < sizeof($images); $i++) {

  			$imageSize = filesize($images[$i]);
  			$imageSize = substr("0000000000{$imageSize}", -10);

  			$descriptions[$i] = "$imageSize" . "*" . "$descriptions[$i]"; 
  			$images[$i] = "$imageSize" . "*" . "$images[$i]";
  		}

  		sort($images);
  		sort($descriptions);

  		for ($i = 0; $i < sizeof($images); $i++) {
  			$descriptions[$i] = (preg_split($splitter, $descriptions[$i]))[1]; 
  			$images[$i] = (preg_split($splitter, $images[$i]))[1];
  		}

  	} else if ($sort_mode === "rand") {
  		$totalSize = sizeof($images);
  		$tempElement = "Hi";
  		for($i = 0; $i < 10; $i++) {
  			for($j = 0; $j < $totalSize; $j++) {
  				if(rand(0,1) > 0.49) {
  					$tempElement = $images[$j];
  					array_splice($images, $j, 1);
  					array_push($images, $tempElement);
  					$tempElement = $descriptions[$j];
  					array_splice($descriptions, $j, 1);
  					array_push($descriptions, $tempElement);
  				}
  			}
  		}

  	} else {
  		#Ignore any other input and stay with the original order.
  	}

  	$size = 100;

  	#Simply arranges the extracted image names and description to organize them all on a table if list or matrix is chosen. If details
  	#is chosen, we simply create a literal HTML list tha we output the name, description, formatted last date of modification, and
  	#the file size.
  	if($mode === "list") {
  		?><html><table style="width: 100%" border = "1"></html><?php
  		for($i = 0; $i < sizeof($images); $i++) {
  			echo "<tr>";
  			echo "<td>";
  			?>
  			<html> <img class = "imageList" src="<?php echo $images[$i]; ?>" /> </html>
  			<?php
  			echo "</td>";
  			echo "</tr><tr><td>$descriptions[$i]</td></tr>";
  		}
  		echo "</table>";
  	} else if ($mode === "matrix") {
  		$totalRows = ceil(sizeof($images) / 3);
  		$currentImage = 0;
  		$currentDescription = 0;
  		$currentColumn = 0;
  		echo "<table  border=\"1\">";
  		for($i = 0; $i < $totalRows; $i++) {
  			echo "<tr>";
  			while($currentImage < sizeof($images) and $currentColumn < 3) {
  				echo "<td>";
  				?><html><img class = "imageMatrix" src="<?php echo $images[$currentImage]; ?>" /></html><?php
  				echo "</td>";
  				$currentImage++;
  				$currentColumn++;
  			}
  			echo "</tr>";
  			$currentColumn = 0;
  			echo "<tr>";
  			while($currentDescription < sizeof($images) and $currentColumn < 3) {
  				echo "<td>$descriptions[$currentDescription]</td>";
  				$currentDescription++;
  				$currentColumn++;
  			}
  			echo "</tr>";
  			$currentColumn = 0;
  		}
  		echo "</table>";
  	} else if ($mode === "details"){
  		for($i = 0; $i < sizeof($images); $i++) {
  			echo "<li>" . "$images[$i]" . "&nbsp&nbsp&nbsp" . " $descriptions[$i] " . "&nbsp&nbsp&nbsp" . date("F d Y H:i:s", filemtime($images[$i])) . "&nbsp&nbsp&nbsp" . filesize($images[$i]) . " Bytes<br>" . "</li>";
  		}
  	} else {
  		
  	}
  }

?>

</div>

</body>

</html>