<?php

class Role {
  /**
   * Properties
   */
  private $id;
  private $name;
  private $parentId;

  /**
   * Constructor
   */
  public function __construct($id, $name, $parentId)
  {
    $this->id = $id;
    $this->mame = $name;
    $this->parentId = $parentId;
  }
}