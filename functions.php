<?php

/* Waves Scan Dir */
if (!function_exists('waves_scandir')) {
    function waves_scandir($path) {
        if (empty($path)||!file_exists($path)) {
            $path='';
        }else{
            $path=scandir($path);
            unset($path[0]);
            unset($path[1]);
        }
        return $path;
    }
}