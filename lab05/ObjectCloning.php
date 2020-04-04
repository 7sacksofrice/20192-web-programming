<?php
class ObjectTracker {
  private static $nextSerial = 0;
  private $id, $name;

  function __construct($name)
  {
    $this->name = $name;
    $this->id = ++self::$nextSerial;
  }

  function __clone()
  {
    $this->name = "Clone of $this->name";
    $this->id = ++self::$nextSerial;  
  }

  

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }
}

$ot = new ObjectTracker("Zeev's Object");
$ot2 = clone $ot;
$ot2->setName("Another Object");

//1 Zeev's Object
print($ot->getId() . " ". $ot->getName() . "<br>");

//2 Clone of Zeev's Object
print($ot2->getId() . " ". $ot2->getName() . "<br>");

?>