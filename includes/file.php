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
        return $this->size;
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