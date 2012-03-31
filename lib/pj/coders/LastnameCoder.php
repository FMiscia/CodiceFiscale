<?php

namespace pj\coders;

class LastnameCoder
{
        private static
        $_vowels = array("A", "E", "I", "O", "U");

        protected
        function _appendX($string)
        {
                $s = $string;

                while (\strlen($s) < 3) {
                        $s .= 'X';
                }

                return $s;
        }

        protected
        function _delVowels($string)
        {
                $s = "";

                for ($i = 0, $l = \strlen($string); $i < $l; ++$i) {
                        // We are using a capitalized alphabet.
                        $character = \strtoupper($string[$i]);
                        if (! \in_array($character, self::$_vowels)) {
                                $s .= $character;
                        }
                }

                return $s;
        }

        public
        function getCode($lastname)
        {
                $code = \str_replace(" ", "", $lastname);

                if (\strlen($code) < 3) {
                        return $this->_appendX($code);
                }

                $code = $this->_delVowels($code);
                $length = \strlen($code);
        
                if ($length == 3) {
                        return $code;
                }

                if ($length > 3) {
                        return \substr($code, 0, 3);
                }
        
                return \substr($lastname, 0, 3);
        }
}
