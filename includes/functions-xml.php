<?php
/*************************************************************************/
/* This class stores associative arrays in an xml formatted string.       */
/* There's also a function thar retrieves them. If you try to use        */
/* xml2array with a general xml, it can fail, since there can be some    */
/* repeated indexes....                                                  */
/* Source: http://www.phpclasses.org/browse/package/2286/                */
/*************************************************************************/

// @codeCoverageIgnoreStart

class yourls_array2xml {
	var $text;
	var $arrays, $keys, $node_flag, $depth, $xml_parser;
	/*Converts an array to an xml string*/
	function array2xml($array) {
	//global $text;
	$this->text="<?xml version=\"1.0\" encoding=\"iso-8859-1\"?><result>";
	$this->text.= $this->array_transform($array);
	$this->text .="</result>";
	return $this->text;
	}

	function array_transform($array){
	//global $array_text;
	foreach($array as $key => $value){
	if(!is_array($value)){
	       //BEGIN code mod by Doug Vanderweide, 13 Jan 2011
	       //does $value contain html entities?
	       if(strlen($value) != strlen(htmlentities($value))) {
	               //if so, encode as CDATA
	               $value = "<![CDATA[" . htmlentities($value) . "]]>";
	       }
	       $this->text .= "<$key>$value</$key>";
	       //END code mod
	 } else {
	 $this->text.="<$key>";
	 $this->array_transform($value);
	 $this->text.="</$key>";
	 }
	}
	//return $array_text;

	}
	/*Transform an XML string to associative array "XML Parser Functions"*/
	function xml2array($xml){
	$this->depth=-1;
	$this->xml_parser = xml_parser_create();
	xml_set_object($this->xml_parser, $this);
	xml_parser_set_option ($this->xml_parser,XML_OPTION_CASE_FOLDING,0);//Don't put tags uppercase
	xml_set_element_handler($this->xml_parser, "startElement", "endElement");
	xml_set_character_data_handler($this->xml_parser,"characterData");
	xml_parse($this->xml_parser,$xml,true);
	xml_parser_free($this->xml_parser);
	return $this->arrays[0];

	}
	function startElement($parser, $name, $attrs)
	 {
	   $this->keys[]=$name; //We add a key
	   $this->node_flag=1;
	   $this->depth++;
	 }
	function characterData($parser,$data)
	 {
	   $key=end($this->keys);
	   $this->arrays[$this->depth][$key]=$data;
	   $this->node_flag=0; //So that we don't add as an array, but as an element
	 }
	function endElement($parser, $name)
	 {
	   $key=array_pop($this->keys);
	   //If $node_flag==1 we add as an array, if not, as an element
	   if($this->node_flag==1){
	     $this->arrays[$this->depth][$key]=$this->arrays[$this->depth+1];
	     unset($this->arrays[$this->depth+1]);
	   }
	   $this->node_flag=1;
	   $this->depth--;
	 }

}//End of the class

// @codeCoverageIgnoreEnd
