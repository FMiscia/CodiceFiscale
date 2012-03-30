<?php

namespace pj\coders;

require_once 'pj/coders/WrongGenderException.php';
require_once 'pj/coders/WrongMonthException.php';

class DateCoder
{
        private static
        $_months = array(
                "gennaio"   => "A",
                "febbraio"  => "B",
                "marzo"     => "C",
                "aprile"    => "D",
                "maggio"    => "E",
                "giugno"    => "H",
                "luglio"    => "L",
                "agosto"    => "M",
                "settembre" => "P",
                "ottobre"   => "R", 
                "novembre"  => "S", 
                "dicembre"  => "T"
        );

        protected
        function _getDay($day, $gender)
        {
                $day =(int) $day;
                if ($gender == "F") {
                    $day += 40;
                }
                $day =(string) $day;

                if (\strlen($day) == 1) {
                        $day = "0" . $day;
                }
                
                if ($gender != "M" && $gender != "F") {
                        throw new WrongGenderException(
                                "'{$gender}' is not an allowed gender character."
                                . " Allowed are (m|M|f|F).\n"
                        );
                }

                return $day;
        }

        protected
        function _getMonth($month)
        {
                $m = $month;

                if (\strlen($m) <= 2) {
                        // Month written as digits.
                        $months = \array_keys(self::$_months);
                        $m = $months[((int) $m) - 1];
                } else {
                        // We are using lowercase dictionary keys.
                        $m = \strtolower($m);
                }

                if (! isset(self::$_months[$m])) {
                        throw new WrongMonthException("'{$month}' is not a valid month.\n");
                }

                return self::$_months[$m];
        }

        protected
        function _getYear($year)
        {
                $y = $year;

                if (\strlen($y) > 2) {
                        $y = $y[2] . $y[3];
                }

                return $y;
        }

        public
        function getCode($birthday, $gender)
        {
                // We'll check against capitalized characters.
                $gender = \strtoupper($gender);

                list($day, $month, $year) = \explode("/", $birthday);

                return $this->_getYear($year)
                       . $this->_getMonth($month)
                       . $this->_getDay($day, $gender)
                ;
        }
}
