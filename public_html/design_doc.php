<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>COMP 523 Fall 2011: Design Doc</title>
      <link href="style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <?php include("header.php"); ?>
      <div class="container">
	 <h1>Design Document</h1>
	 <p>
	    The purpose of the design document is to be the guide
	    for someone who needs to understand the code to maintain it, extend it,
	    or re-use parts of it.
	    While "all of the information" is in the code,
	    the concepts that underlie it are lost in the details.
	    Consider this document a tutorial for your code.
	    While it is true that the reader of
	    the document will be familiar with basic programming and
	    object-oriented concepts, that is all that you can assume.
	    Do not assume a knowledge of the domain of the application.
	    (How good was your understanding when you started the project?)
	    Consider as a driving use case that you hand this document
	    to a new developer with a specific task to accomplish.
	    Will they have the tools to accomplish it in a reasonable time?
	 </p>
	 <p>
	    You will deliver the design document in pieces.
	    The first draft whould have a complete Architectecture,
	    a reasonably complete Decomposition,
	    and whatever design decisions have been made.
	 </p>
	 <p>
	    In the first two sections, you are more apt to find that
	    graphical representtion helps in the understanding, but in the later
	    sections, you will probably find that text will work fine.
	 </p>
	 <p>
	    Specific elements to be included in the design document are:
	 </p>
         <h2>Architecture</h2>
	 <p>
	    Remember that this is the starting point for the reader of the document.
	    It is described in the
	    <a href="development.php#Arch">Architecture</a>
	    section of the development deliverables.
	 </p>
         <h2>Decomposition</h2>
	 <p>
            The next three
            sections give different views of the model defined in the architecture.
            The terminiology used here is not object-oriented because not all class
            projects are OO.
            If your project is OO, feel free to use the OO terminology.
            This is the next level of decomposition from the architecture.
            It should flow from the architecture and relate the
            components, but not define any of the components completely. 
            <b>
               If you are extending other people's code,
               you need to explain how pieces relate, but do not need to detail code
               that you have not written or modified.
            </b>
            That's what the next two sections do!
	 </p>
         <h3>Modules</h3>
	 <p>
            Describe the
            primary modules that you are using and the relationships among them.
            Whenever you are defining relationships among components, you may find
            a picture a useful addition to the write-up.
	    The details of the modules are described later.
            The purpose of this section is to relate them to
            each other.
	 </p>
	 <h3>Processes (if relevant)</h3>
	 <p>
            If your application uses concurrent processes or multiple threads, explain
            why they exist and what they are doing.
	    For example, a system with
            multiple inputs may have different processes monitoring those inputs.
            Also cover when they are created and destroyed.
	 </p>
         <h3>Data (if relevant)</h3>
	 <p>
            Describe all the key data components of the system.
            Specifically, this
            is the persistent data -- files that you use or create and databases.
            The detailed specifications come later; the purpose of this section is
            again to give a high-level view of what the files are, how they are
            used, and how they relate to each other.
            If there are multiple tables
            in a single database, this should be explicitly covered.
            If there is no external data associated with your application,
	    this section is not needed.
	 </p>
	 <h2>Detailed module definitions</h2>
	 <p>
            For each module, you now will describe its specifics, including the
            interfaces, details of decomposition, and key algorithms.
            If this is a
            class, you will define its attributes and their types as well as all of
            the associated methods.
	    You need to describe what functions the methods
            are doing and a natural language explanation of the attributes.
            In addition, if there are identifiable invariants, pre- or post-conditions of
            the methods, they should be documented here.
            In addition this is the
            place to define any of the key algorithms that you use.
            If you are
            using a standard routine or data structure (e.g., a binary tree), you
            do not need to do more than state that fact.
	    <b>
	       You should be using a document generator like Javadoc.
	       I do not expect anyone to be creating this section manually.
	       A reference to the generated document is sufficient.
	    </b>
	 </p>
	 <h2>Detailed data definitions (if relevant)</h2>
	 <p>
            For any file or database, a complete definition of the
            format needs to be included.
            The definition should include both the
            format and use of each field within the application.
            If there are constraints on fields, they should be included.
            The relationship of individual fields are also defined here.
            If there is no external data
            associated with your application, this section is not needed.
	    <b>
	       Again a reference to a tool-generated description of a database
	       is sufficient.
	    </b>
	 </p>
         <h3>Design decisions</h3>
	 <p>
            This is the
            place to document any decisions that you made that effected the overall
            design of the system that you have been capturing on your website.
            Any dependencies that the application has should
            be explicitly stated here and the reason for that dependency explained.
            Decisions about things that you chose not to do are as important as
            those that you chose to do.
	 </p>
	 <p>
	    In addition, consider this the repository of
	    any other information that will be helpful to the next developer.
	 </p>
	 <p>
	    Consider this the one document that survives for the developer.
	    It should include references to the other formal deliverables:
	    the
	    <a href="functional_spec.php">functional spec</a>, user manuals,
	    and the test plan, as well a pointer to the code repository.
	 </p>
      </div>
      <div id="footer" />
   </body>
</html>
