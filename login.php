<?php

		require("Header.html");		
	    
		require_once("BeerBuddies_Library.php");
    
    $library = new BeerBuddies_Library();

    echo $library->headerConfig();
    echo $library->navigationConfig();
    
    // login content
    echo "<div id='login-content'>".
    		"<h1>Log In</h1>" .
    		"<form action='' method='post'>".
    		"<label>Username</label>".
    		"<input type='text' name='username' placeholder ='username'><br/>".
    		"<label>Password</label>".
    		"<input type='password' name='password' placeholder='password'><br/>".
    		"<input type='submit' value='Sign in'>".
    		"</form>".
    	"</div>";

    echo $library->footerConfig();

?>