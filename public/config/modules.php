<?php

	function generate_password($digits=6){
			$OTP = "";
			for($t=0; $t<$digits ; $t ++){
				$OTP = $OTP . strval(random_int(0,9));
			}

			return $OTP;
		} 
	// it equals to addslashs()
	function sql_string_filter($str){
		$result = "";
		for($idx=0; $idx<strlen($str); $idx++){
			if($str[$idx] == "\\"){
				$result = $result."\\"."\\";
			}
			else if($str[$idx] == "'"){
				$result = $result."\\"."'";
			}
			elseif($str[$idx] == "\""){
				$result = $result."\\"."\"";
			}
			else{
				$result = $result.$str[$idx];
			}
		}
		return $result;
	}



?>