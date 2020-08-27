<html>

<!-- HEAD section ............................................................................ -->
<head>
  <title> Xchel Diaz's Project 1 Checklist </title>

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
    $pattern = "/((\r?\n)|(\r\n?))/";
    $result = fgets($file1, filesize($filename));
    echo $result;
    echo "<br>";
    while(!feof($filename)) {
    	$result = fgets($file1, filesize($filename));
    	$component = preg_split($pattern, $result);
    	$column = 0;
    	foreach($component as $value) {
    		$column++;
    		echo $value;
    	}
    	echo "<br>";
    }
    fclose($filename);

    #echo "<table  border=\"1\">\n";
    #echo "</table>\n<p/>";
  }

   echo "<h1> Xchel's Project 1 Testing Ground </h1>\n";
   
   echo "<h2> 1. CSV File Processor </h2>\n";

   # FILE access 
   $handle = fopen("data.dat","r") or die("Cannot open data.dat");

   echo "<table  border=\"1\">\n";

   while ($data = fgets($handle)) {
        echo "<tr>\n";
        $data_cols = preg_split('/,/',$data);
        for ($k=0; $k<count($data_cols); ++$k) {
            echo "  <td> ".$data_cols[$k]." </td>\n";
        }
        echo "</tr>\n";
   }

   fclose($handle);

   echo "</table>\n<p/>";

   # example calls
   proc_csv("testFile.csv",",","\"", "ALL");
   #proc_csv("data.dat",",","\"", "1:3:4:7");
   #proc_csv("test.csv",",","\"", "ALL");

# output would be formatted HTML code (table), that will be embedded where the above call is made in the PHP file.

   echo "<h2> 2. Simplified Wikitext </h2>\n";
   
   echo "<h2> 3. Interactive Gallery </h2>\n";
   
   echo "<h2> 4. Search </h2>\n";

   # FILE access 
   

?>

<!-- Java script testing area ............................... -->

<!-- HTML form input handling .......................... -->

</div> <!-- end of big div -->

</body>

</html>
