<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TownCode
 *
 * @author francesco
 */

#require 'FileSource.php';

class TownCode {

    //put your code here
    private $city;

    function __construct($c) {
        $this->city = strtoupper($c);
    }

    public function takeFromFile($source) {
        $fileReader = new FileSource($source,$this->city);
        try{
        $fileReader->connectToSource();
        }catch (Exception $exp){
            print ($exp->getMessage());
            exit;
        }
        return $fileReader->getFromSource("code");
    }

}

?>
