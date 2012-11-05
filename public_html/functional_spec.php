<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>COMP 523 Fall 2011: Functional Spec</title>
      <link href="style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <?php include("header.php"); ?>
      <div class="container">
	<h1>Functional Specification</h1>
        <p>
            The functional specification (or spec) is a document from which a developer can develop the
            system.
            It should be complete enough that it could be used as a
            bid request out to a third party.
            Key components of the spec are <a href="#Use_case">use cases</a> and
            <a href="#Requirements">requirements</a>.
            Also included in the spec are initial definitions of all
            <a href="#interfaces">interfaces</a> to help capture the user experience.
        </p>
        <p>
            <a href="NC_eweek_web.pdf">Example</a> of a functional spec without interfaces
            (used to request bids).
        </p>
 <!-- Use Cases -->
            <a name="Use_case" /><h3>Use Cases</h3>
            <p>
               Based on <a href="User_Stories">user stories</a> and
               <a href="functional_spec.php#Personas">personas</a>
               (which are optional for this project), use cases capture the
               needed functions from the developers' view.
            </p>
            <p>
               There are two forms of use cases that are often used:
               a graphical form that
               shows how the different use cases relate to each other and a textual
               form that talks about the details of each use case.
               For your projects, the textual form is required.
               We will discuss the graphical form when we discuss
               <abbr title="Unified Modeling Language">UML</abbr>.
            </p>
            <p>
               The detailed use case needs to include error cases.
               Identifying the error and unusual
               cases is one of the most valuable parts of use cases, as designers and
               developers often miss a number of these points.
            </p>
            <p>
               Associated with each case needs to be a description of the user,
               referred to as the <i>user type</i>.
               This needs to be in enough detail to allow you to reason about the task.
               User types may or may not map to unique use cases. 
               For example, the one time user and the repeat user are
               most likely different user types.
               Depending on the interfaces, they may use the same interface.
               In this case, there will typically be an optional step of checking
               the help information.
               If they use different interfaces, they will have different use cases.
               Use cases should address all types of end users as well as administrators.
               Pay special attention to first time uses as they often have a different
               set of tasks that are being performed.
            </p>
            <p>
               Examples of Uses Cases from Prior Years:
               <ul>
                  <li><a href="butterfly_example.php">Butterfly Lab</a></li>
                  <li><a href="Language_Lab_UseCases.pdf">Foreign Language Resource Lab</li>
               </ul>
            </p>
<!-- Requirements -->
            <a name="Requirements" /a><h3>Requirements</h3>
            <p>
               The requirements document should be no more than 2 pages.
               It will be
               primarily gathered from the use cases but will also include any
               specific needs of the client.
               Remembering that the requirements define the correctness of a program, you can
               expect me to go through the requirements at the end of the course and
               see if you have met them.
               One of the key values of the requirements
               document is the collecting and collapsing of information from the user
               stories into common requirements that are translated into programming
               terms rather than domain and user terms.
               For example, if there are two
               different file structures that are needed, one of the requirements
               might be the consistency of the two structures.
               Or as you work through
               the different use cases of a game, you will find related behaviors;
               identifying how those behaviors need to be consistent might be another requirement.
            </p>
            <p>
               A key part of requirements is that they must be prioritized.
               A list of requirements without prioritzation does nothing to help
               understand what needs to be done.
               Prioritization need not be a pure numerical order,
               but must at least identify 3 or 4 levels of priority.
            </p>
            <p>
               Requirements will also capture any platform or performance constraints.
               For example, tha bility to port to another platform is a requirement.
               The necessity of uusing a articular tool or platform is a requirement.
               The need to run on old machines is also a requirement.
            </p>
            <p>
               If your application is not permitted to do something --
               such as overwrite a file or share certain components -- you should
               identfy these as <i>constraints</i> or <i>inverse requirements</i>.
            </p>
       <!-- Personas -->
        <h3><a name="Personas">Personas</a> <i>(optional)</i></h3>
        <p>
            Personas are fictitious characters created to represent the
            different user types within a targeted demographic that might use your
            software.
            The description should capture behavior patterns, goals, skills, attitudes, and environment,
            with a few fictional personal details to make the persona a realistic
            character.
            There should be at least one persona that can stand in
            for each type of user in your system.
            If there are radically
            different skills among that group, you will have more than one persona.
            For example, the one time user and the repeat
            user would probably be separate personas. 
        </p>
       <!-- Interfaces -->
        <h3><a name="interfaces">Interfaces</a></h3>
        <p>
            Interfaces should be interpreted as broadly as possible.
            Any interactions that users have with your product are interfaces.
            This includes GUIs, input and output mechanisms, command lines, help
            screens, programming APIS and interfaces.
            While these may change
            over time, you are far ahead of the game if you begin by focusing on
            the externals of the system rather than the internals.
            The functional spec should describe all of the interfaces
	    that you will build;
	    if you have agreements or requirements on the specifics of the
	    interface, include these as well.
	    Sketches or screen shots that have been agreed on should definitely be included.
        </p>
      </div>
      <div id="footer" />
   </body>
</html>
