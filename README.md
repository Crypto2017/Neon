# Neon
php micro-framework

```php
<?php
class Controller extends Handler {
	function __construct()
	{
		route("/greet/<str:name>",$this->index);
		route("/random",$this->rand);
	} 
	
	function index($name)
	{
		//1
		$view("hello.php",array("name"=>$name));
		//2
		$view["name"]=$name;
		$view->template("hello.php");
		
		
	}
	function rand()
	{
		$start = $request->get("start",0);
		$end   = $request->get("end",10);
		$view->render("<h1>".random_int($start,$end)."</h1>");
	}

}
?>
```
