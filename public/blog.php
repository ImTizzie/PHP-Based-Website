<html>

<head>
  <title> Project 1: Blog </title>
 
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
?>

<p class = "title">
Learning While Crashing and Burning
</p>

<p class = "sub">Author: Xchel Diaz<br>UIN: 826008447</p>

<p class = "sect">1. Introduction </p>
<p class = "text">
Over the span of around a month, I developed the entirety of this site as a class project for my Programming Studio course at Texas A&M University. All of its features and processing functions were developed intermittently during the duration of the site’s creation, as required by the project guidelines. Although the development of this somewhat large project was both time-consuming and arduous, it was creatively unrestricted and allowed for unique problem-solving algorithm implementation and a new language (or two).
</p>

<p class = "sect">2. New Skills I Learned </p>
<p class = "text">
I often use language-unrestricted projects as excuses to learn a new language, sometimes to make things easier and other times to make things a bit more interesting. However, large scale projects are usually the ones that I ensure are developed with a programming language that I am very familiar with. So when I was thrown into the fire with an assignment that required PHP, HTML, and CSS, three completely foreign languages to me, I understood that although I would very likely struggle for the first two weeks, I would come out on top with the knowledge and understanding of three additional languages. PHP was easy to pick up within the first couple of days due to programming experience, but HTML and CSS took just a bit longer to grasp, understanding more of the languages as I continued to develop.
With the constant parsing required by the first two assignments for this project, one which was to develop a processor for a CSV file, and the other being a processor for a wikitext document, it was apparent that standard parsing would be both time consuming and absolutely abhorrent in terms of code “prettiness”. Through the Piazza forums, our professor communicated to us that we could implement the necessary parsing as desired, but that it would be beneficial to utilize regex. I dabbled with regex in a previous course out of necessity, but to say that I understood it well or even a little bit, would be overly generous. Naturally, my first reaction was to ignore the advice and deal with the parsing issue manually, but I had to swallow my pride and resort to learning sufficient regex in order to make use of PHP’s splitting function. Although the process was slow and ugly initially, over the course of development, my understanding of regular expressions improved and I was able to successfully parse strings as necessary. 
</p>

<p class = "sect">3. Major Challenges </p>
<p class = "text">
I usually have very little issues simultaneously learning and developing while working on smaller programs. However, for this project, I found myself struggling to not only figure out how the code was to be implemented, but also how to even set the necessary files up to get the example code running as intended. After struggling for a couple of days to develop efficiently in Infinityfree, I decided to try out Docker, finding it much easier to write and test my code, all while having a much more intuitive setup.
The first code-related difficulty I encountered was figuring out how to parse a file and obtain the portions that I needed. I struggled for several hours before having to succumb to learning more about regular expressions, which took around the same amount of time before I had a somewhat clearer understanding of it. Throughout the project, I was able to refine my regular expressions to more easily obtain the necessary data, allowing me to quickly finish the wikitext processor, gallery, and search functions.
The next issue I faced was one I didn’t even know I was experiencing: understanding how PHP, HTML, and CSS interacted with one another. For the first half of the project, I used PHP and HTML somewhat interchangeably, as I switched between them whenever I needed to print something or run a function. For the second half though, the more advanced functions like Search and the Wikitext Processor required me to understand how the languages were utilized in order to clean my code up and organize everything in such a way that my code could function. Because of this, my later code was clearly formatted and organized for functionality and ease of access for implemented functions, while my initial code was disorganized and cluttered.

</p>

<p class = "sect">4. Assessment </p>
<p class = "text">
In all honesty, I learned a whole lot regarding the unique methods of achieving a goal through programming. Reading forum posts on Piazza regarding implementations that other students have used make me realize how different my method for processing .csv files, .wiki files, and other functions are. There’s a significant amount of creativity, logic, and problem-solving skills in play when it comes to large projects like this that require every feature to be meticulously developed.
The more enjoyable parts of the project were the search, .csv file processor, gallery processor, and the design portion of the website. The processors were enjoyable primarily due to the limited scope that allowed for easy testing and implementing. Once I began to understand regular expressions, parsing the files for the necessary data became much easier and gave me a deeper understanding of the PHP language (which would prepare me for the more difficult portions of the project). The search was fun to implement because of the weird problems that needed to be avoided for a successful display of a standard page with highlights, leading to some interesting solutions. The design was just a great break from the hardcore problem-solving aspects that the entirety of the site was focused on. It’s incredibly relaxing to see HTML and CSS code function immediately without issues and seeing a visible output after spending many hours working with PHP and not seeing the results you need.
</p>

<p class = "sect">5. Conclusion </p>
<p class = "text">
All in all, this project has been enjoyable and incredibly satisfying to see functioning correctly after so many hours of coding and debugging. Not only was I able to learn three different languages from the creation of this website, but I also gained an understanding of regular expression, brushed up my problem-solving skills, and now have a website that I can use to promote my projects and myself. It has been tiring, relentless, and absolutely difficult at times, but my experience with this project was worth all of the pain and effort it took to get it up and running.
If I had to redo this project sometime in the future, the first thing I would do is make sure that my code is properly organized and that functions are independent of one another in such a way that future features won’t disrupt functionality. Unfortunately, my implementation of the wikitext processor became an issue when creating the search function, as I had not planned to parse the output after processing, requiring additional modifications to the wikitext processor to allow the search to work with it. As long as I manage to maintain these two things during the development of this project in the future, debugging and adding new features becomes much easier than it was during this first run. Working with these languages at a relatively high level was a completely new experience that has prepared me for both future projects and career prospects.
</p>

<br>

<p class = "isub"> <a href = "development.txt">View development.txt</a></p>

</div>

</body>

</html>
