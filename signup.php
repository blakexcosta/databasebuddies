<?php

    require_once('DB.class.php');
    $dbh = new PDO_DB();

    $page_title = "Registration";

		// require("Header.php");		
	    
		// require_once("BeerBuddies_Library.php");
    
  //   $library = new BeerBuddies_Library();

  //   echo $library->headerConfig();
  //   echo $library->navigationConfig();
    
    // login content
    $page_content = "<div id='login-content'>" .
    		"<form action='' method='post'>".
    		"<label>First Name</label><br>".
    		"<input type='text' name='fname' placeholder ='ex. John'><br/>".
            "<label>Last Name</label><br>".
            "<input type='text' name='lname' placeholder ='ex. Smith'><br/>".
            "<label>Email</label><br>".
            "<input type='email' name='email' placeholder ='ex. jsmith@me.com'><br/>".
            "<label>Username</label><br>".
            "<input type='text' name='Username' placeholder ='jsmith'><br/>".
    		"<label>Password</label><br>".
    		"<input type='password' name='password' placeholder='Password'><br/>".
            "<label>Password</label><br>".
            "<input type='password2' name='password' placeholder='Re-enter Passwrod'><br/><br/>".
    		"<input type='submit' value='Create Account'>".
    		"</form>".
    	"</div>";

  //   echo $library->footerConfig();

?>
<?php include 'templates/main_template.php'; ?>