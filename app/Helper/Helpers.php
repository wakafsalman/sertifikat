<?php

if(!function_exists('mata_uang_IDR')){
    function mata_uang_IDR($angka){
        return "Rp. ". number_format($angka, 0, ',',','). " ,-";
    }
}

if(!function_exists('mata_uang_IDR_desimal_dua')){
    function mata_uang_IDR_desimal_dua($angka){
        return "Rp. ". number_format($angka, 0, ',',','). ".00,-";
    }
}

