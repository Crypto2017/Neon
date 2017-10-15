
$_int   =  "~^(?P<__KEY__>[1234567890]+)$~";
$_float =  "~^(?P<__KEY__>[1234567890]+(\.[1234567890]*)?)$~";
$_str   =  "~^(?P<__KEY__>.+)$~";
$_norm  =  "~^$~"

function exp_mark($regex,$key){
	$regex= str_replace("__KEY__",$key,$regex);
	return $regex;
}

// -> <int:number> or <str:name>  <float:money> <str:adress:~regex~>
function exp_parse($exp){
	$regex="~^\s*<\s*(?P<type>(int|str|float))\s*\:\s*(?P<key>.+)\s*(\:(?P<value>.+)\s*)?>\s*$~";
	matches=array();
	preg_match($regex,$exp,$matches);
	if (empty($matches))
		{ return array("type"=>"norm","value"=>"~".$exp."~","key"=>"");}
	$type=$matches["type"];$key=$matches["key"];
	if (isset($matches["value"]))
		{$value=$matches["value"];}
	else {
		if ($type=="int"){$value=exp_mark($_int,$key);}
		else if ($type=="float"){$value=exp_mark($_float,$key);}
		else if ($type=="str"){$value=exp_mark($_str,$key);}
	}
	return array("key"=>$key,"type"=>$type,"value"=>$value);

}
