<?php

/*print_r(PDO::getAvailableDrivers());

class cat{
	static public $count = 0;

	public function __construct()
	{
		self::$count += 1;
	}

	public function getMayoou()
	{
		echo "mouuuu";
	}
}

echo Cat::$count . "<br />";

$cat = new Cat();
echo $cat::$count . "<br />";

$cat = new Cat();
echo $cat::$count . "<br />";*/

?>


<?php

$driver_options = array(
PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"
	);



try {
	
	$DBH = new PDO("mysql:host=localhost; dbname=phpcources", "root", "remix", $driver_options);

	$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
	catch(PDOException $e) {
	echo $e->getMessage();
}

$query = $DBH->prepare("INSERT INTO tasks 
		(title, resolved, createdAt) 
		values (?, ?, ?)");


$query->bindParam(1, $title);
$query->bindParam(2, $resolved);
$query->bindParam(3, $date);

$title = "Купить молоко";
$resolved = 0;
$date = date("Y-m-d H:i:s");
$query->execute();


$title = "Выкинуть мусор";
$resolved = 0;
$date = date("Y-m-d H:i:s");
$query->execute();


$query = $DBH->prepare("INSERT INTO tasks 
		(title, resolved, createdAt) 
		values (:title, :resolved, :date)");


array("title" => "Купить молоко", "resolved" => 0, "date" =>("Y-m-d H:i:s"));

$query->execute($params);


//"'Побрить кота', 0, '".date("Y-m-d H:i:s")."' )

//--------------------------

/*$DBH->exec("INSERT INTO tasks 
		(title, resolved, createdAt) 
		values ('Побрить кота', 0, '".date("Y-m-d H:i:s")."' )");

$DBH = null;


exec()*/

?>
