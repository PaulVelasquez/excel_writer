<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>


	<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once 'SimpleXLSX.php';
if (isset($_FILES['file'])) {
	$name = $_FILES['file']['name'];
	

header('Content-disposition: attachment; filename=copy.xls');
header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	
if ( $xlsx = SimpleXLSX::parse( $_FILES['file']['tmp_name'] ) ) {

	$start = array_column($xlsx->rows(),0 );
	
	$pindex=0;$kw1index=0;$kw2ndex=0;$kw3index=0;$kw4index=0;$kw5index=0;$d1index=0;$d2index=0;$d3index=0;$d4index=0;$d5index=0;
	//$count = count($start[0] ));
	$dim = $xlsx->dimension();
	$num_cols = $dim[0];
	for ($i=0; $i < $num_cols ; $i++) { 
		$column = array_column($xlsx->rows(),$i);
		if( strtolower($column[0]) === strtolower("product name")){
			$pindex=$i;
		}
		if( strtolower($column[0]) === strtolower("Title Keywords 1")){
			$kw1index=$i;
		}
		if( strtolower($column[0]) === strtolower("Title Keywords 2")){
			$kw2ndex=$i;
		}
		if( strtolower($column[0]) === strtolower("Title Keywords 3")){
			$kw3index=$i;
		}
		if( strtolower($column[0]) === strtolower("Title Keywords 4")){
			$kw4index=$i;
		}
		if( strtolower($column[0]) === strtolower("Title Keywords 5")){
			$kw5index=$i;
		}
		if( strtolower($column[0]) === strtolower("Description Keywords 1")){
			$d1index=$i;
		}
		if( strtolower($column[0]) === strtolower("Description Keywords 2")){
			$d2index=$i;
		}
		if( strtolower($column[0]) === strtolower("Description Keywords 3")){
			$d3index=$i;
		}
		if( strtolower($column[0]) === strtolower("Description Keywords 4")){
			$d4index=$i;
		}
		if( strtolower($column[0]) === strtolower("Description Keywords 5")){
			$d5index=$i;
		}

	}
	
	
	
	
	echo '<table>';
	$ProductNames = array_column($xlsx->rows(),$pindex );
	$KW1 = array_column($xlsx->rows(),$kw1index );
	$KW2 = array_column($xlsx->rows(),$kw2ndex );
	$KW3 = array_column($xlsx->rows(),$kw3index);
	$KW4 = array_column($xlsx->rows(),$kw4index);
	$KW5 = array_column($xlsx->rows(),$kw5index);
	
	$Des1 = array_column($xlsx->rows(),$d1index );
	$Des2 = array_column($xlsx->rows(),$d2index );
	$Des3 = array_column($xlsx->rows(),$d3index);
	$Des4 = array_column($xlsx->rows(),$d4index);
	$Des5 = array_column($xlsx->rows(),$d5index);
	echo '<th>'.$ProductNames[0] . "</th>";
	echo '<th>'."Keyword Set" . "</th>";
	echo '<th>'."Keyword" . "</th>";
	echo '<th>'."Description" . "</th>";
	$endofFile = count($ProductNames);
	

		for($i = 1; $i<$endofFile;$i++) {

		
			if(($KW1[$i]!="") || ($Des1[$i]!="")){
				echo '<tr>';
				echo '<td>' . ( isset( $ProductNames[$i]  ) ? $ProductNames[$i]  : '&nbsp;' )
				.'<td>' . "KW 1" . '</td>'
				.'<td>' . ( isset( $KW1[$i]  ) ? strval($KW1[$i])  : '&nbsp;' )
				.'<td>' . ( isset( $Des1[$i]  ) ?  strval($Des1[$i])  : '&nbsp;' );
				echo '</tr>';
			}
			
			
			
			if(($KW2[$i]!="") || ($Des2[$i]!="")){
				echo '<tr>';
				echo '<td>' . ( isset( $ProductNames[$i]  ) ? $ProductNames[$i]  : '&nbsp;' )
				.'<td>' . "KW 2" . '</td>'
				.'<td>' . ( isset( $KW2[$i]  ) ?  strval($KW2[$i])  : '&nbsp;' )
				.'<td>' . ( isset( $Des2[$i]  ) ?  strval($Des2[$i])  : '&nbsp;' );
				echo '</tr>';
			}
			
			if(($KW3[$i]!="") || ($Des3[$i]!="")){
				echo '<tr>';
				echo '<td>' . ( isset( $ProductNames[$i]  ) ? $ProductNames[$i]  : '&nbsp;' )
				.'<td>' . "KW 3" . '</td>'
				.'<td>' . ( isset( $KW3[$i]  ) ?  strval($KW3[$i])  : '&nbsp;' )
				.'<td>' . ( isset( $Des3[$i]  ) ?  strval($Des3[$i])  : '&nbsp;' );
				echo '</tr>';
			}
			
			
			if(($KW4[$i]!="") || ($Des4[$i]!="")){
				echo '<tr>';
				echo '<td>' . ( isset( $ProductNames[$i]  ) ? $ProductNames[$i]  : '&nbsp;' )
				.'<td>' . "KW 4" . '</td>'
				.'<td>' . ( isset( $KW4[$i]  ) ?  strval($KW4[$i])  : '&nbsp;' )
				.'<td>' . ( isset( $Des4[$i]  ) ?  strval($Des4[$i])  : '&nbsp;' );
				echo '</tr>';
			}
			
			if(($KW5[$i]!="") || ($Des5[$i]!="")){
				echo '<tr>';
				echo '<td>' . ( isset( $ProductNames[$i]  ) ? $ProductNames[$i]  : '&nbsp;' )
				.'<td>' . "KW 5" . '</td>'
				.'<td>' . ( isset( $KW5[$i]  ) ?  strval($KW5[$i])  : '&nbsp;' )
				.'<td>' . ( isset( $Des5[$i]  ) ?  strval($Des5[$i])  : '&nbsp;' );
				echo '</tr>';
			}
			
			
		
			

			}
				
			

		
		
			
	
echo '</table>';


} else {
	echo SimpleXLSX::parseError();
	}
}
echo '<h2>Upload form</h2>
<form method="post" enctype="multipart/form-data">
*.XLSX <input type="file" name="file"  />&nbsp;&nbsp;<input type="submit" value="Parse" />
</form>';
echo '<pre>';

?>



</body>


</html>

