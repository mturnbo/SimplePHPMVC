<?php
	
class DatabaseUtility {

	public static function GetSQLResult($stmt) {
		$metadata = mysqli_stmt_result_metadata($stmt);
		$result = new SQLResult();
		$result->numCols = mysqli_num_fields($metadata);
		$result->stmt = $stmt;
		mysqli_free_result($metadata);
		return $result;	
	}
		
	public static function GetSQLResultArray($result) {
		if (get_class($result) == 'SQLResult') {
			$resultArray = array();
		    $code = "return mysqli_stmt_bind_result(\$result->stmt ";
		    for ($i = 0; $i < $result->numCols; $i++) {
		        $resultArray[$i] = NULL;
		        $code .= ", \$resultArray['" .$i ."']";
		    };
		    $code .= ");";
		    if (!eval($code)) { return NULL; };
		    // advance statement cursor
		    if (!mysqli_stmt_fetch($result->stmt)) { return NULL; };
		    return $resultArray;			
		} else {
			return array();
		}
	}	
		
	public static function GetAllRows($result) {
		$allRows = array();
		while ($row = $result->fetch_assoc()) {
			$allRows[] = $row;
		}
		return $allRows;
    }
		
}	
	
?>