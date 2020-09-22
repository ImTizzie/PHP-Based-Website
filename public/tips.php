<html>

<head>
  <title> Project 1: Tips </title>
 
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
Tips for Coding
</p>

<p class = "sub">
Helpful advice to tackle your next programming assignment
</p>

<p class = "text">
After almost four years at Texas A&M's Computer Science program, having to learn a completely 
new language (or two) for a single project is just another part of the degree plan. In our 
Programming Studio course, we received a PHP/CSS/HTML programming assignment to create a fully-
functioning website while implementing additional features that would be intermediately checked 
prior to the final submission.
</p>

<p class = "text">
Of course, all of this needed to be done alongside a game jam, ongoing semester-long game development,
two computer graphics assignments, a career fair, and a national conference. Not to mention the
fact that I had no previous experience in PHP and only a slight bit of HTML/CSS from high school. I
would have to be efficient with my coding techniques and great at time management, leading to me
using a couple of tricks and tips I learned over the years and picking up a couple of new ones.
</p>

<p class = "sect"> Learn as you go </p>
<p class = "text">
With no prior knowledge of PHP, I had two options: I could utilize internet resources and online courses
to learn PHP for a couple of days and then begin coding my program OR I could just start coding. And
although it sounds counter-intuitive, coding without any knowledge of the language is actually a great
way to simultaneously learn and develop in the language. Anytime you need to do something, you can
search documentation or online resources, obtain the information necessary, and continue coding until
you need something else. This process (at least, personally) allows you to cut the time necessary to
learn a language by removing unnecessary information and only providing assistance with the things
you need to extract from a language, all while gaining first-hand experience with it. This
development process was incredibly useful in getting my intermediate features up and running before
the deadline and I highly recommend this learn-and-code cycle.
</p>

<p class = "sect"> Refer to the documentation </p>
<p class = "text">
Although it may seem like instinct at times to click on a link to Stack Overflow in order to figure
out how to utilize certain tools or perform certain actions with a programming language, I highly
encourage the use of official documentation to reach your desired goal. It's easy to get sidetracked
or be misled with Stack Overflow's questionable convoluted "answers" that can confuse or give an
alternate solution that might not work for your specific situation. Because of this, official
documentation is critical to understand the building blocks of a language, especially when it
includes examples of use and a navigation system that allows for easy searching of features.
</p>

<p class = "sect"> Test your code frequently </p>
<p class = "text">
There is nothing worse than having your program break after writing code for a prolonged period
of time, slowing down development with bug-fixes that could have been avoided with consistent
testing. Ensure that you run your program after every couple of minutes of writing code to immediately
iron out any bugs you may find before adding additional code and features. No programmer is above
testing code consistently, so regardless of your skills, testing will always result in a much
lower development time due to a reduction in the amount of time spent debugging code.
</p>

<p class = "sect"> Ensure features are independent </p>
<p class = "text">
When working on a project with multiple moving parts, it's critical to reduce the dependency of features
on one another, so that everything functions independently. Ensuring that your code remains modular
allows you and other developers to work on portions of code and other features without impacting
the functionality of other code portions/features. Not only that, but modularity also tends to improve
code readability and ease of access by shrinking the scope of your code to a much more digestible extent.
Always aim to organize your code in such a way where your work in one area won't affect your work in another.
Your body and mind will thank you.
</p>

<p class = "sect"> Get feedback </p>
<p class = "text">
Although this may not always be possible with independent coding projects and/or assignments, it's always
a great idea to have an extra pair of eyes look over your code. It's easy to get caught up in the process
of development and not see possible readability issues or even certain implementations that aren't as
effective as perviously expected. With another person reviewing your code, you can likely find more
effective ways to implement other features, as well as ensure that your code can be understood by other
developers (or even yourself, two months later). Always try to take advantage of your other programmer
buddies to optimize your code!
</p>

</div>

</body>

</html>