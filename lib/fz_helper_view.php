<?php

/**
 *
 * @param string $path
 * @return string Url containing the public path of the project
 */
function public_url_for ($path) {
    $args = func_get_args ();
    $paths = array (option ('base_path'));
    $paths = array_merge ($paths, $args);
    return call_user_func_array ('file_path', $paths);
}

/**
 * Truncate a string in the middle with "[...]"
 * 
 * @param string $str
 * @param integer $size
 * @return string Truncated string
 */
function truncate_string ($str, $maxSize) {
    if (($size = strlen ($str)) > $maxSize) {
        $halfDiff = ($size - $maxSize + 5) / 2;
        $str = substr ($str, 0, ($size / 2) - ceil ($halfDiff))
              .'[...]'
              .substr ($str, ($size / 2) + floor ($halfDiff));
    }
    return $str;
}


/**
 * Translate a string
 * @param string
 * @return string
 */
function __($msg) {
    return option ('translate')->translate ($msg);
}

/**
 * Translate a string with different plural form
 * @param string    $sing Singular form
 * @param string    $plur Plural form
 * @param integer   
 * @return string
 */
function __p($sing, $plur, $nb) {
    return option ('translate')->plural ($sing, $plur, $nb);
}

/**
 * Translate a string and subtitute values defined in $subtitution
 *
 * @param string    $msg
 * @param array     $subtitutions   ex: array('var'=>'real value') will replace
 *                                  %var% by 'real value
 * @return string
 */
function __r($msg, array $subtitutions) {
    $msg = __($msg);
    foreach ($subtitutions as $key => $value)
        $msg = str_replace ("%$key%", $value, $msg);
    return $msg;
}
