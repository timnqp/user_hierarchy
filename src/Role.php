<?php

class Role
{
  /**
   * Properties
   */
  private $id; // Role id
  private $name; // Role name
  private $parent; // Role ID of parent role
  private $children; // Role IDs of child roles

  /**
   * Constructor
   * @param int $id
   * @param string $name nullable
   * @param int $parent nullable
   */
  public function __construct(int $id, string $name = null, int $parent = null)
  {
    $this->id = $id;
    $this->name = $name;
    $this->parent = $parent;
    $this->children = [];
  }

  /**
   * Set the new name for the role
   * @param string $name
   */
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  /**
   * Get the current name of the role
   * @return mixed
   */
  public function getName(): mixed
  {
    return $this->name;
  }

  /**
   * Set the parent ID for the role
   * @param string $parent
   */
  public function setParent(string $parent): void
  {
    $this->parent = $parent;
  }

  /**
   * Get the current parent ID of the role
   * @return mixed
   */
  public function getParent(): mixed
  {
    return $this->parent;
  }

  /**
   * Add child ID to the child roles' ID list
   * @param int $id
   */
  public function addChild(int $id): void
  {
    $this->children[] = $id;
  }

  /**
   * Get all IDs of the child roles
   * @return array
   */
  public function getChildren(): array
  {
    return $this->children;
  }

  /**
   * Access Information. Used for printing role info for testing.
   * @return array
   */
  public function getRoleInfo(): array
  {
    return [
      'Id' => $this->id,
      'Name' => $this->name,
      'Parent' => $this->parent,
      'Children' => $this->children
    ];
  }
}
