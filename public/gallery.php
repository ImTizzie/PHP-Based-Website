<html>

<head>
  <title> Project 1: Gallery </title>
 
  <!--Default styles have been used, with little to no alterations.-->
  <style>
    div.defaultFont {
        font-family: Helvetica, Arial, sans-serif;
    }
    
    div.secondaryFont {
        font-family: serif;
    }

    .title {
      text-align: center;
      max-width: 728px;
      margin-left: auto;
      margin-right: auto;
      line-height: 42px;
      margin-top: 0.56em;
      font-family: Georgia, Cambria, "Times New Roman", Times, serif;
      font-size: 34px;
      margin-bottom: -0.27em;
      font-style: normal;
      letter-spacing: 0;
      color: rgba(41, 41, 41, 1);
      font-weight: 400;
    }

    .sub {
      text-align: center;
      max-width: 728px;
      margin-left: auto;
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

    .text {
      max-width: 728px;
      margin-left: auto;
      margin-right: auto;
      font-size: 18px;
      letter-spacing: -0.003em;
      line-height: 28px;
      margin-top: 1.56em;
      margin-bottom: -0.46em;
      font-family: Georgia, Cambria, "Times New Roman", Times, serif;
      font-size: normal;
      color: rgba(41, 41, 41, 1);
      font-weight: 400;
    }

    .isub {
      text-align: center;
      font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Arial, sans-serif;
      margin-left: auto;
      margin-top: 10px;
      font-size: 16px;
      color: rgba(117, 117, 117, 1);
      max-width: 728px;
      margin-right: auto;
      line-height: 20px;
      font-weight: 300;
    }

    .sect {
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
	include 'proc_gallery.php';
  include 'proc_csv.php';
?>

<form action="" method="POST" style="text-align: center;">
<select name="file" id="file">
  <option value="dat-doublequote-bar.csv">dat-doublequote-bar</option>
  <option value="dat-doublequote-comma.csv">dat-doublequote-comma</option>
  <option value="dat-doublequote-tab.csv">dat-doublequote-tab</option>
  <option value="dat-doublequote-tab.csv">dat-singlequote-tab</option>
  <option value="dat2-doublequote-colon.csv">dat2-doublequote-colon</option>
  <option value="dat2-doublequote-comma.csv">dat2-doublequote-comma</option>
  <option value="dat2-doublequote-tab.csv">dat2-doublequote-tab</option>
  <option value="dat2-singlequote-tab.csv">dat2-singlequote-tab</option>
</select>

<select name="delim" id="delim">
  <option value="|">Bar</option>
  <option value=",">Comma</option>
  <option value="\t">Tab</option>
  <option value=":">Colon</option>
</select>

<select name="quote" id="quote">
  <option value="\"">Double Quote</option>
  <option value="'">Single Quote</option>
</select>

<input type="text" name="columns">

<input type="submit" name="csvFile" />
</form>

<br><br><br>

<form action="" method="POST" style="text-align: center;">
<select name="organization" id="organization">
  <option value="list">List</option>
  <option value="matrix">Matrix</option>
  <option value="details">Details</option>
</select>
<select name="order" id="order">
  <option value="orig">Original</option>
  <option value="size_smallest">From Smallest</option>
  <option value="size_largest">From Largest</option>
  <option value="date_oldest">From Oldest</option>
  <option value="date_newest">To Newest</option>
  <option value="rand">Random</option>
</select>

<input type="submit" name="images" />
</form>

<?php
  if(array_key_exists('images', $_POST)) { 
    proc_gallery("gallery-test-file.csv", $_POST['organization'], $_POST['order']);
  }
  if(array_key_exists('csvFile', $_POST)) {
    if($_POST['columns'] === "") {
      echo "<p class = \"sect\" style = \"text-align: center;\">Error! Input columns!</p>";
      echo "<p class = \"isub\">Examples: ALL , 1:2:3 , 3:1 , 2:4 , 1</p>";
    } else {
      proc_csv($_POST['file'], $_POST['delim'], $_POST['quote'], $_POST['columns']);
    }
  }

?>

</div>

</body>

</html>
