<?php
    
    // Recupera os dados de aparições alienígenas do MySQL
    $data = $dal -> select ( );
            
    require_once 'views/template-newsfeed.php';
    