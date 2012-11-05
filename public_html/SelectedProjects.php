<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>COMP 523 Fall 2011: Projects</title>
      <link href="style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <?php include("header.php"); ?>
      <div class="container">
<!-- ChemoText -->
	 <h2>A. Nancy Baker, ChemoText on the Web</h2>
	 <p>
	    Information describing the relationships between chemicals, proteins, and disease 
	    is absolutely central to drug research.
	    We at the UNC School of Pharmacy have developed a database called ChemoText that is 
	    designed to meet the critical information needs of drug and biomedical researchers 
	    by pulling chemicals, proteins, and diseases from the full scope of the biomedical literature. 
	    The goal of this software development project is to implement a web front-end to this 
	    MySQL database that will allow researchers world-wide to browse the data, 
	    look for fruitful connections, and to download the data for computational experiments.
	 </p>
<!-- HarktheSound -->
	 <h2>B. Gary Bishop, Off-Line Hark the Sound</h2>
	 <p>
	    The goal is to make our HarkTheSound.org browser-based games work when the user's 
	    computer is disconnected from the network. 
	    The games are written in Javascript using HTML5. 
	    The team shouldn't have to touch any of that. 
	    But the games use some RESTful resources from our server (speech and data). 
	    I can see two ways to attack this.</p>
	    <ol>
	       <li>
		  Use the exciting new features of HTML5 to make it work offline. 
		  The new Kindle Cloud web app is a good example of this. 
		  This is the technology of choice.
	       </li>
	       <li>
		  Make a small version of our server that runs on the user's computer. 
		  Instead of connecting to HarkTheSound.org they connect to local host. 
		  This is certainly doable. 
		  Lots of the existing server code could be directly used. 
		  This is the fallback position.
	       </li>
	    </ol>
	 </p>
<!-- iRODS -->	 
	 <h2>E. Leesa Brieger, iRODS Data Management Interface</h2>
	 <p>
	    iRODS is a data management system developed by the DICE group at UNC and UCSD 
	    and supported by RENCI at UNC. 
	    This technology has been developed in close collaboration with user communities 
	    and is in production in diverse, data-centric organizations such as the 
	    Bibliotheque Nationale de France, the Australian Research Collaboration Service (ARCS), 
	    and the Canadian Astronomy Data Centre. 
	    In the United States, NASA and NOAA are exploring the development of custom service 
	    modules to specialize the iRODS data grids to their particular requirements.
	    The power of iRODS is that it provides a customizable infrastructure that allows 
	    the implementation of specific data policy. 
	    However, its use has been largely restricted to organizations with substantial in-house IT support; 
	    the need is great to make the technology more widely accessible via user-friendly interfaces 
	    that reduce the IT barrier. 
	    This project would consist of the development of a show-case data grid and specialized services, 
	    presented through a user-friendly GUI interface. 
	    The goal is to allow RENCI to demo the capabilities of the iRODS technology, 
	    even to data specialists who are not IT experts, 
	    and thereby make the technology accessible to new data-oriented communities. 
	    The project will require knowledge of C, Java, and some PHP; 
	    it will be necessary, over the course of the semester, 
	    to learn about iRODS data grid administration and the Java-based Jargon library of iRODS services.
	 </p>
<!-- APPLES -->	 
	 <h2>F. Carolyn Byrne, APPLES</h2>
	 <p>
	    The APPLES Service-Learning Program serves nearly 2500 students annually through 5 program areas. 
	    Two of our programs that reach the most students utilize an outdated Access database that was 
	    custom built to fit our needs and has been added on to over the last 6+ years. 
	    This database needs to serve three audiences:
	    <ul>
	       <li>
		  Community Partners:
		  <ol>
		     <li>Maintain an organization profile</li>
		     <li>Submit volunteer requests</li>
		     <li>Submit and review internship applications</li>
		  </ol>
	       </li>
	       <li>
		  APPLES Staff:
		  <ol>
		     <li>Make connections between volunteer requests and s-l courses</li>
		     <li>Run reports</li>
		     <li>Review internship applications of nonprofits and students</li>
		  </ol>
	       </li>
	       <li>
		  Students: Submit internship applications
	       </li>
	    </ul>
	 </p>
	 <p>
	    Currently the system does some of these things well but it is difficult for us to make changes, 
	    updates and we'd like to streamline the process, unify the language and improve the appearance 
	    of the system. 
	    We are open to any platform as we understand that there are newer technologies than Access 
	    for these types of systems.
	 </p>
