<?php

		// require("Header.php");		
	    
		// require_once("BeerBuddies_Library.php");
    
  //   $library = new BeerBuddies_Library();

  //   echo $library->headerConfig();
  //   echo $library->navigationConfig();
    require_once('DB.class.php');
    $dbh = new PDO_DB();
    $page_title="Log In";
    
    // login content
    $page_content = "<div id='login-content'>".
    		"<form action='' method='post'>".
    		"<label>Username</label>".
    		"<input type='text' name='username' placeholder ='username'><br/>".
    		"<label>Password</label>".
    		"<input type='password' name='password' placeholder='password'><br/>".
    		"<input type='submit' value='Sign in'>".
    		"</form>".
    	"</div>";

    //echo $library->footerConfig();

?>
<?php include 'templates/main_template.php'; ?>
