<html>

<!-- HEAD section ............................................................................ -->
<head>
  <title> Project 1: PHP-based Website </title>

  <!-- javascript functions -->

  <!-- style -->
 
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

    <!-- link href="default.css" rel="stylesheet" type="text/css -->
  </style>

  

</head>

<!-- BODY section ............................................................................. -->
<body>
<div class="defaultFont">

<!-- PHP testing area ................................ --> 
<?php

  # DEFINITION: Processes a .CSV file and outputs it as a table, with elements in their individual cells.
  # Takes the filename, what character separates elements, what character defines a quote, and what columns to show.
  function proc_csv ($filename, $delimiter, $quote, $columns_to_show) {
    # Open file and read the contents
    $file1 = fopen($filename, "r") or die("Couldn't open that file!");

    #Ensures that the delimiter and quote are escaped if needed.
    $mustEscape = array("[", "]", "(", ")", "{", "}", "*", "+", "?", "|", "^", "$", ".", "\\");
    if(in_array($delimiter, $mustEscape)) {
    	$delimiter = "\\" . $delimiter;
    }
    if(in_array($quote, $mustEscape)) {
    	$quote = "\\" . $quote;
    }

    #Creates a default regex pattern and replaces both the default delimiter and quote with the parameters.
    $pattern = "/,(?=([^\"]*\"[^\"]*\")*[^\"]*$)/";
    $pattern = str_replace (",", $delimiter, $pattern);
    $pattern = str_replace("\"", $quote, $pattern);

    $columns_to_show = preg_split("/:(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $columns_to_show);

    echo "<table  border=\"1\">";

    while(!feof($file1)) {

    	$result = fgets($file1);
    	$component = preg_split($pattern, $result);

    	$column = 1;

    	if(!feof($file1)) {
    		echo "<tr>";

    		foreach($component as $value) {
    			if(in_array($column, $columns_to_show) or in_array("ALL", $columns_to_show)) {
    				$value = str_replace($quote, "", $value);
	    			echo "	<td> ".$value." </td>\n";
    			}

    			$column++;
	    	}

    		echo "</tr>";
    	}
    }

    fclose($filename);
  }

   #proc_csv( "dat2-doublequote-colon.csv" , ":"  , "\"" , "1:2" );
   #proc_csv( "dat2-doublequote-comma.csv" , ","  , "\""   , "4" );
   #proc_csv( "dat2-doublequote-tab.csv"   , "\t" , "\"" , "2:4" );
   #proc_csv( "dat2-singlequote-tab.csv"   , "\t" , "'"   , "2:3:4" );
   #proc_csv( "dat-doublequote-bar.csv"    , "\|"  , "\"" , "1:2:3" );
   #proc_csv( "dat-doublequote-comma.csv"  , ","  , "\"" , "3:1" );
   #proc_csv( "dat-doublequote-tab.csv"    , "\t" , "\"" , "ALL" );
   #proc_csv( "dat-singlequote-colon.csv"  , ":"  , "'"   , "3" );

  	function startsWith($string, $start) {
  		return (substr($string, 0, strlen($start)) === $start);
  	}
  	function endsWith($string, $end) {
  		return (substr($string, -strlen($end)) === $end);
  	}

  	function proc_wikitext($filename) {
  		$file1 = fopen($filename, "r") or die("Couldn't open that file!");

  		while(!feof($file1)) {

    		$line = fgets($file1);

    		wikitext_line_check(chop($line));
    	}

    	fclose($filename);
    }

    function wikitext_header($line) {
    	$check = "=";
    	$headerNum = 0;

    	while(startsWith($line, $check) and endsWith($line, $check)) {
  			$check .= "=";
  			$headerNum++;
  		}

  		$line = substr($line, strlen($check) - 1);

  		for($i = 0; $i < $headerNum; $i++) {
  			$line = rtrim($line, "=");
  		}

    	switch ($headerNum) {
    		case 1:
        		echo "<h1>$line<hr></h1>";
        		break;
    		case 2:
        		echo "<h2>$line<hr></h2>";
        		break;
    		case 3:
        		echo "<h3>$line</h3>";
        		break;
        	case 4:
        		echo "<h4>$line</h4>";
        		break;
    		case 5:
        		echo "<h5>$line</h5>";
        		break;
    		case 6:
        		echo "<h6>$line</h6>";
        		break;
        	default:
        		echo "<p>$line</p>";
        		break;
		}
    }

    function wikitext_indent($line) {
    	$check = ":";
    	$indentNum = 0;

    	while(startsWith($line, $check)) {
  			$check .= ":";
  			$indentNum++;
  		}

  		$line = substr($line, strlen($check) - 1);

  		for($i = 0; $i < $indentNum; $i++) {
  			$line = "&nbsp&nbsp&nbsp" . $line;
  		}

  		echo "<br>$line";
    }

    function wikitext_quote($line) {
    	$components = preg_split("/\|(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	$components[sizeof($components) - 1] = rtrim($components[sizeof($components) - 1], "}}");
    	unset($components[0]);
    	for ($i = 0; $i < sizeof($components); $i++) {
    		$components[$i] = (preg_split("/\=(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $components[$i]))[1];
    	}
    	switch (sizeof($components)) {
    		case 2:
    			$components[1] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $components[1];
        		echo "$components[1]<br>";
    			break;
    		case 3:
        		$components[1] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $components[1];
        		echo "$components[1]<br>";
        		$components[2] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&mdash;" . $components[2];
        		echo "$components[2]";
        		break;
        	case 4:
        		$components[1] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $components[1];
        		echo "$components[1]<br>";
        		$components[2] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&mdash;" . chop($components[2]);
        		echo "$components[2]";
        		$components[3] = ",&nbsp" . $components[3];
        		echo "<i>$components[3]</i><br>";
        		break;
		}
    	echo "<br>";
    }

    function wikitext_unordered($line) {
    	$check = "*";
    	$unorderedNum = 0;

    	while(startsWith($line, $check)) {
  			$check .= "*";
  			$unorderedNum++;
  		}

  		$line = substr($line, strlen($check) - 1);

  		for($i = 0; $i < $unorderedNum; $i++) {
  			echo "<ul>";
  		}
  		echo "<li>$line</li>";
  		for($i = 0; $i < $unorderedNum; $i++) {
  			echo "</ul>";
  		}
    }

    function wikitext_ordered($line) {
    	$check = "#";
    	$orderedNum = 0;

    	while(startsWith($line, $check)) {
  			$check .= "#";
  			$orderedNum++;
  		}

  		$line = substr($line, strlen($check) - 1);

  		for($i = 0; $i < $orderedNum; $i++) {
  			echo "<ul>";
  		}
  		echo "<li>$line</li>";
  		for($i = 0; $i < $orderedNum; $i++) {
  			echo "</ul>";
  		}
    }

    function wikitext_desc_list($line) {
    	$line = substr($line, 1);
    	$components = preg_split("/\:(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	echo "<b>$components[0]</b>";
    	for ($i = 1; $i < sizeof($components); $i++) {
    		$components[$i] = "&nbsp&nbsp&nbsp" . $components[$i];
    		wikitext_indent($components[$i]);
    	}
    	echo "<br>";
    }

    function wikitext_image($line) {
    	$line = (preg_split("/:(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line))[1];
    	$line = rtrim(chop($line), "]]");
    	$components = preg_split("/\|(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	switch (sizeof($components)) {
    		case 1:
    			?>
    			<html>
    			<img src="<?php echo $components[0]; ?>" />
    			</html>
    			<?php
    			break;
    		case 2:
    			if(sizeof(preg_split("/\=(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $components[1])) === 2) {
    				$components[1] = (preg_split("/\=(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $components[1]))[1];
    			}
    			$components[1] = rtrim($components[1], "px");
    			?>
    			<html>
    			<img src="<?php echo $components[0]; ?>" width="<?php echo $components[1]; ?>" height="<?php echo $components[1]; ?>" />
    			</html>
    			<?php
        		break;
		}
    	echo "<br>";
    }

    function wikitext_color($line) {
    	$line = rtrim(chop($line), "}}");
    	$components = preg_split("/\|(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	$components[1] = "color:" . $components[1];
    	?>
    	<html>
    	<p style="<?php echo $components[1]; ?>"><?php echo $components[2]; ?></p>
    	</html>
    	<?php
    }

    function wikitext_highlight($line) {
    	$line = rtrim(chop($line), "}}");
    	$components = preg_split("/\|(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	$components[2] = "background-color:" . $components[2];
    	?>
    	<html>
    	<mark style="<?php echo $components[2]; ?>"><?php echo $components[3]; ?></mark>
    	</html>
    	<?php
    }

    function wikitext_bold_italic($line) {
    	$line = substr($line, 5);
    	$line = rtrim(chop($line), "'''''");
    	echo "<b><i>$line</b></i>";
    }
    function wikitext_bold($line) {
    	$line = substr($line, 3);
    	$line = rtrim(chop($line), "'''");
    	echo "<b>$line</b>";
    }
    function wikitext_italic($line) {
    	$line = substr($line, 2);
    	$line = rtrim(chop($line), "''");
    	echo "<i>$line</i>";
    }

    function wikitext_named_url($line) {
    	$line = substr($line, 1);
    	$line = rtrim(chop($line), "]");
    	$url = (preg_split("/\s(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line))[0];
    	$name = substr($line, strlen($url));
    	?>
    	<html>
    	<a href="<?php echo $url; ?>"><?php echo $name; ?></a>
    	</html>
    	<?php
    }

    function wikitext_url($line) {
    	?>
    	<html>
    	<a href="<?php echo $line; ?>"><?php echo $line; ?></a>
    	</html>
    	<?php
    }

  	function wikitext_line_check($line) {
  		if(startsWith($line, "=") and endsWith($line, "=")) {
  			wikitext_header($line);
  		} else if (startsWith($line, "----")) {
  			echo "<hr>";
  		} else if (strlen($line) === 0) {
  			echo "<br>";
  		} else if(startsWith($line, ":")) {
  			wikitext_indent($line);
  		} else if (startsWith($line, "{{Quote")) {
  			wikitext_quote($line);
  		} else if (startsWith($line, "*")) {
  			wikitext_unordered($line);
  		} else if (startsWith($line, "#")) {
  			wikitext_ordered($line);
  		} else if (startsWith($line, ";")) {
  			wikitext_desc_list($line);
  		} else if (startsWith($line, "[[File")) {
  			wikitext_image($line);
  		} else if (startsWith($line, "{{color")) {
  			wikitext_color($line);
  		} else if (startsWith($line, "{{Font")) {
  			wikitext_highlight($line);
  		} else if (startsWith($line, "'''''")) {
  			wikitext_bold_italic($line);
  		} else if (startsWith($line, "'''")) {
  			wikitext_bold($line);
  		} else if (startsWith($line, "''")) {
  			wikitext_italic($line);
  		} else if (startsWith($line, "[http")) {
  			wikitext_named_url($line);
  		} else if (startsWith($line, "http")) {
  			wikitext_url($line);
  		} else {
  			echo "$line";
  		}
  	}

  	proc_wikitext("wikitext.wiki");

?>

<!-- Java script testing area ............................... -->

<!-- HTML form input handling .......................... -->

</div> <!-- end of big div -->

</body>

</html>
