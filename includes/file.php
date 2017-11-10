<?php
class File{
    private $name;
    private $path;
    private $size;
    
    public function __construct($name, $path, $size){
        $this->name = $name;
        $this->path = $path;
        $this->size = $size;
    }
    
    function getName() {
        return $this->name;
    }

    function getPath() {
        return $this->path;
    }

    function getSize() {
        if ($this->size >= 1073741824)
        {
            $bytes = number_format($this->size / 1073741824, 2) . ' GB';
        }
        else if ($this->size >= 1048576)
        {
            $bytes = number_format($this->size / 1048576, 2) . ' MB';
        }
        else if ($this->size >= 1024)
        {
            $bytes = number_format($this->size / 1024, 2) . ' KB';
        }
        else if ($this->size > 1)
        {
            $bytes = $this->size . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $this->size . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setSize($size) {
        $this->size = $size;
    }


}
?>