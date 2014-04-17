<?php
function getAnnotations($str) {
    $str = trim(substr($str, 3, -2));
    $str = preg_replace('/^[ \t]*\*[ \t]*/m', '', $str);
    $a   = preg_split('/@([a-zA-Z_]{1}[a-zA-Z0-9_-]+)/i', $str, -1, PREG_SPLIT_DELIM_CAPTURE);

    $result = [];
    for($i = 1, $c = count($a); $i < $c; $i += 2) {
        $content = trim($a[$i + 1]);
        if(($json = json_decode(trim($content))) !== null) $content = $json;

        $result[$a[$i]] = $content;
    }

    return $result;
}