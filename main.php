<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require("SocialNumber.php");
if ($argc != 3) {
    print("Usage: php script namelist codelist");
    exit;
}
$handle = fopen($argv[1], 'r');
try {
    if (!$handle) {
        throw new Exception("$source_name" . "non esiste\n");
    }
} catch (Exception $exp) {
    print ($exp->getMessage() . "\n");
}
while (($buffer = fgets($handle)) !== false) {
    $buffer = rtrim($buffer);
    list($surname,$name,$date,$location,$sex) = explode(";", $buffer);
    $mySocialNumber = new SocialNumber($surname,$name,$date,$location,$sex);
    print(strtoupper($mySocialNumber->letsGo($argv[2])) . "\n");
}
fclose($handle);

?>
