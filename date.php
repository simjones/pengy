<?php

class Date 
{
	public static function isPossible($date1, $date2){
	// date 1 should be start. date 2 should be end
	// convert dates to julian
	// return true if possible
	// else return false
	// The date we receive is going to be delimited by a "-"
	// And will be in the format YYYY-MM-DD
	// Using the explode method, year will be [0], month [1], date [3]
	
	$dateOneExploded = explode("-", $date1);
	$dateTwoExploded = explode("-", $date2);
	/*
	foreach ($dateOneExploded as &$value) {
		echo $value;
		}
		*/
	$dateOneJulian = gregoriantojd($dateOneExploded[1], $dateOneExploded[2], $dateOneExploded[0]);
	$dateTwoJulian = gregoriantojd($dateTwoExploded[1], $dateTwoExploded[2], $dateTwoExploded[0]); 	
	
	if (dateTwoJulian > dateOneJulian) {
            return true;
	}
	else {
            return false;
	}
} // end function
	
	public static function numDaysBetween($date1, $date2){
	// calculate the number of days between two dates
	$date1 = strtotime($date1);
	$date2 = strtotime($date2);
	
	$datediff = abs($date1 - $date2);
	
	return $datediff;
	
} // end function
	
	public static function numDaysFromNow($date1) {
	// calculate the number of days from today to a date in the future.
	$now = time();
        $date1 = strtotime($date1);
        $datediff = $date1 - $now;
        return $datediff;
            
} // end function
	
} // end class
	/*
	calling a static function: Date::isPossible(arg);
	int gregoriantojd ( int $month , int $day , int $year )
	string jdtogregorian ( int $julianday )
	
	*/