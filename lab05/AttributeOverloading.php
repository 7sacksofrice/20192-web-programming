<?php
    class PropertyTest {
        private $data = array();
        public $declared = 1;
        private $hidden = 2;
        
        public function __set($name, $value) {
            echo "Setting '$name' to '$value'<br>";
            $this->data[$name] = $value;
        }
        public function __get($name) {
            echo "Getting '$name' <br>";
            if(array_key_exists($name, $this->data))
            {
                return $this->data[$name];
            }
            
            $trace = debug_backtrace();
            trigger_error(
              'Undefined property via __get(): ' . $name .
              ' in ' . $trace[0]['file'] . 
              ' on line ' . $trace[0]['line'], 
              E_USER_NOTICE);

            return null;
        }
        
        public function __isset($name) {
            echo "Is '$name' set?<br>";
            return isset($this->data[$name]);
        }
        public function __unset($name) {
            echo "Unsetting '$name'<br>";
            unset($this->data[$name]);
        }
        
        public function getHidden() {
            return $this->hidden;
        }
    }
    
    $obj = new PropertyTest;
    
    $obj->a = 1;
    echo $obj->a . '<br>';
    
    var_dump(isset($obj->a));
    echo '<br>';
    unset($obj->a);
    var_dump(isset($obj->a));
    echo '<br>';
    
    echo $obj->declared;
    echo '<br>';
    echo "Let's experiment with the private property named 'hidden':<br>";
    echo "Privates are visible inside the class, so __get() not used...<br>";

    echo $obj->getHidden();
    echo '<br>';
    
    echo "Privates not visible outside of class, so __get() is used...<br>";
    echo $obj->hidden;
    echo '<br>';
    
?>