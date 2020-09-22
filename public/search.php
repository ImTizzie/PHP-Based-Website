<html>

<head>
  <title> Project 1: Search </title>

  <!--Default styles have been used, with little to no alterations.-->
  <style>
    div.defaultFont {
      font-family: Helvetica, Arial, sans-serif;
    }
    
    div.secondaryFont {
      font-family: serif;
    }

    .searchText {
      max-width: 728px;
      margin-right: auto;
      font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Arial, sans-serif;
      font-size: 18px;
      line-height: 24px;
      margin-top: 0.79em;
      color: rgba(117, 117, 117, 1);
      margin-bottom: -0.42em;
      font-style: normal;
      letter-spacing: 0;
      font-weight: 300;
    }

    .searchPages {
      max-width: 728px;
      margin-left: auto;
      margin-right: auto;
      font-size: 26px;
      line-height: 32px;
      letter-spacing: -0.022em;
      font-style: normal;
      color: rgba(41, 41, 41, 1);
      font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Arial, sans-serif;
      font-weight: bold;
    }

    <!-- link href="default.css" rel="stylesheet" type="text/css -->
  </style>

</head>

<body>
  <div class="defaultFont">

    <?php
    include 'header.php';
    include 'proc_wikitext.php';
    ?>

    <?php

    #DEFINITION: Counts how many of the pages have the searched for string and
    #changes the contents of those that don't to "NULL".
    function HowMany(&$searchFor, &$contents, $names) {
      $count = 0;
      for($i = 0; $i < sizeof($contents); $i++) {
        if(strpos($contents[$i], $searchFor) === FALSE) {
          $contents[$i] = "NULL";
          $names[$i] = "NULL";
        } else {
          $count++;
        }
      }
      return $count;
    }

    #DEFINITION: Prints the names of all the pages that have the searched for
    #string and assigns the names their respective links.
    function PrintPages(&$searchFor, &$contents, &$names, &$count) {
      if($count <= 0) {
        echo "<p class = \"searchText\">\"$searchFor\" was not found in any page.</p><br>";
      } else {
        echo "<p class = \"searchText\">\"$searchFor\" was found in the following $count pages:</p><br>";
        echo "<table>";
        for($i = 0; $i < sizeof($contents); $i++) {
          if(strpos($contents[$i], $searchFor) === FALSE) {
          #DO NOTHING
          } else {
            $name = ucfirst((preg_split("/\.(?=([^\"]*\"[^\"]*\")*[^\"]*$)/", $names[$i]))[0]);
            echo "<tr><td><a class = \"searchPages\" href = " . "search.php?page=" . $names[$i] . "&keyword=" . urlencode($searchFor) . ">$name</a></td></tr>";
          }
        }
        echo "</table>";
      }
    }

    #DEFINITION: Goes through all HTML code text and replaces the found string with
    #the same string, only highlighted.
    function HighlightText(&$searchFor, &$pageContents, &$page) {
        $data = preg_split("/(<\/*.*?>)/", $pageContents);
        if($page !== "resources.php") {
          for($j = 0; $j < 12; $j++) {
            array_shift($data);
          }
        } else {
          array_shift($data);
        }
        foreach ($data as $value) {
          if(strpos($value, $searchFor) === FALSE) {
          } else {
            $value2 = str_replace($searchFor, "<mark>" . $searchFor . "</mark>", $value);
            $pageContents = str_replace($value, $value2, $pageContents);
          }
        }
    }

    #DEFINITION: Checks link to see if searching or displaying highlighted page.
    function URLCheck($link) {
      if($link === "localhost:5555/search.php") {
        DisplaySearch();
      } else {
        DisplayHighlight($link);
      }
    }

    #DEFINITON: Counts the number of pages with the string and sends them to be
    #displayed by another function.
    function DisplaySearch() {
      $searchFor = $_POST["name"];

      $contents = array();
      $names = array();

      $indexContent = file_get_contents("index.php");
      $blogContent = file_get_contents("blog.php");
      $tipsContent = file_get_contents("tips.php");
      $resourcesContent = proc_wikitext("wikitext.wiki");

      array_push($contents, $indexContent, $blogContent, $tipsContent, $resourcesContent);
      array_push($names, "index.php", "blog.php", "tips.php", "resources.php");

      $count = HowMany($searchFor, $contents, $names);

      PrintPages($searchFor, $contents, $names, $count);
    }

    #DEFINITION: Gets the page, highlights it, then fires it back to the user all marked up.
    function DisplayHighlight($link) {
      $searchFor = urldecode((preg_split("/(localhost).*(keyword=)/", $link)[1]));
      $page = preg_split("/(localhost).*(page=)|(&keyword=).*/", $link)[1];

      $pageContents = file_get_contents($page);

      if($page === "resources.php") {
        $pageContents = proc_wikitext("wikitext.wiki");
      }
      
      HighlightText($searchFor, $pageContents, $page);

      echo $pageContents;
    }

    $link = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    URLCheck($link);

    ?>

  </div>

</body>

</html>