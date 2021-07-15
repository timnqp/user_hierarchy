<?php

require 'Role.php';
require 'User.php';

class UserRole
{
  /**
   * Properties
   */
  private $roles; // The hash table to keep track of Role objects
  private $users; // The hash table to keep track of User objects
  private $usersOfRoles; // The Hash table to keep track which users are under a role

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->roles = [];
    $this->users = [];
    $this->usersOfRoles = [];
  }

  /**
   * Process input roles. Store them in private property $roles
   * @param array $roles
   */
  public function setRoles(array $roles): void
  {
    // Error handling
    if (empty($roles)) {
      throw new Exception('There is no role!');
    }

    // Time Complexity: O(r) with 'r' is the number of roles
    foreach ($roles as $role) {
      // Error with input
      if (!(isset($role['Id']) && isset($role['Name']) && isset($role['Parent']))) {
        throw new Exception('Role information missing');
      }

      // Creating new Role in the Hash index if not existed
      if (!isset($this->roles[$role['Id']])) {
        $this->roles[$role['Id']] = new Role($role['Id'], $role['Name'], $role['Parent']);
      } else {
        // This role object might be pre-created before when one of its child was created. (**)
        if (
          $this->roles[$role['Id']]->getName() === null &&
          $this->roles[$role['id']]->getParent() === null
        ) {
          // Update name & parent accordingly.
          $this->roles[$role['Id']]->setName($role['Name']);
          $this->roles[$role['Id']]->setParent($role['Parent']);
        }
      }

      // Adding this ID to Parent childRoleIDs list.
      if (!isset($this->roles[$role['Parent']])) {

        // If the parent role wasn't existed.
        // Then create new one, ignore role name & parent for now.
        // This explains the logic for (**) above.
        $this->roles[$role['Parent']] = new Role($role['Parent']);
      }

      // Add the corrent role as a child role for the parent role.
      $this->roles[$role['Parent']]->addChild($role['Id']);
    }
  }

  /**
   * Process input users. Store them in private property $users
   * @param array $users
   */
  public function setUsers(array $users): void
  {
    if (empty($users)) {
      throw new Exception('There is no user');
    }

    // Time Complexity: O(u) with 'u' is the number of users
    foreach ($users as $user) {
      if (!(isset($user['Id']) && isset($user['Name']) && isset($user['Role']))) {
        throw new Exception('User information missing');
      }

      // Store user objects in a hash table.
      $this->users[$user['Id']] = new User($user['Id'], $user['Name'], $user['Role']);

      // The User-Role relationship hash table should keep track of ..
      // .. which users are under this role.
      // If the index $user['Role'] wasn't existed, create one.
      if (!isset($this->usersOfRoles[$user['Role']])) {
        $this->usersOfRoles[$user['Role']] = [];
      }
      // Then add the role into the User-Role relationship.
      $this->usersOfRoles[$user['Role']][] = $user['Id'];
    }
  }

  /**
   * Main logic to query the Subordinates from a user Id
   * @param string $id
   * @return string
   */
  public function getSubOrdinates(int $id): string
  {
    if (!isset($this->users[$id])) {
      throw new Exception("User $id not existed!");
    }

    $userObj = $this->users[$id];
    $userRoleID = $userObj->getRole();

    // Recursion call through all the child roles to get all the subordinates
    return json_encode($this->_getSubOrdinatesFromRoleId($userRoleID));
  }

  /**
   * Recursive call for getting subordinates
   * @param int $roleId
   * @return array
   */
  private function _getSubOrdinatesFromRoleId(int $roleId): array
  {
    $childRoles = $this->roles[$roleId]->getChildren();

    if (empty($childRoles)) {
      // If this role has to child role.
      // This is also the base case of the recursion.
      return [];
    } else {
      // The set to be returned
      $allSubOrdinates = [];

      // Else, loop through the child role(s)
      foreach ($childRoles as $childRole) {

        // Get all users of this child role
        $users = $this->usersOfRoles[$childRole];

        // Double check if users of this child role exist
        if (isset($users) && !empty($users)) {

          // Loop through each user of this child role
          foreach ($users as $userID) {

            // For each user, get her/his information
            $userObj = $this->users[$userID];
            $allSubOrdinates[] = $userObj->getUserInfo();
          }
        }

        // Get all users of the next generation(s) recursively
        $allSubOrdinates = array_merge($allSubOrdinates, $this->_getSubOrdinatesFromRoleId($childRole));
      }

      return $allSubOrdinates;
    }
  }

  /**
   * Get all the roles. For testing purpose.
   * @return array
   */
  public function getRoles(): array
  {
    return array_map(function ($role) {
      return $role->getRoleInfo();
    }, $this->roles);
  }

  /**
   * Get all the users. For testing purpose.
   * @return array
   */
  public function getUsers(): array
  {
    return array_map(function ($user) {
      return $user->getUserInfo();
    }, $this->users);
  }
}
