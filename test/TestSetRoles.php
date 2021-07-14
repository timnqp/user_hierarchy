<?php

use PHPUnit\Framework\TestCase;

require dirname(__DIR__, 1) . '/src/UserRole.php';
require 'Seeder.php';

final class SetRolesTest extends TestCase
{
  public function testSetRoles_Set0(): void
  {
    $roles = Seeder::getRolesDataSet(0);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $actual = $userRole->getRoles();

    $expected = array(
      array(
        'Id' => 0,
        'Name' => null,
        'Parent' => null,
        'Children' => array(
          0 => 1
        )
      ),
      array(
        'Id' => 1,
        'Name' => 'System Administrator',
        'Parent' => 0,
        'Children' => array(
          0 => 2
        ),
      ),
      array(
        'Id' => 2,
        'Name' => 'Location Manager',
        'Parent' => 1,
        'Children' => array(
          0 => 3
        )
      ),
      array(
        'Id' => 3,
        'Name' => 'Supervisor',
        'Parent' => 2,
        'Children' => array(
          0 => 4,
          1 => 5
        )
      ),
      array(
        'Id' => 4,
        'Name' => 'Employee',
        'Parent' => 3,
        'Children' => array()
      ),
      array(
        'Id' => 5,
        'Name' => 'Trainer',
        'Parent' => 3,
        'Children' => array()
      ),
    );

    $this->assertEqualsCanonicalizing($expected, $actual);
  }
}
