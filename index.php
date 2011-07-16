<?php
$start_time = microtime();
define('BASE_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);



list($a_dec, $a_sec) = explode(' ', $start_time);
list($b_dec, $b_sec) = explode(' ', microtime());
$duration = round(sprintf("%0.5f", $b_sec - $a_sec + $b_dec - $a_dec),4);
echo '<hr />Skrypt wykonał się w' . $duration.' s.<hr />';
?>