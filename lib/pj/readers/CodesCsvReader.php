<?php

namespace pj\readers;

require_once 'pj/readers/CsvReader.php';

class CodesCsvReader
{
        private
        $_reader;

        public
        function __construct($file)
        {
                $this->_reader = new CsvReader($file);
        }

        public
        function each($fn)
        {
                foreach ($this->_reader as $k => $fields) {                        
                        // Skips empty lines (last empty one included).
                        if (\is_array($fields) && \count($fields) > 1) {
                                \call_user_func_array($fn, $fields);
                        }
                }

                $this->_reader->rewind();

                return $this;
        }
}
