<?php

    // Verificar se estamos visualizando um relatório único ou todos os relatórios mais recentes
    if ( isset ( $_GET['abduction_id'] ) ) {
        $data = $dal -> select ( $_GET['abduction_id'] );
    } else {
        $data = $dal -> select ( null, $limit = 5 );
    }
    
    require_once 'views/template.php';
