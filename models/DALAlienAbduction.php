<?php 

class DALAlienAbduction 
{

	private $con;

	public function __construct ( $con ) 
	{

		$this -> con = $con;

	}

	public function select ( $abduction_id = 0, $limit = 0 ) 
	{

		if ( $abduction_id > 0 ) {
			return $this -> select_alien_abduction ( $abduction_id );
		} else if ( $limit != 0 ) {
			return $this -> select_all_limit ( $limit );
		} else {
			return $this -> select_all ( );
		}
	}

	public function select_all ( ) 
	{

		$sql = "SELECT * FROM aliens_abduction ORDER BY when_it_happened DESC";

		$result = $this -> con -> query ( $sql );

		$aliens_abduction = [];

		while ( $alien_abduction = $result -> fetch_object ( 'AlienAbduction' ) ) {
			$aliens_abduction[] = $alien_abduction;
		}

		return $aliens_abduction;

	}

	public function select_all_limit ( $limit ) 
	{

		$sql = "SELECT * FROM aliens_abduction ORDER BY when_it_happened DESC LIMIT $limit";

		$result = $this -> con -> query ( $sql );

		$aliens_abduction = [];

		while ( $alien_abduction = $result -> fetch_object ( 'AlienAbduction' ) ) {
			$aliens_abduction[] = $alien_abduction;
		}

		return $aliens_abduction;

	}

	public function select_alien_abduction ( $abduction_id ) 
	{

		$sql = "SELECT * FROM aliens_abduction WHERE abduction_id = '{$abduction_id}'";

		$result = $this -> con -> query ( $sql );

		$alien_abduction = $result -> fetch_object ( 'AlienAbduction' );

		return $alien_abduction;

	}

	public function save ( AlienAbduction $alien_abduction ) 
	{

		$sql = "
			INSERT INTO aliens_abduction 
			(
				first_name, last_name, email, when_it_happened, how_long, how_many, alien_description,
				what_they_did, fang_spotted, other
			)
            VALUES 
            (
            	'{$alien_abduction -> getFirstName ( )}',
            	'{$alien_abduction -> getLastName ( )}',
            	'{$alien_abduction -> getEmail ( )}',
            	'{$alien_abduction -> getWhenItHappened ( )}',
                '{$alien_abduction -> getHowLong ( )}',
                '{$alien_abduction -> getHowMany ( )}',
                '{$alien_abduction -> getAlienDescription ( )}',
                '{$alien_abduction -> getWhatTheyDid ( )}',
                '{$alien_abduction -> getFangSpotted ( )}',
                '{$alien_abduction -> getOther ( )}'
            )
        ";

        $this -> con -> query ( $sql );

        return ( $this -> con -> affected_rows > 0 ) ? true : false;

	}
}
