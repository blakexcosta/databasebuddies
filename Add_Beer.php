<?php
    require_once('DB.class.php');
    //include 'templates/main_template.php';
    $dbh = new PDO_DB();
    $styles = $dbh->retrieveAllStyles();
    $categories = $dbh->retrieveAllCategories();
    $brewers = $dbh->retrieveAllBrewers();
    $page_title = "Add Beer";
    $page_content="
    <!DOCTYPE html>
    	<html>
    		<head>
    			<meta charset='UTF-8'>
    			<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
      			<meta name='viewport' content='width=device-width,initial-scale=1'>
      			<link rel='stylesheet' href='style.css' type='text/css'>
      		</head>
      		<body>
      			<div id='add-beer'>
      				<form class='inline-menu' action='#' method='post'>
      					<!--Text box for beer name-->
                        <input type='text' name='beer-name' placeholder='Enter Beer Name'>
                        <br/>

                        <!--Dropdown for category -->
                        <select name='beer-category'>";
                                foreach ($categories as $category)
                                {
                                    $page_content .= '<option value='. $category['INTCATEGORYID'] .'>'. $category['VCHCATEGORY'] .'</option>';
                                }
                        $page_content .= "</select>
                        <br/>

                        <!--Dropdown for styles-->
                        <select name='beer-styles'>";
                                foreach ($styles as $style)
                                {
                                    $page_content .= '<option value='. $style['INTSTYLEID'] . '>'. $style['VCHSTYLE'] .'</option>';
                                }

                        $page_content .= "</select>
                        <br/>

                        <!--Dropdown for brewer -->
                        <select name='beer-brewer'>";

                                foreach ($brewers as $brewer)
                                {
                                    $page_content .= '<option value='. $brewer['INTBREWERID'] . '>'. $brewer['VCHBREWER'] .'</option>';
                                }

                        $page_content .= "</select>
                        <br/>

                        <!--Text boxes for Address, city, state, country, decsription, website,
                         alcohol volume, IBU, Standard Reference Method, Universal Product Code -->
                         <br/>
                        <input type='text' name='address' placeholder='Brewer Address'>
                        <input type='text' name='beer-city' placeholder='Enter originating city'>
                        <input type='text' name='beer-state' placeholder='State'>
                        <input type='text' name='beer-country' placeholder='Country'>
                        <input type='text' name='beer-description' placeholder='Beer Description'>
                        <input type='text' name='website' placeholder='Website'>
                        <input type='text' name='abv' placeholder='ABV(alcohol percentage to tenth)'>
                        <input type='text' name='ibu' placeholder='IBU'>
                        <input type='text' name='reference-method' placeholder='Standard Reference Method'>
                        <input type='text' name='product-code' placeholder='Universal Product Code'>


                        <!--Submit button -->
                        <input type='submit' value='Submit'>
      				</form>


            </body>
        </html>";

        if (isset($_POST['submit']))
        {
            $dbh->insertBeer($_POST['beer-name'], $_POST['beer-category'], $_POST['beer-styles'], $_POST['beer-brewer'], $_POST['address'], $_POST['beer-city'],$_POST['beer-state'],$_POST['beer-country'],$_POST['beer-description'],$_POST['website'],$_POST['abv'],
            $_POST['ibu'], $_POST['reference-method'],$_POST['product-code']);
        }
?>
<?php include 'templates/main_template.php'; ?>
