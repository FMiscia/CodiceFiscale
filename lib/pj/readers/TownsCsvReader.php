<?php

namespace pj\readers;

require_once 'pj/readers/CsvReader.php';

class TownsCsvReader
{
        private
        $_reader;

        private
        $_data = array();

        public
        function __construct($file)
        {
                $this->_reader = new CsvReader($file);

                foreach ($this->_reader as $k => $fields) {                        
                        // Skips empty lines (last empty one included).
                        if (\is_array($fields) && \count($fields) > 1) {
                                $this->_data[] = $fields;
                        }
                }

                $this->_reader->rewind();
        }

        public
        function getCode($town)
        {
                $query = \strtoupper($town);

                foreach ($this->_data as $k => $v) {
                        list($code, $t, $province) = $v;

                        if ($query == $t) {
                                return $code;
                        }
                }

                return false;
    }
}
