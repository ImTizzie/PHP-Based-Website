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

    <!-- link href="default.css" rel="stylesheet" type="text/css -->
  </style>

  

</head>

<body>
<div class="defaultFont">

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

    #Boolean check to see whether or not bold and italics should be applied to the next row.
    $first = true;

    while(!feof($file1)) {

        #Splits the line according to our Regex pattern.
    	$result = fgets($file1);
    	$component = preg_split($pattern, $result);

        #Keeps track of the column numbers for the $columns_to_show parameter.
    	$column = 1;

    	if(!feof($file1)) {

            #Creates a new row and inserts the data being read, if it can be. This repeats until the end of the file is reached.

    		echo "<tr>";

    		foreach($component as $value) {
    			if(in_array($column, $columns_to_show) or in_array("ALL", $columns_to_show)) {
    				$value = str_replace($quote, "", $value);
            if($first) {
              echo "  <td><b><i> ".$value." </b></i></td>\n";
            } else {
              echo "  <td> ".$value." </td>\n";
            }
    			}

    			$column++;
	    	}

    		echo "</tr>";

            $first = false;

    	}
    }

    echo "</table>";

    fclose($filename);
    
  }

?>

</div>

</body>

</html>