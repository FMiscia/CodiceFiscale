<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nome
 *
 * @author francesco
 */


class Name extends MyName {

    //put your code here
    private $my_name;
    private $size;

    function __construct($name) {

        $this->my_name = str_replace(" ", "", $name);
        $this->my_name = strtolower($this->my_name);
        $this->size = strlen($this->my_name);
    }

    protected function completeWithX() {

        while (strlen($this->my_name) < 3) {
            $this->my_name.= 'X';
        }
        return $this->my_name;
    }

    protected function keepConsonant(){
        $temp=$this->my_name;
        $result=null;
        for ($i = 0; $i < $this->size; $i++) {
            if (!in_array($temp[$i], MyName::$vocali))
                $result .= $temp[$i];
        }
        return $result;
    }

    protected function giveMeTheCode(){
        if($this->size<3) return $this->completeWithX ();
        $temp=$this->keepConsonant();
        $new_size=strlen($temp);
        if($new_size==3) return $temp;
        else if($new_size > 3) return $temp[0].$temp[2].$temp[3];
        else return substr($this->my_name,0,3);
    }

    public function getName(){

        return $this->giveMeTheCode ();

    }
}

?>
