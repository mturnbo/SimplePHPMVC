<?php
	
	
class Debug {
	
	public static function Show($section, $output) {
		if (APP_ENV == 'DEV') {
			echo "<fieldset>\n";
			echo "<legend>".$section." DEBUG OUTPUT</legend>\n";
			echo $output."\n";
			echo "</fieldset>\n\n";
		}
	}	
	
}