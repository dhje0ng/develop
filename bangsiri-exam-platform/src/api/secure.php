<?php

function xss_secure($string){
    return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
}