<!-- Reesenews -->	 
	 <h2>G. John Clark, Reesenews Mobile App</h2>
	 <p>
	    Reesenews.org is the digital news publication powered by students at the 
	    University of North Carolina at Chapel Hill School of Journalism and Mass Communication. 
	    It is an experimental, research-driven news project seeking to innovate the field of digital 
	    journalism by expanding conventional print and photojournalism, interactivity and social media. 
	    We want to develop a mobile application that can do the following:
	    <ol>
	       <li>
		  Display information from articles that include, but are not limited to, 
		  text, images, photos, audio and video
	       </li>
	       <li>
		  Create user tools that tie into the device's email and camera. 
		  We want to give users to the ability to easily submit content to us through the application.
	       </li>
	       <li>
		  Dynamic menu structure that can easily be changed by reesenews.
	       </li>
	       <li>
		  The ability to link through (embed) web pages in the application when necessary.
	       </li>
	       <li>
		  Alert functions that pop-up even if the user is not running the application.
	       </li>
	       <li>
		  Integrate with our analytics system to track usage patterns.
	       </li>
	       <li>
		  Support advertising delivery systems.
	       </li>
	    </ol>
	 </p>
	 <p>
	    Ideally, we would like the application developed for iOS and Android. 
	    If only one can be accommodated, we'd like to build it in such a way that allows us to easily port 
	    to the other. 
	    iOS is the preferred platform.
	 </p>
<!-- Sqord -->	 
	 <h2>L. Coleman Greene, Sqord</h2>
	 <p>
	    Sqord is a health e-gaming company aiming to make physical activity addictive for kids by creating 
	    a fun and competitive social gaming world where points can be earned for real-world play. 
	    Initially, the company will launch a watch based accelerometer that integrates with an 
	    interactive social network to track activity for points, gift cards, 
	    virtual goods and other online rewards. 
	    A participant in RENCI's Carolina Launch Pad and Durham's Startup Stampede 2.0, 
	    Sqord recently completed their first four week pilot with 18 Durham 11-12 year olds 
	    using devices (Chronos ez430) provided by Texas Instrument. 
	    In addition to valuable qualitative and quantitative data points, 
	    the pilot provided an opportunity to refine the initial prototype before the company's next 
	    pilot with the Chapel Hill-Carrboro YMCA and Capitol Area Soccer League (CASL) this fall. 
	    As part of next steps, Sqord is looking for a talented team of developers that can help build 
	    a more sophisticated game design that would include visuals, control/rewards systems, 
	    game mechanics, and other key social gaming components. 
	    We will also explore options for our mobile strategy so that users can sync devices 
	    to access basic fitness and game information via smart phone, tablets, PC, etc. 
	    We currently have a backend developer building the network and database in Java, 
	    which includes novel recommendation algorithms for optimized user engagement.
	 </p>
<!-- Reburse -->	 
	 <h2>M. Paul Hiatt, Reburse Mobile</h2>
	 <p>
	    Reburse is a cutting-edge financial management system built for students like you to help 
	    manage group finances. 
	    As a member or leader of a student organization, you no longer have to worry about how 
	    much money your group has, where it went, who spent it, etc. 
	    Digitization and automation make reimbursements fast, and the application even allows 
	    groups to raise money online easily through their Reburse portal. 
	    A stellar team from COMP 523 built the original prototype last year, 
	    and this fall we will launch the beta web app at UNC as well as a select group of other 
	    university partners. 
	    While we are refining the application, we are looking to develop a mobile offering to 
	    take this venture to the next level. 
	    Picture this: 
	    You drop $50 on party supplies for the CS Club. 
	    Instead of safeguarding the receipt and hoping it doesn't get lost along the way 
	    while a reimbursement check navigates its way back to you (hopefully) sometime 
	    over the next few weeks, you snap a picture of the receipt on your phone 
	    and within a few hours you have the reimbursement safely back in your bank account. 
	    After the beta we will scale nation-wide, and a sexy mobile app will make it hard 
	    for universities to say no. 
	    Reburse is built in Ruby on Rails--familiarity is a plus but not necessary. 
	    We will decide the best mobile format (iOS, Android, web-based, etc.) as a team. 
	    You will work mostly with Rebecca Crabb and Blaine Stancill, 
	    two former 523 rockstars who joined Reburse as co-founders.
	 </p>
