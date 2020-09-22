<html>

<head>
  <title> Project 1: PHP-based Website [1] </title>

  <!--Styles have been modified to match Wikipedia's standard.-->
  <style>
    div.defaultFont {
        font-family: Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 22.4px;
        margin-bottom: 7px;
        margin-top: 7px;
    }
    
    div.secondaryFont {
        font-family: serif;
    }

    h1 {
        font-family: Georgia, sans-serif;
        font-weight: 400;
        font-size: 25.2px;
        line-height: 32.76px;
        margin-bottom: 6.3px;
        margin-top: 25.2px;
    }

    h2 {
        font-family: Georgia, sans-serif;
        font-weight: 400;
        font-size: 21px;
        line-height: 27.3px;
        margin-bottom: 5.25px;
        margin-top: 21px;
    }

    h3 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 700;
        font-size: 16.8px;
        line-height: 26.88px;
        margin-bottom: 0px;
        margin-top: 5.04px;
        padding-top: 8.4px;
    }

    h4 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 22.4px;
        margin-bottom: 0px;
        margin-top: 4.2px;
        padding-top: 7px;
    }

    h5 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 700;
        font-size: 13.5px;
        line-height: 21.2px;
        margin-bottom: 0px;
        margin-top: 3.9px;
        padding-top: 6.5px;
    }

    h6 {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 700;
        font-size: 13px;
        line-height: 20.9px;
        margin-bottom: 0px;
        margin-top: 3.7px;
        padding-top: 6.2px;
    }

    hr {
      font-size: 14px;
      height: 1px;
      line-height: 22.4px;
      margin-bottom: 2.8px;
      margin-top: 2.8px;
      border-bottom-width: 0px;
      border-top-width: 1px;
      border-left-width: 0px;
      border-right-width: 0px;
    }

    <!-- link href="default.css" rel="stylesheet" type="text/css -->
  </style>

  

</head>

<body>
<div class="defaultFont">

