<?php
	
class DateUtil {
	
	public static function Now() {
		return date("Y-m-j H:i:s");
	}
	
	public static function DateStamp() {
		return date("YmjHis");
	} 
	
}