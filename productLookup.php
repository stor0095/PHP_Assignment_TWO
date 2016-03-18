<?php
    // Geemakun Storey -  Assignment 2
	// Define variable to hold the request input string.
	$inputValue;
	// Make a string variable to hold the number returned for the database.
	$outputValue = "0";
    // Error message
    $errorMessage = "Error, select an item";
	
	// Set the $inputValue to the 'productName' parameter of the $_REQUEST super global array if it set.
    if (isset($_REQUEST["productName"])){
        $inputValue = $_REQUEST["productName"];
        echo $outputValue;
    }
    if(empty($_REQUEST["productName"])){
      echo $outputValue = $errorMessage;
    }
// Create a PDO connection to the database.
    else {
         $db_host= "localhost";
		 $db_name = "assignment2";
		 $db_user= "root";
		 $db_password = "root";
     	 $pdo_link = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_password);
		$sqlQuery = " SELECT product_name, product_quantity FROM products WHERE '$inputValue'=product_name";
		$result = $pdo_link->query($sqlQuery);
    }
		if( $result ){
         while( $row = $result->fetch(PDO::FETCH_ASSOC) ){
             $outputValue= $row['product_quantity'];
         }   
     }
     else {
         echo "<p>" . $pdo_link->errorInfo()[2] . "</p>\n\t\t";    
     }
	// Echo out the calculated $ouputValue as a response to the client.
	echo $outputValue;
    $pdo_link = NULL;	
?>




