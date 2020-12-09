<!DOCTYPE html>
<!-- code by webdevtrick ( https://webdevtrick.com) -->
<html>
	<head>
		<title>Simple Calculator In PHP</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	 
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
		<h1>Ian's Rollbar PHP Calculator Demo </h1>
		<div class="container" style="margin-top: 50px">
		
<?php

/*
spl_autoload_register(function ($class) {
  // map Rollbar\Foo to ./rollbar-php/src
  var_dump($class);
  $slash = '\\';
  require_once sprintf('./%s.php', preg_replace(array ("/^Rollbar$slash/", "/$slash/"), array ('rollbar-php/src/', DIRECTORY_SEPARATOR), $class));
});
*/

require_once 'vendor/autoload.php';

use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;
Rollbar::init(
    array(
        'access_token' => 'c08d662c8092476092fbf158685cf49e',
        'environment' => 'production',
        'code_version' => 'c08d662c8092476092fbf158685cf49e',
        'host'  => 'localhost',
        'root' => '/Users/ianflanagan/Workspace/Demos/PHPDemo'
    )
);

Rollbar::log(Level::info(), 'Test info message');
 throw new Exception('Test exception');

		// If the submit button has been pressed
		if(isset($_POST['submit']))
		{
		// Check number values
		if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']))
		{
		// Calculate total
		if($_POST['operation'] == 'plus')
		{
		$total = $_POST['number1'] + $_POST['number2'];	
		}
		if($_POST['operation'] == 'minus')
		{
		$total = $_POST['number1'] - $_POST['number2'];	
		}
		if($_POST['operation'] == 'multiply')
		{
		$total = $_POST['number1'] * $_POST['number2'];	
		}
		if($_POST['operation'] == 'divided by')
		{
		$total = $_POST['number1'] / $_POST['number2'];	
		}
		
		// Print total to the browser
		echo "<h1>{$_POST['number1']} {$_POST['operation']} {$_POST['number2']} equals {$total}</h1>";
		
		} else {
		
		// Print error message to the browser
		echo 'Numeric values are required';
		
		}
		}

		// end PHP 
		?>
	    
	    <!-- Calculator form-->
	    <form method="post" action="calculator.php">
	        <input name="number1" type="text" class="form-control" style="width: 150px; display: inline" />
	        <select name="operation">
	        	<option value="plus">Plus</option>
	            <option value="minus">Minus</option>
	            <option value="multiply">Multiply</option>
	            <option value="divided by">Devide</option>
	        </select>
	        <input name="number2" type="text" class="form-control" style="width: 150px; display: inline" />
	        <input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
	    </form>
	    
		</div>
	
	</body>
</html>
