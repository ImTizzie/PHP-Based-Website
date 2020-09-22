<html>

<head>
  <title> Project 1: Resources </title>
 
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
  include 'proc_wikitext.php';

  #Simply obtains the returned HTML string from the function and fires it back.
  $htmlString = proc_wikitext("wikitext.wiki");
  echo $htmlString;
?>

</div>

</body>

</html>