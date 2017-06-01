<?php


function convertData($formato, $data) {
    if ($formato == 'amd') {
        $data = implode("-",array_reverse(explode("/",$data)));
    }
    else if ($formato == 'dma') {
        $data = implode("/",array_reverse(explode("-",$data)));
    }
    
    return $data;
}
