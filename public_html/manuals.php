<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>COMP 523 Fall 2011: User Manuals</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include("header.php"); ?>
        <div class="container">
            <h1>User Manuals</h1>
            <p>
                There may be any number of user manuals and they may be of different forms.
                The specific number depends on the types of users that you have,
                the functions that are required, the audiences, and the format of the manuals.
                The requirment is that all types of users of the system, including administrators,
                have access to the the information that they need to run the system.
                There are typically at least two different types of manuals, the <a href="#User">user manual</a>
                and the <a href="#Admin">administrator manual</a>, which are further described here.
                These are, however, not the only model that may exist.
            </p>
            <p>
                There was a time when every system required a "real" manual:
                a paper document that users could pick up, read, and reference
                as needed.
                This is rarely the case any more.
                It does not mean that users don't need assistance;
                they now get it differently.
                The more graphical interfaces taht we use, the less we need to
                describe the inputs;
                the more we do graphically, the more likely that we will provide the
                needed information on a "when needed" basis.
            </p>
            <p>
                Given these changes, the task of writing user manuals becomes one
                of identifying the needs of your users and deciding how best to
                meet those needs.
                Everyone, therefore is required to produce a <i>User Manual Plan</i>.
                This can be a brief document that should outline who your users are.
                what documentation they will need, and how you will provide it for
                them (with an explanation of why this is appropriate).
                In general, this information may be provided through
            </p>
                <ul>
                    <li>manuals</li>
                    <li>read me files</li>
                    <li>help screens</li>
                    <li>intro screens</li>
                    <li>mouseovers</li>
                    <li>text on screens</li>
                    <li>FAQs</li>
                    <li>wizards</li>
                </ul>
            <p>
                There are probably other options as well.
            </p>
            <p>
                If there is text that you are writing for any of these forms,
                you should produce a first draft of that text for this deliverable.
            </p>
            <p>
                The information for the user and administrator manual below should
                be considered background information that will help you produce
                the correct TYPE of information regardless of the form it takes.
            </p>
            <!-- User Manual -->
            <h2><a name="User">User Manual</a></h2>
            <p>
                The user manual is a document that is intended for the users of the system.
                If there are different types of users, there
                minimally must be different sections for them.
                The manual needs to be written at an appropriate level for the intended audience.
                If the user is a reluctant computer user, the manual should be very specific and
                avoid jargon.
                This is not necessary for someone who is more comfortable with computers.
                The skill level of the user should be defined in your user descriptions.
                For applications intended for very young users,
                think of the user manual as the document that the teacher will need to interpret.
                The closer that you can get to the teacher being able to
                simply read the manual to them, the more on target the writing is.
                Remember that users are not very tolerant of long-winded documents.
                Get the essential information written up front.
                If there is more detail needed for special cases, put it in a separate section.
                Of course the goal is that no one ever has to read a user manual, but you should not
                assume that it is that intuitively obvious!
                For most school-related projects, there will be two users:
                the student and the teacher.
                Do not assume that the teacher is the administrator.
                While in some cases this may be true, you need to separate the roles.
            </p>
            <!-- Administrator Manual -->
            <h2><a name="Admin">Administrator Manual</a></h2>
            <p>
                The administrator manual is intended for the person setting up the system.
                This needs to include all software and
                hardware dependencies, download instructions, and any hardware set-up instructions.
                This is the place to document what systems have been
                tested, what the expected compatabilities are and any known incompatabilities.
                If the administrator needs to set up ids and
                passwords before the system is fully deployed, this needs to be covered in this manual.
                The administrator manual should include a complete set
                of easy-to-follow instructions of how to deploy the system in a new
                environment or how to redeploy the system if it needs to be restarted or refreshed.
                You again need to be cognizant of the skill level of the administrator.
                You can assume that it is an adult, but given the
                intended audience, you must determine the appropriate level of skills that you can assume.
                This again should be defined in your user descriptions.
            </p>
        </div>
        <div id="footer" />
    </body>
</html>