<?php
    
    #Global variable to check if a new Ordered List must be made or a a previous one should continue.
    $GLOBALS["orderedArray"] = [0];
    $GLOBALS["endString"] = "";

    #DEFINITION: Checks to see if the $string starts with the $start variable and returns a boolean. Works for characters and strings.
  	function startsWith($string, $start) {
  		return (substr($string, 0, strlen($start)) === $start);
  	}

    #DEFINITION: Checks to see if the $string ends with the $end variable and returns a boolean. Works for characters and strings.
  	function endsWith($string, $end) {
  		return (substr($string, -strlen($end)) === $end);
  	}

    #DEFINITION: Opens up the .wiki file requested and checks each and every line with our other parsing functions.
  	function proc_wikitext($filename) {
  		$file1 = fopen($filename, "r") or die("Couldn't open that file!");

  		while(!feof($file1)) {

    		$line = fgets($file1);

    		wikitext_line_check(chop($line));
    	}

    	fclose($filename);

        return $GLOBALS["endString"];
    }

    #DEFINITION: Prints the line as the header, depending on the amount of '=' that it is surrounded by.
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
        		$GLOBALS["endString"] .= "<h1>$line<hr></h1>";
        		break;
    		case 2:
        		$GLOBALS["endString"] .= "<h2>$line<hr></h2>";
        		break;
    		case 3:
        		$GLOBALS["endString"] .= "<h3>$line</h3>";
        		break;
        	case 4:
        		$GLOBALS["endString"] .= "<h4>$line</h4>";
        		break;
    		case 5:
        		$GLOBALS["endString"] .= "<h5>$line</h5>";
        		break;
    		case 6:
        		$GLOBALS["endString"] .= "<h6>$line</h6>";
        		break;
        	default:
        		$GLOBALS["endString"] .= "<p>$line</p>";
        		break;
		  }
    }

    #DEFINIITION: Prints the line with the necessary spacing/indention required by the number of ':' in front of the line.
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

  		$GLOBALS["endString"] .= "<br>$line";
    }

    #DEFINITION: Prints a line with quote formatting. It checks for the number of '|' to identify how much information
    # the quote will contain (The Quote, The Author, and The Source).
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
        		$GLOBALS["endString"] .= "$components[1]<br>";
    			break;
    		case 3:
        		$components[1] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $components[1];
        		$GLOBALS["endString"] .= "$components[1]<br>";
        		$components[2] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&mdash;" . $components[2];
        		$GLOBALS["endString"] .= "$components[2]";
        		break;
        	case 4:
        		$components[1] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $components[1];
        		$GLOBALS["endString"] .= "$components[1]<br>";
        		$components[2] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&mdash;" . chop($components[2]);
        		$GLOBALS["endString"] .= "$components[2]";
        		$components[3] = ",&nbsp" . $components[3];
        		$GLOBALS["endString"] .= "<i>$components[3]</i><br>";
        		break;
		}
    	$GLOBALS["endString"] .= "<br>";
    }

    #DEFINITION: Applies the correct formatting through the help of HTML and creates an unordered list out of the line.
    function wikitext_unordered($line) {
    	$check = "*";
    	$unorderedNum = 0;

    	while(startsWith($line, $check)) {
  			$check .= "*";
  			$unorderedNum++;
  		}

  		$line = substr($line, strlen($check) - 1);

  		for($i = 0; $i < $unorderedNum; $i++) {
  			$GLOBALS["endString"] .= "<ul>";
  		}
  		$GLOBALS["endString"] .= "<li>$line</li>";
  		for($i = 0; $i < $unorderedNum; $i++) {
  			$GLOBALS["endString"] .= "</ul>";
  		}
    }

    #DEFINITION: Utilizes the global variable (orderedArray) to create/add to an ordered list out of the line.
    function wikitext_ordered($line) {

    	$check = "#";
    	$orderedNum = 0;

    	while(startsWith($line, $check)) {
  			$check .= "#";
        if($orderedNum === sizeof($GLOBALS['orderedArray'])) {
          array_push($GLOBALS['orderedArray'], 0);
        }
  			$orderedNum++;
  		}

      $GLOBALS['orderedArray'][$orderedNum - 1]++;

  		$line = substr($line, strlen($check) - 1);

      $GLOBALS["endString"] .= "&nbsp&nbsp&nbsp&nbsp&nbsp";

  		for($i = 1; $i < $orderedNum; $i++) {
  			$GLOBALS["endString"] .= "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
  		}
  		$GLOBALS["endString"] .= $GLOBALS['orderedArray'][$orderedNum -1] . ".";
      $GLOBALS["endString"] .= "$line<br><br>";

    }

    #DEFINITION: Creates a Description List out of the given line, utilizing  the indention function to produce the desired results.
    function wikitext_desc_list($line) {
    	$line = substr($line, 1);
    	$components = preg_split("/\:(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	$GLOBALS["endString"] .= "<b>$components[0]</b>";
    	for ($i = 1; $i < sizeof($components); $i++) {
    		$components[$i] = "&nbsp&nbsp&nbsp" . $components[$i];
    		wikitext_indent($components[$i]);
    	}
    	$GLOBALS["endString"] .= "<br>";
    }

    #DEFINITION: Prints out the image out of the line given, checking if any size is input. If so, the image's width and height are set to that.
    function wikitext_image($line) {
    	$line = (preg_split("/:(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line))[1];
    	$line = rtrim(chop($line), "]]");
    	$components = preg_split("/\|(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	switch (sizeof($components)) {
    		case 1:
    			?>
    			<html>
    			<img src="<?php $GLOBALS["endString"] .= $components[0]; ?>" />
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
    			<img src="<?php $GLOBALS["endString"] .= $components[0]; ?>" width="<?php $GLOBALS["endString"] .= $components[1]; ?>" height="<?php $GLOBALS["endString"] .= $components[1]; ?>" />
    			</html>
    			<?php
        		break;
		}
    	$GLOBALS["endString"] .= "<br>";
    }

    #DEFINITION: Applies the requested color to the entirety of the line.
    function wikitext_color($line) {
    	$line = rtrim(chop($line), "}}");
    	$components = preg_split("/\|(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	$components[1] = "color:" . $components[1];
    	?>
    	<html>
    	<span style="<?php $GLOBALS["endString"] .= $components[1]; ?>"><?php $GLOBALS["endString"] .= $components[2]; ?></span>
    	</html>
    	<?php
    }

    #DEFINITION: Applies the requested highlight to the entirety of the line.
    function wikitext_highlight($line) {
    	$line = rtrim(chop($line), "}}");
    	$components = preg_split("/\|(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line);
    	$components[2] = "background-color:" . $components[2];
    	?>
    	<html>
    	<mark style="<?php $GLOBALS["endString"] .= $components[2]; ?>"><?php $GLOBALS["endString"] .= $components[3]; ?></mark>
    	</html>
    	<?php
    }

    #DEFINITION: Applies the bold and italic effect to the entire line.
    function wikitext_bold_italic($line) {
    	$line = substr($line, 5);
    	$line = rtrim(chop($line), "'''''");
    	$GLOBALS["endString"] .= "<b><i>$line</b></i>";
    }
    #DEFINITION: Applies the bold effect to the entire line.
    function wikitext_bold($line) {
    	$line = substr($line, 3);
    	$line = rtrim(chop($line), "'''");
    	$GLOBALS["endString"] .= "<b>$line</b>";
    }
    #DEFINITION: Applies the italic effect to the entire line.
    function wikitext_italic($line) {
    	$line = substr($line, 2);
    	$line = rtrim(chop($line), "''");
    	$GLOBALS["endString"] .= "<i>$line</i>";
    }

    #DEFINITION: Splits a named URL to create a link to the website out of the text chosen, printing a text with an
    # embedded link.
    function wikitext_named_url($line) {
    	$line = substr($line, 1);
    	$line = rtrim(chop($line), "]");
    	$url = (preg_split("/\s(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $line))[0];
    	$name = substr($line, strlen($url));
    	?>
    	<html>
    	<a href="<?php $GLOBALS["endString"] .= $url; ?>"><?php $GLOBALS["endString"] .= $name; ?></a>
    	</html>
    	<?php
    }

    #DEFINITION: Simply prints the line as a clickable URL.
    function wikitext_url($line) {
    	?>
    	<html>
    	<a href="<?php $GLOBALS["endString"] .= $line; ?>"><?php $GLOBALS["endString"] .= $line; ?></a>
    	</html>
    	<?php
    }

    #DEFINITION: This function will parse the line and check one last time to see if there are any embedded text effects, images, links, and
    # anything that might be skipped over. Although the process of doing this is slightly different for each type of embedding, the line is
    # effectively split into three sections: the area prior to the embedding, the embedding itself, and the area after the embedding. Then, all
    # three lines go through the line checks once again to ensure that there aren't any skipped embeddings. If they pass the checks, then the line
    # is printed as it is.
    function wikitext_print($line) {
    	if(strpos($line, "'''''") != false) {
    		$backLine = substr($line, 0, strpos($line, "'''''"));
    		$frontLine = substr($line, strlen($backLine) + strlen("'''''"));
    		$middleLine = "'''''" . substr($frontLine, 0, strpos($frontLine, "'''''")) . "'''''";
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else if (strpos($line, "'''") != false) {
    		$backLine = substr($line, 0, strpos($line, "'''"));
    		$frontLine = substr($line, strlen($backLine) + strlen("'''"));
    		$middleLine = "'''" . substr($frontLine, 0, strpos($frontLine, "'''")) . "'''";
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else if (strpos($line, "''") != false) {
    		$backLine = substr($line, 0, strpos($line, "''"));
    		$frontLine = substr($line, strlen($backLine) + strlen("''"));
    		$middleLine = "''" . substr($frontLine, 0, strpos($frontLine, "''")) . "''";
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else if (strpos($line, "[[File") != false) {
    		$backLine = substr($line, 0, strpos($line, "[["));
    		$frontLine = substr($line, strlen($backLine) + strlen("[["));
    		$middleLine = "[[" . substr($frontLine, 0, strpos($frontLine, "]]")) . "]]";
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else if (strpos($line, "{{color") != false) {
    		$backLine = substr($line, 0, strpos($line, "{{"));
    		$frontLine = substr($line, strlen($backLine) + strlen("{{"));
    		$middleLine = "{{" . substr($frontLine, 0, strpos($frontLine, "}}")) . "}}";
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else if (strpos($line, "{{Font") != false) {
    		$backLine = substr($line, 0, strpos($line, "{{"));
    		$frontLine = substr($line, strlen($backLine) + strlen("{{"));
    		$middleLine = "{{" . substr($frontLine, 0, strpos($frontLine, "}}")) . "}}";
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else if (strpos($line, "[http") != false) {
    		$backLine = substr($line, 0, strpos($line, "["));
    		$frontLine = substr($line, strlen($backLine) + strlen("["));
    		$middleLine = "[" . substr($frontLine, 0, strpos($frontLine, "]")) . "]";
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else if (strpos($line, "http") != false) {
    		$backLine = substr($line, 0, strpos($line, "http"));
    		$curPos = strlen($backLine);
    		$strArray = str_split($line);
    		for($i = $curPos; $i < sizeof($strArray); $i++) {
    			if ($line[$i] === " ") {
    				break;
    			}
    			$curPos++;
    		}
    		$middleLine = substr($line, strlen($backLine), $curPos - strlen($backLine));
    		$frontLine = substr($line, strlen($backLine) + strlen($middleLine));
    		wikitext_line_check($backLine);
    		wikitext_line_check($middleLine);
    		wikitext_line_check($frontLine);
    	} else {
    		$GLOBALS["endString"] .= "$line";
    	}
    }

    #DEFINITON: Checks every single line to see if it matches with any of the required formatting to implement the
    # necessary Wikitext-formatted version of it, sending it to the appropriate function or sending it to the line
    # parser for a final check and print. For every one of these, the orderedArray variable is reset to allow for the
    # creation of a new ordered list if necessary, aside from the wikitext_ordered() function.
  	function wikitext_line_check($line) {
  		if(startsWith($line, "=") and endsWith($line, "=")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_header($line);
  		} else if (startsWith($line, "----")) {
        $GLOBALS["orderedArray"] = [0];
  			$GLOBALS["endString"] .= "<hr>";
  		} else if (strlen($line) === 0) {
        $GLOBALS["orderedArray"] = [0];
  			$GLOBALS["endString"] .= "<br>";
  		} else if(startsWith($line, ":")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_indent($line);
  		} else if (startsWith($line, "{{Quote")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_quote($line);
  		} else if (startsWith($line, "*")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_unordered($line);
  		} else if (startsWith($line, "#")) {
  			wikitext_ordered($line);
  		} else if (startsWith($line, ";")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_desc_list($line);
  		} else if (startsWith($line, "[[File")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_image($line);
  		} else if (startsWith($line, "{{color")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_color($line);
  		} else if (startsWith($line, "{{Font")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_highlight($line);
  		} else if (startsWith($line, "'''''")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_bold_italic($line);
  		} else if (startsWith($line, "'''")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_bold($line);
  		} else if (startsWith($line, "''")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_italic($line);
  		} else if (startsWith($line, "[http")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_named_url($line);
  		} else if (startsWith($line, "http")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_url($line);
  		} else {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_print($line);
  		}
  	}

?>

</div>

</body>

</html>