<?php

class User
{
  /**
   * Properties
   */
  private $id; // User ID
  private $name; // User name
  private $role; // Role ID

  /**
   * Constructor
   * @param int $id
   * @param string $name
   * @param int $role
   */
  public function __construct($id, $name, $role)
  {
    $this->id = $id;
    $this->name = $name;
    $this->role = $role;
  }

  /**
   * Access Information. Used for printing user info.
   * @return array
   */
  public function getUserInfo(): array
  {
    return [
      'Id' => $this->id,
      'Name' => $this->name,
      'Role' => $this->role
    ];
  }

  /**
   * Get the current role of this user
   * @return int
   */
  public function getRole(): int
  {
    return $this->role;
  }
}
