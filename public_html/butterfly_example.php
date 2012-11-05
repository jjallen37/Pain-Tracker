<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>COMP 523 Fall 2011: Use Case Example</title>
      <link href="style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
        <?php include("header.php"); ?>
        <div class="container">
            <h1>Use Cases</h1>
            <h2>Use Cases Example: Butterfly Lab</h2>
            <h3>Student Use Cases</h3> 
            <p> 
                The student is a person who will be using the application to perform measurements on various wing traits.
                These measurements will produce output that will be incorporated into a lab report. 
            </p> 
            <ul> 
                <li>
                    Student views information concerning the background and execution of the lab. 
                    <ul> 
                        <li>
                            The student is presented with html lab material packaged with the application.(provided by the client).
                            Part of the material should be the presentation of wing images for users to determine a trait to measure.
                            The lab material should always be available. 
                        </li> 
                        <li>Has the option to start a new lab.</li> 
                        <li>Secondarily, has the option to continue an incomplete lab.</li> 
                    </ul> 
                </li> 
            </ul> 
            <ul> 
                <li>
                    Student selects wing surface and the type of measurement that they wish to make. 
                    <ul> 
                        <li>
                            The student will choose an available measurement type.
                            Currently, only &ldquo;distance&rdquo; will be available. 
                        </li> 
                        <li>
                            The student will choose a wing surface to measure:
                            combination of dorsal or ventral and fore or hind wing. 
                        </li> 
                        <li>The student performs a sample measurement on a &ldquo;cartoon&rdquo; wing.</li> 
                    </ul> 
                </li> 
                <li>Student performs the measurements.
                    <ul> 
                        <li>
                            The student performs the measurement for at least 10 families,
                            each family being 2 parents + 2 offspring, of wings. 
                            <ul> 
                                <li>
                                    For distance, they will click 4 points/pixels in sequence.
                                    The first two will measure wing size (text or graphic provided by the client
                                    will indicate what the student should click).
                                    The last two will be the length of the  trait that they wish to measure. 
                                </li> 
                            </ul> 
                        </li> 
                    </ul> 
                </li> 
                <li>Student retrieves results as one of CSV or Excel. 
                    <ul> 
                        <li> A file dialog should be used to allow the user to select an output path.</li> 
                    </ul> 
                </li> 
            </ul> 
            <h3>Professional Use Cases</h3> 
            <p> 
                The professional is a person like the client and her colleagues.
                This person would like the same functionality as the student.
                Additionally, they would like the ability to use their own images.
                Also, this person would like the application to perform the statistics.
                It should be noted that the professional use case is a secondary requirment.
            </p> 
            <ul> 
                <li>
                    Professional indicates location of their images. 
                    <ul> 
                        <li>
                            Using a set of &ldquo;image providers&rdquo;
                            can allow professionals to indicate the location of their wing images and metadata
                            (the data about the wing such as dorsal/ventral, fore/hind, left/right, family, parent, offspring, etc). 
                        </li> 
                    </ul> 
                </li> 
                <li>Professional views statistics and/or regression.</li> 
            </ul> 
            <h3>Common Use Cases</h3> 
            <ul> 
                <li>
                    User installs application:
                    Either the student or professional(researcher) can install the application from the web.
                    The application is deployed via Java Webstart.
                    This means that the user will click a link on the webstart web page.
                    This will deploy the application and run it on the user&rsquo;s local machine.
                    Webstart will give them the opportunity to create a link on their desktop for quicker access to the application.
                    Java provides a webstart client that can be used to launch or undeploy the application.
                    Furthermore, webstart will download a new version when it is put on the webstart server.
                </li> 
            </ul> 
        </div>
        <div id="footer" />
    </body>
</html>
