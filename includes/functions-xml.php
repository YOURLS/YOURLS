<?php

// From: http://vantulder.net/f2o/notities/arraytoxml/
function yourls_array_to_xml($array, $level=1) {
		$xml = '';
	if ($level==1) {
		$xml .= '<?xml version="1.0" encoding="UTF-8"?>'.
				"\n<response>\n";
	}
	foreach ($array as $key=>$value) {
		$key = strtolower($key);
		if (is_array($value)) {
			$multi_tags = false;
			foreach($value as $key2=>$value2) {
				if (is_array($value2)) {
					$xml .= str_repeat("\t",$level)."<$key>\n";
					$xml .= array_to_xml($value2, $level+1);
					$xml .= str_repeat("\t",$level)."</$key>\n";
					$multi_tags = true;
				} else {
					if (trim($value2)!='') {
						if (htmlspecialchars($value2)!=$value2) {
							$xml .= str_repeat("\t",$level).
									"<$key><![CDATA[$value2]]>".
									"</$key>\n";
						} else {
							$xml .= str_repeat("\t",$level).
									"<$key>$value2</$key>\n";
						}
					}
					$multi_tags = true;
				}
			}
			if (!$multi_tags and count($value)>0) {
				$xml .= str_repeat("\t",$level)."<$key>\n";
				$xml .= array_to_xml($value, $level+1);
				$xml .= str_repeat("\t",$level)."</$key>\n";
			}
		} else {
			if (trim($value)!='') {
				if (htmlspecialchars($value)!=$value) {
					$xml .= str_repeat("\t",$level)."<$key>".
							"<![CDATA[$value]]></$key>\n";
				} else {
					$xml .= str_repeat("\t",$level).
							"<$key>$value</$key>\n";
				}
			}
		}
	}
	if ($level==1) {
		$xml .= "</response>\n";
	}
	return $xml;
}

?>