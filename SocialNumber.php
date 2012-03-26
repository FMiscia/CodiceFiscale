<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SocialNumber
 *
 * @author francesco
 */
require 'EvilCode.php';
require 'FileSource.php';
require 'TownCode.php';
require 'Date.php';
require 'MyName.php';
require 'Name.php';
require 'Surname.php';

class SocialNumber {
    //put your code here
    private $name;
    private $surname;
    private $date;
    private $town;
    private $evil_code;


    function  __construct($s,$n,$d,$l,$sx) {

        $this->name=new Name($n);
        $this->surname=new Surname($s);
        $this->town=new TownCode($l);
        $this->date= new Date($d,$sx);
        $this->evil_code=new EvilCode(null);
    }

    public function letsGo($s){
        $temp="";
        $temp.=$this->surname->getName();
        $temp.=$this->name->getName();
        $temp.=$this->date->getDateCode();
        $temp.=$this->town->takeFromFile($s);
        $this->evil_code->setAll($temp);
        $temp.=$this->evil_code->getEvilCode();
        return $temp;

    }
}
?>
