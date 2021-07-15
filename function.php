<?php
function get_safe_value($connection,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_escape_string($connection,$str);
	}
}
?>