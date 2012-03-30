<?php

namespace pj\coders;

require_once 'pj/coders/DateCoder.php';
require_once 'pj/coders/EvilCoder.php';
require_once 'pj/coders/FirstnameCoder.php';
require_once 'pj/coders/LastnameCoder.php';
require_once 'pj/coders/TownCoder.php';

class Aggregator
{
        private
        $_code;

        public
        function __construct($towns, $lastname, $firstname, $birthday, $town, $gender)
        {
                $lastnameCoder  = new LastnameCoder();
                $firstnameCoder = new FirstnameCoder();
                $townCoder      = new TownCoder($towns);
                $birthdayCoder  = new DateCoder();
                $evilCoder      = new EvilCoder();

                $this->_code = $lastnameCoder->getCode($lastname)
                             . $firstnameCoder->getCode($firstname)
                             . $birthdayCoder->getCode($birthday, $gender)
                             . $townCoder->getCode($town)
                ;
                $this->_code .= $evilCoder->getCode($this->_code);
        }

        public function getCode()
        {
                return $this->_code;
        }
}
