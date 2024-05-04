<?php

/******************************************
			Asisten Pemrogaman 13
 ******************************************/

class Template{
	/* Attributes */

	var $filename = ''; // Filename
	var $content = ''; // Content

	/* Methods */

	// Constructor
	function __construct($filename = ''){
		$this->filename = $filename;
		$this->content = implode('', @file($filename)); // Used to read file contents
	}

	// Clear the file content
	function clear(){
		// Replace the /DATA_*/ regex to blank on the content
		$this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);

	}

	// Write a content to the page
	function write(){
		$this->clear();
		print $this->content;

	}

	// Returns the content of a page
	function getContent(){
		$this->clear();

		return $this->content;
	}

	// Replace a string using computer magic
	function replace($old = '', $new = ''){

		// Convert the replacement value to string
		if(is_int($new)) { $value = sprintf("%d", $new); }
		elseif(is_float($new)) { $value = sprintf("%f", $new); }
		elseif(is_array($new)) {
			$value = '';
			foreach( $new as $item){
				$value .= $item. '';
			}
		}
		else { $value = $new; }

		// Replace a value using the current content parameter
		$this->content = preg_replace("/$old/",  $value, $this->content);

	}
}
