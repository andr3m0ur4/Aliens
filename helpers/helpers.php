<?php 

function date_to_br ( $date ) {

	if ( $date == '' OR $date == '0000-00-00' ) {
		return '';
	}

	$parts = explode ( '-', $date );

	if ( count ( $parts ) != 3 ) {
		return $date;
	}

	$object_date = DateTime::createFromFormat ( 'Y-m-d', $date );

	return $object_date -> format ( 'd/m/Y' );
	
}
