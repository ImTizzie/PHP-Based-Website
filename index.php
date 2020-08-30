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

    h3 {
        color: blue;
    }
    <!-- link href="default.css" rel="stylesheet" type="text/css -->
  </style>

  

</head>

<!-- BODY section ............................................................................. -->
<body>
<div class="defaultFont">

<!-- PHP testing area ................................ --> 
<?php

  # function definition: use the exact interface in your code.
  function proc_csv ($filename, $delimiter, $quote, $columns_to_show) {
    # Open file and read the contents
    $file1 = fopen($filename, "r") or die("Couldn't open that file!");

    #Creates a default regex pattern and replaces both the default delimiter and quote with the parameters.
    $pattern = "/,(?=([^\"]*\"[^\"]*\")*[^\"]*$)/";
    $pattern = str_replace (",", $delimiter, $pattern);
    $pattern = str_replace("\"", $quote, $pattern);

    echo "$filename > [ $delimiter : $quote ] > $pattern";

    echo "<table  border=\"1\">\n";

    while(!feof($file1)) {

    	$result = fgets($file1);
    	$component = preg_split($pattern, $result);

    	$column = 0;

    	echo "<tr>\n";

    	foreach($component as $value) {
    		$column++;
    		echo "	<td> ".$value." </td>\n";
    	}
    	
    	echo "</tr>\n";
    }
    fclose($filename);
  }

   proc_csv( "dat2-doublequote-colon.csv" , ":"  , "\\\"" , "ALL" );
   proc_csv( "dat2-doublequote-comma.csv" , ","  , "\'"   , "ALL" );
   proc_csv( "dat2-doublequote-tab.csv"   , "\t" , "\\\"" , "ALL" );
   proc_csv( "dat2-singlequote-tab.csv"   , "\t" , "\'"   , "ALL" );
   proc_csv( "dat-doublequote-bar.csv"    , "\|"  , "\\\"" , "ALL" );
   proc_csv( "dat-doublequote-comma.csv"  , ","  , "\\\"" , "ALL" );
   proc_csv( "dat-doublequote-tab.csv"    , "\t" , "\\\"" , "ALL" );
   proc_csv( "dat-singlequote-colon.csv"  , ":"  , "\'"   , "ALL" );

?>

<!-- Java script testing area ............................... -->

<!-- HTML form input handling .......................... -->

</div> <!-- end of big div -->

</body>

</html>
