<?php

namespace pj\readers;

require_once 'pj/readers/FileOpeningException.php';

class CsvReader implements \Iterator
{
        private
        $_file;

        private
        $_separato;

        private
        $_stream;

        private
        $_position = 0;

        public
        function __construct($file, $separator = ',')
        {
                $this->_file      = $file;
                $this->_separator = $separator;
                $this->_stream    = \fopen($file, 'rb', true);

                if (! $this->_stream) {
                        throw new FileOpeningException("Cannot open file '{$file}'.");
                }
        }

        public
        function __destruct()
        {
                if ($this->_stream) {
                        \fclose($this->_stream);
                }
        }

        public
        function rewind()
        {
                $this->position = 0;
                \fseek($this->_stream, 0);

                return $this;
        }

        public
        function key()
        {
                return $this->_position;
        }
    
        public
        function current()
        {
                return \fgetcsv($this->_stream, 0, $this->_separator);
        }

        public
        function next()
        {
                ++$this->_position;

                return $this;
        }

        public
        function valid()
        {
                return ! \feof($this->_stream);
        }
}
