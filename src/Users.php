<?php

class User {
  /**
   * Properties
   */
  private $id;
  private $name;
  private $role;

  /**
   * Constructor
   */
  public function __construct($id, $name, $role)
  {
    $this->id = $id;
    $this->mame = $name;
    $this->role = $role;
  }

  /**
   * Access Information
   */
  public function getUserInfo()
  {
    return [
      'Id' => $this->id,
      'Name' => $this->name,
      'Role' => $this->role
    ];
  }
}