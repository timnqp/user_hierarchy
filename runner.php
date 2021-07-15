<?php
require 'src/UserRole.php';
require 'seed/Seeder.php';

// Data set. Edit the $setId value to change the data set.
$setId = 0;
$roles = Seeder::getRolesDataSet($setId);
$users = Seeder::getUsersDataSet($setId);

// Initial setup.
$userRole = new UserRole();
$userRole->setRoles($roles);
$userRole->setUsers($users);

// Query for Subordinate.
$userId = 1; // Edit the parameter to change user ID.
print($userRole->getSubOrdinates($userId));
