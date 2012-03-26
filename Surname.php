<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Surname
 *
 * @author francesco
 */


class Surname extends MyName {

    //put your code here
    private $surname;
    private $size;

    function __construct($sn) {
        $this->surname = str_replace(" ", "", $sn);
        $this->size = strlen($this->surname);
    }

    protected function completeWithX() {

        while (strlen($this->surname) < 3) {
            $this->surname.= 'X';
        }
    return $this->surname;
    }

    protected function keepConsonant() {
        $temp = $this->surname;
        $result="";
        for ($i = 0; $i < $this->size AND strlen($result) < 3; $i++) {
            if (!in_array($temp[$i], MyName::$vocali))
                $result .= $temp[$i];
        }
        return $result;
    }

    protected function giveMeTheCode() {

        if ($this->size < 3)
            return $this->completeWithX();
        $temp = $this->keepConsonant();
        $new_size = strlen($temp);
        if ($new_size == 3)
            return substr($temp, 0, 3);
        else if ($new_size < 3)
            return substr($this->surname, 0, 3);
    }

    public function getName() {

        return $this->giveMeTheCode();
    }

}

?>
