<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileSource
 *
 * @author francesco
 */
require 'RetrieveData.php';

class FileSource implements RetrieveData {

    //put your code here
    private $handle;
    private $source_name;
    private $search_key;

    function __construct($source, $key=NULL) {
        $this->source_name = $source;
        $this->search_key=$key;
    }



    public function connectToSource() {
        $this->handle = fopen($this->source_name, 'r');
        if (!$this->handle) {
            throw new Exception("$source_name" . "non esiste\n");
        }
    }

    /*private function getRegistry() {
        $counter=0;
        while (($buffer = fgets($this->handle)) !== false) {
            $buffer = rtrim($buffer);
            list($item[$counter]["surname"], $item[$counter]["name"], $item[$counter]["date"], $item[$counter]["location"], $item[$counter]["sex"]) = explode(";", $buffer);
            $counter++;
        }
        fclose($this->handle);
        return $item;
    }*/

    private function getCode($key) {
        $i=0;
        $found = FALSE;
        while (($buffer = fgets($this->handle)) !== false or !$found) {

            $buffer = rtrim($buffer);

            list($code, $city, $district) = explode(";", $buffer);
            
            if (!$code or !$city or !$district)              
                var_dump($i, $code, $city, $district);

            if (strcmp($city, $key) == 0) {
                $result = $code;
                $found = true;
            }
            $i++;
        }

        fclose($this->handle);
        return $result;
    }

    public function getFromSource($what=NULL) {
        $data;
        switch ($what) {
            /*case "registry":
                $data=$this->getRegistry();
                break;*/
            case "code":
                $data=$this->getCode($this->search_key);
                break;
            default:
                $data="Error: No input\n";
        }
        return $data;
    }

    /*function  __destruct() {
        fclose($this->handle);
    }*/
}

?>
