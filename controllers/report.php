<?php

    $alien = new AlienAbduction ( );

    $error = false;

    if ( isset ( $_POST['submit'] ) ) {

        // Obtém os dados do relatório do POST
        $alien -> setFirstName ( $con -> escape_string ( trim ( $_POST['firstname'] ) ) );
        $alien -> setLastName ( $con -> escape_string ( trim ( $_POST['lastname'] ) ) );
        $alien -> setEmail ( $con -> escape_string ( trim ( $_POST['email'] ) ) );
        $alien -> setWhenItHappened ( $con -> escape_string ( trim ( $_POST['whenithappened'] ) ) );
        $alien -> setHowLong ( $con -> escape_string ( trim ( $_POST['howlong'] ) ) );
        $alien -> setHowMany ( $con -> escape_string ( trim ( $_POST['howmany'] ) ) );
        $alien -> setAlienDescription ( $con -> escape_string ( trim ( $_POST['aliendescription'] ) ) );
        $alien -> setWhatTheyDid ( $con -> escape_string ( trim ( $_POST['whattheydid'] ) ) );
        $alien -> setFangSpotted( $con -> escape_string ( trim ( $_POST['fangspotted'] ?? '' ) ) );
        $alien -> setOther ( $con -> escape_string ( trim ( $_POST['other'] ) ) );

        if ( !empty ( $alien -> getFirstName ( ) ) 
            AND !empty ( $alien -> getLastName ( ) ) 
            AND !empty ( $alien -> getWhenItHappened ( ) ) 
            AND !empty ( $alien -> getHowLong ( ) ) 
            AND !empty ( $alien -> getWhatTheyDid ( ) ) 
        ) {
            // Gravar os dados no banco de dados
            $success = $dal -> save ( $alien );
    
        } else {
            $error = true; 
        }
    }

    require_once 'views/template-report.php';
