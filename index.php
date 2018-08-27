<?php

require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$news = new \News\News( 'c9a40e795f1e45c5adc6bc15ec34cbe6' ) ;

$sources = $news->get_sources();

echo '<pre>';
foreach( $sources as $source ){
    $name = str_replace( [ '(' , ')' , '/' , '.' ] , '' , strtoupper( $source->getName() ) );
    echo 'const ' . str_replace( [ ' ' , '\'' , '-' ] , '_' , $name ) . ' = "' . $source->getId() . '";<br>';
}