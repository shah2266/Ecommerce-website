<?php
	class Format{
		
		//Date Time Formatting
		public function formatDate($date){
			return date('Fj,Y, g:i a',strtotime($date));
		}
		
		// Text limited show in 
		public function textShorten($text, $limit = 400){
			$text = $text. " ";
			$text = substr($text, 0, $limit);
			$text = substr($text, 0, strrpos($text, ' '));
			$text = $text." ...";
			return $text;
		}
		
		//input validation
		public function validation($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlentities($data);
			return $data;
		}
	}
?>