<html>

<head>
  <title> Project 1: Index </title>
 
  <!--Default styles have been used, with little to no alterations.-->
  <style>
    div.defaultFont {
        font-family: Helvetica, Arial, sans-serif;
    }
    
    div.secondaryFont {
        font-family: serif;
    }

    ul {
        max-width: 728px;
        margin-left: auto;
        margin-right: auto;
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
?>

<p class = "title">Xchel Diaz</p>
<p class = "sub">Computer Science student at Texas A&M University</p>

<img src = "me-in-italy.jpg" alt = "Hey! That's me!" style = "display: block; margin-left: auto; margin-right: auto; width: 250px; height: 250px; margin-top: 20px;">
<p class = "isub">Why, yes, that IS me in Italy. ;)</p>

<table class = "headerTable" style = "width: 100px;">
    <tr>
        <td>
            <a href = "https://www.linkedin.com/in/xcheldiaz">
            <img src = "linkedin-logo.png" alt = "A LinkedIn Logo" style = "width: 32px; height: 32px;">
            </a>
        </td>
        <td>
            <a href = "https://github.com/ImTizzie">
            <img src = "github-logo.png" alt = "A Github Logo" style = "width: 32px; height: 32px;">
            </a>
        </td>
    </tr>
</table>

<p class = "sect">About Me</p>
<p class = "text">
Howdy! I'm currently a 4th year student at Texas A&M University studying Computer Science.
I am expecting to graduate with my Bachelor of Science in the Fall of 2021, alongside a minor in Video Game
Design and Development and another in Cybersecurity.
</p>
<p class = "text">
I've worked on over dozens of projects during my time in the Computer Science and Engineering program, with the most
recent ones being listed down below. Because of all my coursework and personal interests, I've learned C++, C#, Java,
Python, PHP, HTML, CSS, Matlab, and Scheme over the past four years. With my current knowledge, I hope to find an
internship, gain valuable industry experience, and learn more languages.
</p>

<p class = "sect">Projects</p>
<ul>
    <li><p class = "text">Unannounced Game <i>(Unity/C#)</i></p></li>
    <li><p class = "text">PHP-Based Website <i>(PHP/HTML/CSS)</i></p></li>
    <li><p class = "text">Barebones Paint <i>(C++/GLFW)</i></p></li>
    <li><p class = "text">Dave's Cave Game Jam Prototype <i>(Unity/C#)</i></p></li>
    <li><p class = "text">Personal Linux Shell <i>(C++)</i></p></li>
    <li><p class = "text">Hierarchial Transformer <i>(C++)</i></p></li>
    <li><p class = "text">Graphics Rasterizer <i>(C++/GLFW)</i></p></li>
    <li><p class = "text">8-Puzzle Solver <i>(C++)</i></p></li>
    <li><p class = "text">Assembler/Disassembler <i>(Python)</i></p></li>
    <li><p class = "text">And more... <i>(Multiple Languages)</i></p></li>
</ul>

</div>

</body>

</html>
