<?php

function input($type,$name,$attributes = array()) {
	$opt = attrs($attributes);
	return "<input type='$type' name='$name' $opt />";
}

function select($name,$tabValeurs) {
	$tmp ="";
	foreach($tabValeurs as $ret=>$val) {
		$tmp = $tmp. "<option value='$ret'>$val</option>\n";
	}

	return "<select name='$name'>$tmp</select>";
}

function nice_whitespaces(&$value){
    if (is_array($value)) 
        foreach($value as &$a)
        nice_whitespaces($a);
    elseif (!is_object($value)){
        $value=str_replace(array("\t","\r","\0","\x0B"),' ',trim("$value"));
        do $value=str_replace(array('  ',"\n\n","\n "," \n"),array(' ',"\n","\n","\n"),$value,$count_replace); while($count_replace);
    }
}
 
?>