<!-- Web log -->	 
	 <h2>O. Hye-Chung Kum, Web log analysis for dynamic pages</h2>
	 <p>
	    Understanding navigational patterns is crucial for any web design. 
	    There are many tools that work well in giving statistics for visitor information 
	    for static html pages such as google analytics
	    (<a href="http://www.google.com/analytics/">http://www.google.com/analytics/</a>). 
	    But most do not work well with dynamic webpages where the full URL has variations 
	    that should be ignored at times. 
	    I would like to build a smart weblog analysis tool that can give detailed statistics 
	    on visitor information for SAS/IntrNet programs so that we can understand how social workers 
	    are using the "Management Assistance Website" 
	    (<a href="http://ssw.unc.edu/ma/">http://ssw.unc.edu/ma/</a>). 
	    This would allow us to study the web usage behavior of social workers to better design the website. 
	    Your work will improve how social welfare is implemented at DSS. 
	    You will also be working on technology for next generation of google analytics 
	    that can intelligently track dynamic websites!
	 </p>
<!-- Insight -->	 
	 <h2>Q. Bill Lahti, Insight Tracker prototype</h2>
	 <p>
	    Duke Corporate Education (DukeCE) designs and delivers education programs for large corporations. 
	    The typical program is a 2-4 day event, consisting of half-day sessions covering topics that will 
	    help a company pursue some aspect of their overall strategy. 
	    Participants in a DukeCE program are usually from a single company, 
	    but often from different business units in the US or around the world. 
	    The project is to build a prototype Android app that makes it easy for program participants 
	    to share ideas and comment on them while they are attending a program.
	    <ul>
	       <li>
		  People contribute notes, photos, and short videos to illustrate their ideas 
		  or to add to ongoing discussion.
	       </li>
	       <li>
		  People make connections to other people in the process of sharing their ideas.
	       </li>
	       <li>
		  Instructors in the program access the information submitted, 
		  in order to make a connection between the general topics and the specific problems 
		  the company is experiencing.
	       </li>
	    </ul>
	 </p>
	 <p>
	    In some situations, the app will be used in conjunction with a brainstorming session. 
	    Unlike a classroom brainstorming session, people do not have to be together at the 
	    same place and time to contribute ideas. 
	    Program participants are high level managers with limited attention and little inclination 
	    to use technology. 
	    The key challenge is getting people to use the app and see benefits. 
	    Software platform for this project: Android 2.2
	 </p>
<!-- 404 -->	 
	 <h2>U. John Reuning, 404 error translation Wordpress plugin</h2>
	 <p>
	    The ibiblio.org 404 error page 
	    (<a href="http://www.ibiblio.org/404/404.html">http://www.ibiblio.org/404/404.html</a>) 
	    appeals to a wide audience and lists the message "page not found" in hundreds of translations. 
	    Represented languages include the typical European and Asian varieties 
	    (French, Spanish, Chinese, etc.), as well as the esoteric and bizarre (Zombie, Wookie, binary). 
	    Enthusiastic translators submit new variations on a regular basis. 
	    This project's goal will be to design and implement a Wordpress plugin to manage and 
	    display 404 error translations. 
	    Users can submit translations and vote on others' submissions. 
	    A site administrator can search and browse the translations, see rankings, 
	    and approve or reject submissions. 
	    The 404 display page pulls a random subset from a pool of top-rated translations. 
	    Wordpress is PHP/MySQL. 
	    Successful implementation will lead to submission to the Wordpress plugin directory.
	 </p>
<!-- BitTorrent -->	 
	 <h2>V. John Reuning, Real time monitoring and visualization for BitTorrent server</h2>
	 <p>
	    ibiblio is developing a file and data publication system targeting objects and 
	    collections over 250 MB in size. 
	    Examples include live music recordings (1 GB each), drive images for teaching computer
	    forensics (1 TB total), and a data set of web page links and interconnections (8 TB). 
	    File transfers take place using the popular peer-to-peer protocol, BitTorrent. 
	    ibiblio's BitTorrent server produces statistics and metrics on connected clients, 
	    transfer rates, etc. 
	    The goal of this project will be an application that displays metrics and renders graphs in real time.
	    The application must work cross-platform. 
	    A Java client or applet would be appropriate, but other suggestions are welcome. 
	    Data from the server is available via a message queue (e.g. RabbitMQ or ZeroMQ). 
	    An ambitious team could also include sending commands back to the server.
	 </p>
<!-- Allergy App -->	 
	 <h2>Y. Brian Serow and Alex Carberry, Allergy App</h2>
	 <p>
	    We would like to compile a user facing application for mobile devices that allows people 
	    to search restaurant menus and filters out any dishes that has ingredients that they are allergic to. 
	    The application should be energy efficient, easy to use, fast, and have the ability 
	    to connect to a remote SQL database that it populates its data from. 
	    Eventually, we would like to build on this idea even further, 
	    so the application should also allow for easy additions and code expansion. 
	    Although we envision this application being developed for the Android OS using JAVA, 
	    we are open to any suggestions that you might have. 
	    Including the creation of an iPhone application. 
	    Any and all necessary development tools will be provided to you.
	 </p>
      </div>
      <div id="footer">
      </div>
   </body>
</html>