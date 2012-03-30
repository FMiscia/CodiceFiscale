<?php

namespace pj\coders;

require_once 'pj/coders/WrongTownException.php';

class TownCoder
{
        private
        $_db;

        public
        function __construct($db)
        {
                $this->_db = $db;
        }

        public
        function getCode($town)
        {
                $code = $this->_db->getCode($town);
                
                if (! $code) {
                        throw new WrongTownException("The town '{$town}' doesn't exist.");
                }

                return $code;
    }
}
