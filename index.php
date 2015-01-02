
<head>
<meta http-equiv="Content-Language" content="en-ca">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" href="./css/style.css" type="text/css" />

<!--<link rel='stylesheet' href='./bootstrap/css/bootstrap.min.css' type='text/css'/>-->
<title></title>


</head>

  
    <body>
        
  <div id ="supposeAll">


<?php
// -- Controleur frontal --
require_once('./controleur/ActionBuilder.class.php');

if (ISSET($_REQUEST["action"]))
	{

		$vue = ActionBuilder::getAction(strtolower($_REQUEST["action"]))->execute();

	}
else	
	{
		$action = ActionBuilder::getAction(strtolower(""));
		$vue = $action->execute();
	}

include_once('vues/main.php');

?>

       </div>
  </body>
  
   