

<?php



spl_autoload_register(function($nome_classe){
    
//Pasta aonde se encontra as classes
$dir_classe="classes";

    if(file_exists($dir_classe.DIRECTORY_SEPARATOR.$nome_classe.".php")){
        require_once($dir_classe.DIRECTORY_SEPARATOR.$nome_classe.".php");
    }

   // var_dump($nome_classe);

});




?>