<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Date
 *
 * @author francesco
 */
class Date {

    //put your code here
    private $day;
    private $month;
    private $year;
    private $sex;
    private static $mesiclassic = array("gennaio", "febbraio", "marzo", "aprile", "maggio", "giugno", "luglio", "agosto", "settembre", "ottobre", "novembre", "dicembre");
    private static $mesi = array("gennaio" => "A", "febbraio" => "B", "marzo" => "C", "aprile" => "D", "maggio" => "E", "giugno" => "H",
        "luglio" => "L", "agosto" => "M", "settembre" => "P", "ottobre" => "R", "novembre" => "S", "dicembre" => "T");

    function __construct($d, $s) {
        list($this->day, $this->month, $this->year) = explode("/", $d);
        $this->sex = $s;
        $this->checkYear();
        $this->checkMonth();
        try{
            $this->checkDay();
        }catch(Exception $exp){
            print ($exp->getMessage());
            exit;
        }
    }
    private function checkYear() {
        if (strlen($this->year) <= 4 && strlen($this->year) > 2)
            $this->year = $this->year[2] . $this->year[3];
        else if (strlen($this->year) < 2)
            $this->year = "00";
    }

    private function checkDay() {
        if (strlen($this->day) == 1)
            $this->day = "0" . $this->day;
        if ($this->sex == "F" || $this->sex == "f") {
            $this->day += 40;
        }
        if($this->sex!="m" AND $this->sex!="M" AND $this->sex!="F" AND $this->sex!="f")
                throw new Exception ("Allowed chars are: f,F,m,M\n") ;
    }

    private function giveMonth($month) {

        $temp = (int) $month;
        $m = self::$mesiclassic[$temp - 1];

        return $m;
    }

    private function checkMonthType($m) {

        if ($m[0] == "0") {
            $m = $m[1];
            $m = $this->giveMonth($m);
        }
        if ($m[0] == "1" OR $m[0] == "2" OR $m[0] == "3" OR $m[0] == "4" OR $m[0] == "5" OR $m[0] == "6" OR $m[0] == "7" OR $m[0] == "8" OR $m[0] == "9")
            $m = $this->giveMonth($m);

        return $m;
    }

    private function checkMonth() {
        $this->month = $this->checkMonthType($this->month);
        $this->month = strtolower($this->month);
        $this->month = self::$mesi[$this->month];
    }

    public function getDateCode(){
        return $this->year.$this->month.$this->day;
    }

}

?>
