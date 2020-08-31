<html>

<!-- HEAD section ............................................................................ -->
<head>
  <title> Project 1: PHP-based Website </title>

  <!-- javascript functions -->

  <!-- style -->
 
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

<!-- BODY section ............................................................................. -->
<body>
<div class="defaultFont">

<!-- PHP testing area ................................ --> 
<?php
    
    $GLOBALS["orderedArray"] = [0];

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
        if($orderedNum === sizeof($GLOBALS['orderedArray'])) {
          array_push($GLOBALS['orderedArray'], 0);
        }
  			$orderedNum++;
  		}

      $GLOBALS['orderedArray'][$orderedNum - 1]++;

  		$line = substr($line, strlen($check) - 1);

      echo "&nbsp&nbsp&nbsp&nbsp&nbsp";

  		for($i = 1; $i < $orderedNum; $i++) {
  			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
  		}
  		echo $GLOBALS['orderedArray'][$orderedNum -1] . ".";
      echo "$line<br><br>";

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
    	<span style="<?php echo $components[1]; ?>"><?php echo $components[2]; ?></span>
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
    		echo "$line";
    	}
    }

  	function wikitext_line_check($line) {
  		if(startsWith($line, "=") and endsWith($line, "=")) {
        $GLOBALS["orderedArray"] = [0];
  			wikitext_header($line);
  		} else if (startsWith($line, "----")) {
        $GLOBALS["orderedArray"] = [0];
  			echo "<hr>";
  		} else if (strlen($line) === 0) {
        $GLOBALS["orderedArray"] = [0];
  			echo "<br>";
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

<!-- Java script testing area ............................... -->

<!-- HTML form input handling .......................... -->

</div> <!-- end of big div -->

</body>

</html>