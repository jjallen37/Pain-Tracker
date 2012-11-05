<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>COMP 523 Fall 2011 Checklist</title>
      <link href="style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <?php include("header.php"); ?>
      <div class="container">
	 <h2><a name="top">Final Deliverables</a></h2>
	 <p>
	    Links or direct information to all
	    of the following are to be in an easily identified section
	    on the first page of your web site.
	    I have only two days to grade the final projects and searching
	 </p>
	 <ul>
	    <li><a href="#func">Functional Spec</a></li>
	    <li><a href="#des">Design Doc</a></li>
	    <li><a href="#user">User Manuals</a></li>
	    <li><a href="#test">Test Plan</a></li>
	    <li><a href="#source">Source Code</a></li>
	    <li><a href="#exec">Executable Code</a></li>
	    <li><a href="#me">Instructions for Me</a></li>
	 </ul>
	 <h3><a name="func">Functional Spec</a></h3>
	 <p>
	    The functional spec describes <b>what you are building</b>.
	    It must include
	    <ul class="nobullet">
	       <li>use cases (those that you completed and those that are intended but not supported)</li>
	       <li>prioritized requirements</li>
	       <li>description of key interfaces (may include screenshots, APIs)</li>
	    </ul>
	 </p>
	 <p>
	    If you or your client are making it available on a repository or market,
	    the information that you want there is to be included in the functional spec.
	 </p>
	 <p>
	    If you are producing a game, the functional spec should include the
	    key components of a game spec.
	    These are
	    <ul class="nobullet">
	       <li>
		  overview: this includes
		  <ul class="nobullet">
		     <li>the basic concept</li> 
		     <li>target audience</li>
		  </ul>
	       </li>
	       <li>
		  gameplay, which includes
		  <ul class="nobullet">
		     <li>game flow</li> 
		     <li>mechanics and objects</li> 
		     <li>levels</li> 
		     <li>winning or scoring</li> 
		  </ul>
	       </li>
	       <li>
		  backstory, setting, and characters
	       </li>
	    </ul>
	 </p>
	 <p><a href="functional_spec.php">Further detail</a></p>
	 <p><a href="#top">Top</a></p>
	 <h3><a name="des">Design Doc</a></h3>
	 <p>
	    The design document describes <b>how you built it</b>.
	    If a team picks it up next year and you are not here,
	    they should be able to get into the code through this document.
	    It must include
	    <ul class="nobullet">
	       <li>architecture picture and paragraph description</li>
	       <li>decomposition: the description of the key components</li>
	       <li>key design decisions</li>
	       <li>pointers to code and other useful documents</li>
	    </ul>
	 </p>
	 <p>
	    If your project includes modules, functions, or classes, you must
	    include your interfaces. 
	    Use a tool such as javadoc to generate; do not generate them manually.
	 </p>
	 <p>
	    If your project includes a web design using MVC, include the
	    information about what pages trigger what actions.
	    If you have a tool to generate this, use it.
	    Do not, however, expect the reader to read a framework's code.
	 </p>
	 <p>
	    If your project includes a database, you must include the schema.
	 </p>
	 <p><a href="design_doc.php">Further detail</a></p>
	 <p><a href="#top">Top</a></p>
	 <h3><a name="user">User Manuals</a></h3>
	 <p>
	    User manuals tell people <b>how to use it</b>
	    If your documentation is help files or "read me"s,
	    yousimply need to tell me that.
	    You do not need to cut and paste material.
	 </p>
	 <p><a href="manuals.php">Further detail</a></p>
	 <p><a href="#top">Top</a></p>
	 <h3><a name="test">Test Plan</a></h3>
	 <p>
	    The test plan describes <b>how it should be tested (and how you tested it)</b>.
	    If you say you tested it, I assume it will work.
	    Tell me what the limitations are (e.g., only works on Windows 7, Firefox, ...)
	    or I will assume that it runs and can be tested anywhere.
	 </p>
	 <p><a href="testplan.php">Further detail</a></p>
	 <p><a href="#top">Top</a></p>
	 <h3><a name="source">Source Code</a></h3>
	 <p>
	    Modules should have comments at the start that cover
	    <ul class="nobullet">
	       <li>what it does</li>
	       <li>who wrote it and modified it and when</li>
	       <li>key concepts and algorithms used</li>
	    </ul>
	 </p>
	 <p>
	    Comments should clearly 
	    identify key sections and any non-intuitive techniques that are used.
	 </p>
	 <p>
	    You should not be needing or using line-by-line comments except in
	    especially complex places
	 </p>
	 <p>
	    The code should be stylistic consistency.
	    It is a single program and should be able to be read as such.
	    This is why we wrote team rules.
	    HOWEVER, do not sweat the little stuff.
	    If one person used more spacing than another, I don't care.
	    I do care when the inconsistencies make it hard to read.
	 </p>
	 <p><a href="development.php#Code">Further detail</a></p>
	 <p><a href="#top">Top</a></p>
	 <h3><a name="exec">Executable Code</a></h3>
	 <p>
	    Generally, I should only need to know where to find it.
	    The user manual should tell me the rest.
	    If, however, your system was not intended to be installed
	    more than once and I need to install it, you will need to give
	    me additional directions.
	    Be sure to tell me what software (including versions) I need.
	 </p>
	 <p><a href="#top">Top</a></p>
	 <h3><a name="me">Instructions for Me</a></h3>
	 <p>
	    Besides any instructions to get up and running (see above),
	    you need to give me anything additional that I might need:
	    ids, passwords, ...
	    Remember that I need to be able to take on every role
	    (admin, public user, logged in user, ...)
	    I may test on any platform that you claim to run on,
	    so be sure to be specific in your test documentation.
	 </p>
	 <p>
	    I will be testing on Tuesday and Wednesday.  
	    I need a minimum 2-hour window from every team between 8 am and 6 pm
	    on one of those days when there is someone "on call".
	    I need the name, the time they will be available, and how to contact
	    them.
	    Without this, if I run into a problem, the only assumption that I
	    can make is that the function -- or the whole project -- does not
	    work.
	    You don't want me making that assumption.	    
	 </p> 
	 <p><a href="#top">Top</a></p>
      </div>
      <div id="footer">
      </div>
   </body>
</html>
