<?php  
defined('BASEPATH') or exit('No direct script access allowed');

if( ! function_exists('datepicker_to_mysql') )
{
	function datepicker_to_mysql( $date )
	{	 
    $date = trim($date);
    $parts = explode('/', $date);

      return "$parts[2]-$parts[1]-$parts[0]";
      
	}
}


if( ! function_exists('isWeekend') )
{
	function isWeekend($date) {
		$weekDay = date('w', strtotime($date));
    return ($weekDay == 0 || $weekDay == 6);
	}
}


