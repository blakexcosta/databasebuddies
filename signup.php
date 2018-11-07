<?php

		require("Header.html");		
	    
		require_once("BeerBuddies_Library.php");
    
    $library = new BeerBuddies_Library();

    echo $library->headerConfig();
    echo $library->navigationConfig();
    
    // login content
    echo "<div id='login-content'>".
    		"<h1>Sign Up</h1>" .
    		"<form action='' method='post'>".
    		"<label>First Name</label>".
    		"<input type='text' name='fname' placeholder ='ex. John'><br/>".
            "<label>Last Name</label>".
            "<input type='text' name='lname' placeholder ='ex. Smith'><br/>".
            "<label>Email</label>".
            "<input type='email' name='email' placeholder ='ex. jsmith@me.com'><br/>".
            "<label>Username</label>".
            "<input type='text' name='Username' placeholder ='jsmith'><br/>".
    		"<label>Password</label>".
    		"<input type='password' name='password' placeholder='Password'><br/>".
            "<label>Password</label>".
            "<input type='password2' name='password' placeholder='Re-enter Passwrod'><br/>".
    		"<input type='submit' value='Create Account'>".
    		"</form>".
    	"</div>";

    echo $library->footerConfig();

?>