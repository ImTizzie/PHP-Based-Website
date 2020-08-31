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
	include 'proc_csv.php';

	proc_csv( "dat2-doublequote-colon.csv" , ":"  , "\"" , "1:2" );
	echo "<br>";
	proc_csv( "dat2-doublequote-comma.csv" , ","  , "\""   , "4" );
	echo "<br>";
	proc_csv( "dat2-doublequote-tab.csv"   , "\t" , "\"" , "2:4" );
	echo "<br>";
	proc_csv( "dat2-singlequote-tab.csv"   , "\t" , "'"   , "2:3:4" );
	echo "<br>";
	proc_csv( "dat-doublequote-bar.csv"    , "\|"  , "\"" , "1:2:3" );
	echo "<br>";
	proc_csv( "dat-doublequote-comma.csv"  , ","  , "\"" , "3:1" );
	echo "<br>";
	proc_csv( "dat-doublequote-tab.csv"    , "\t" , "\"" , "ALL" );
	echo "<br>";
	proc_csv( "dat-singlequote-colon.csv"  , ":"  , "'"   , "3" );
?>

<?php
	include 'proc_wikitext.php';

	proc_wikitext("wikitext.wiki");
?>

<!-- Java script testing area ............................... -->

<!-- HTML form input handling .......................... -->

</div> <!-- end of big div -->

</body>

</html>
