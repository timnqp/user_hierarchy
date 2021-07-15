<?php

use PHPUnit\Framework\TestCase;

require dirname(__DIR__, 1) . '/src/UserRole.php';
require dirname(__DIR__, 1) . '/seed/Seeder.php';

final class FunctionalTest extends TestCase
{
  public function testSetRoles_Set0(): void
  {
    $roles = Seeder::getRolesDataSet(0);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $actual = $userRole->getRoles();

    $expected = [
      [
        'Id' => 0,
        'Name' => null,
        'Parent' => -1,
        'Children' => [1]
      ],
      [
        'Id' => 1,
        'Name' => 'System Administrator',
        'Parent' => 0,
        'Children' => [2],
      ],
      [
        'Id' => 2,
        'Name' => 'Location Manager',
        'Parent' => 1,
        'Children' => [3]
      ],
      [
        'Id' => 3,
        'Name' => 'Supervisor',
        'Parent' => 2,
        'Children' => [4, 5]
      ],
      [
        'Id' => 4,
        'Name' => 'Employee',
        'Parent' => 3,
        'Children' => []
      ],
      [
        'Id' => 5,
        'Name' => 'Trainer',
        'Parent' => 3,
        'Children' => []
      ],
    ];

    $this->assertEqualsCanonicalizing($expected, $actual);
  }

  public function testSetUsers_Set0(): void
  {
    $users = Seeder::getUsersDataSet(0);
    $userRole = new UserRole();
    $userRole->setUsers($users);
    $actual = $userRole->getUsers();

    $expected = [
      [
        'Id' => 1,
        'Name' => 'Adam Admin',
        'Role' => 1
      ],
      [
        'Id' => 2,
        'Name' => 'Emily Employee',
        'Role' => 4
      ],
      [
        'Id' => 3,
        'Name' => 'Sam Supervisor',
        'Role' => 3
      ],
      [
        'Id' => 4,
        'Name' => 'Mary Manager',
        'Role' => 2
      ],
      [
        'Id' => 5,
        'Name' => 'Steve Trainer',
        'Role' => 5
      ]
    ];

    $this->assertEqualsCanonicalizing($expected, $actual);
  }

  public function testGetSubordinates_Set0(): void
  {
    $roles = Seeder::getRolesDataSet(0);
    $users = Seeder::getUsersDataSet(0);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $userRole->setUsers($users);

    $actual3 = $userRole->getSubOrdinates(3, true);
    $expected3 = [
      [
        'Id' => 2,
        'Name' => 'Emily Employee',
        'Role' => 4
      ],
      [
        'Id' => 5,
        'Name' => 'Steve Trainer',
        'Role' => 5
      ]
    ];
    $this->assertEqualsCanonicalizing($expected3, $actual3);
  }

  public function testSetRoles_Set1(): void
  {
    $roles = Seeder::getRolesDataSet(1);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $actual = $userRole->getRoles();

    $expected = [
      [
        'Id' => 0,
        'Name' => null,
        'Parent' => -1,
        'Children' => [1]
      ],
      [
        'Id' => 1,
        'Name' => 'System Administrator',
        'Parent' => 0,
        'Children' => [2, 6, 7],
      ],
      [
        'Id' => 2,
        'Name' => 'Location Manager',
        'Parent' => 1,
        'Children' => [3]
      ],
      [
        'Id' => 3,
        'Name' => 'Supervisor',
        'Parent' => 2,
        'Children' => [4, 5]
      ],
      [
        'Id' => 4,
        'Name' => 'Employee',
        'Parent' => 3,
        'Children' => []
      ],
      [
        'Id' => 5,
        'Name' => 'Trainer',
        'Parent' => 3,
        'Children' => []
      ],
      [
        'Id' => 6,
        'Name' => 'Rain Maker',
        'Parent' => 1,
        'Children' => []
      ],
      [
        'Id' => 7,
        'Name' => 'Magician',
        'Parent' => 1,
        'Children' => [8]
      ],
      [
        'Id' => 8,
        'Name' => 'Magician Trainee',
        'Parent' => 7,
        'Children' => []
      ]
    ];

    $this->assertEqualsCanonicalizing($expected, $actual);
  }

  public function testSetUsers_Set1(): void
  {
    $users = Seeder::getUsersDataSet(1);
    $userRole = new UserRole();
    $userRole->setUsers($users);
    $actual = $userRole->getUsers();

    $expected = [
      [
        'Id' => 1,
        'Name' => 'Adam Admin',
        'Role' => 1
      ],
      [
        'Id' => 2,
        'Name' => 'Emily Employee',
        'Role' => 4
      ],
      [
        'Id' => 3,
        'Name' => 'Sam Supervisor',
        'Role' => 3
      ],
      [
        'Id' => 4,
        'Name' => 'Mary Manager',
        'Role' => 2
      ],
      [
        'Id' => 5,
        'Name' => 'Steve Trainer',
        'Role' => 5
      ],
      [
        'Id' => 6,
        'Name' => 'John Rain Maker',
        'Role' => 6
      ],
      [
        'Id' => 7,
        'Name' => 'Lee Magician',
        'Role' => 7
      ],
      [
        'Id' => 8,
        'Name' => 'Sarah Magician Trainee',
        'Role' => 8
      ]
    ];

    $this->assertEqualsCanonicalizing($expected, $actual);
  }

  public function testGetSubordinates_Set1(): void
  {
    $roles = Seeder::getRolesDataSet(1);
    $users = Seeder::getUsersDataSet(1);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $userRole->setUsers($users);

    $actual1 = $userRole->getSubOrdinates(1, true);
    $expected1 = [
      [
        'Id' => 2,
        'Name' => 'Emily Employee',
        'Role' => 4
      ],
      [
        'Id' => 3,
        'Name' => 'Sam Supervisor',
        'Role' => 3
      ],
      [
        'Id' => 4,
        'Name' => 'Mary Manager',
        'Role' => 2
      ],
      [
        'Id' => 5,
        'Name' => 'Steve Trainer',
        'Role' => 5
      ],
      [
        'Id' => 6,
        'Name' => 'John Rain Maker',
        'Role' => 6
      ],
      [
        'Id' => 7,
        'Name' => 'Lee Magician',
        'Role' => 7
      ],
      [
        'Id' => 8,
        'Name' => 'Sarah Magician Trainee',
        'Role' => 8
      ]
    ];
    $this->assertEqualsCanonicalizing($expected1, $actual1);
  }

  public function testGetSubordinatesBoundary_Set1(): void
  {
    $roles = Seeder::getRolesDataSet(1);
    $users = Seeder::getUsersDataSet(1);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $userRole->setUsers($users);

    $actual8 = $userRole->getSubOrdinates(8, true);
    $expected8 = [];
    $this->assertEqualsCanonicalizing($expected8, $actual8);

    $actual2 = $userRole->getSubOrdinates(2, true);
    $expected2 = [];
    $this->assertEqualsCanonicalizing($expected2, $actual2);
  }

  public function testGetSubordinatesErrorNoUser_Set1(): void
  {
    $roles = Seeder::getRolesDataSet(1);
    $users = Seeder::getUsersDataSet(1);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $userRole->setUsers($users);

    $errorHappened = false;
    try {
      $userRole->getSubOrdinates(12, true);
    } catch (\Exception $e) {
      $errorHappened = true;
      $this->assertEquals($e->getMessage(), "User 12 not existed!");
    }
    $this->assertTrue($errorHappened);
  }

  public function testSetRoles_Set2(): void
  {
    $roles = Seeder::getRolesDataSet(2);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $actual = $userRole->getRoles();

    $expected = [
      [
        'Id' => 0,
        'Name' => null,
        'Parent' => -1,
        'Children' => [1, 9]
      ],
      [
        'Id' => 1,
        'Name' => 'System Administrator',
        'Parent' => 0,
        'Children' => [2, 6, 7],
      ],
      [
        'Id' => 2,
        'Name' => 'Location Manager',
        'Parent' => 1,
        'Children' => [3]
      ],
      [
        'Id' => 3,
        'Name' => 'Supervisor',
        'Parent' => 2,
        'Children' => [4, 5]
      ],
      [
        'Id' => 4,
        'Name' => 'Employee',
        'Parent' => 3,
        'Children' => []
      ],
      [
        'Id' => 5,
        'Name' => 'Trainer',
        'Parent' => 3,
        'Children' => []
      ],
      [
        'Id' => 6,
        'Name' => 'Rain Maker',
        'Parent' => 1,
        'Children' => []
      ],
      [
        'Id' => 7,
        'Name' => 'Magician',
        'Parent' => 1,
        'Children' => [8]
      ],
      [
        'Id' => 8,
        'Name' => 'Magician Trainee',
        'Parent' => 7,
        'Children' => []
      ],
      [
        'Id' => 9,
        'Name' => 'Another Department Manager',
        'Parent' => 0,
        'Children' => [10, 12]
      ],
      [
        'Id' => 10,
        'Name' => 'Another Department Assistant',
        'Parent' => 9,
        'Children' => [11]
      ],
      [
        'Id' => 11,
        'Name' => 'Another Department Employee',
        'Parent' => 10,
        'Children' => []
      ],
      [
        'Id' => 12,
        'Name' => 'Another Department Secretary',
        'Parent' => 9,
        'Children' => []
      ]
    ];

    $this->assertEqualsCanonicalizing($expected, $actual);
  }

  public function testSetUsers_Set2(): void
  {
    $users = Seeder::getUsersDataSet(2);
    $userRole = new UserRole();
    $userRole->setUsers($users);
    $actual = $userRole->getUsers();

    $expected = [
      [
        'Id' => 1,
        'Name' => 'Adam Admin',
        'Role' => 1
      ],
      [
        'Id' => 2,
        'Name' => 'Emily Employee',
        'Role' => 4
      ],
      [
        'Id' => 3,
        'Name' => 'Sam Supervisor',
        'Role' => 3
      ],
      [
        'Id' => 4,
        'Name' => 'Mary Manager',
        'Role' => 2
      ],
      [
        'Id' => 5,
        'Name' => 'Steve Trainer',
        'Role' => 5
      ],
      [
        'Id' => 6,
        'Name' => 'John Rain Maker',
        'Role' => 6
      ],
      [
        'Id' => 7,
        'Name' => 'Lee Magician',
        'Role' => 7
      ],
      [
        'Id' => 8,
        'Name' => 'Sarah Magician Trainee',
        'Role' => 8
      ],
      [
        'Id' => 9,
        'Name' => 'Lionel Messi',
        'Role' => 9
      ],
      [
        'Id' => 10,
        'Name' => 'Christiano Ronaldo',
        'Role' => 11
      ],
      [
        'Id' => 11,
        'Name' => 'Jadon Sancho',
        'Role' => 11
      ],
      [
        'Id' => 12,
        'Name' => 'Harry Kane',
        'Role' => 12
      ]
    ];

    $this->assertEqualsCanonicalizing($expected, $actual);
  }

  public function testGetSubordinatesExpanded_Set2(): void
  {
    $roles = Seeder::getRolesDataSet(2);
    $users = Seeder::getUsersDataSet(2);
    $userRole = new UserRole();
    $userRole->setRoles($roles);
    $userRole->setUsers($users);

    $actual1 = $userRole->getSubOrdinates(1, true);
    $expected1 = [
      [
        'Id' => 2,
        'Name' => 'Emily Employee',
        'Role' => 4
      ],
      [
        'Id' => 3,
        'Name' => 'Sam Supervisor',
        'Role' => 3
      ],
      [
        'Id' => 4,
        'Name' => 'Mary Manager',
        'Role' => 2
      ],
      [
        'Id' => 5,
        'Name' => 'Steve Trainer',
        'Role' => 5
      ],
      [
        'Id' => 6,
        'Name' => 'John Rain Maker',
        'Role' => 6
      ],
      [
        'Id' => 7,
        'Name' => 'Lee Magician',
        'Role' => 7
      ],
      [
        'Id' => 8,
        'Name' => 'Sarah Magician Trainee',
        'Role' => 8
      ]
    ];
    $this->assertEqualsCanonicalizing($expected1, $actual1);

    // print_r($userRole->getUsers());

    $actual9 = $userRole->getSubOrdinates(9, true);
    $expected9 = [
      [
        'Id' => 10,
        'Name' => 'Christiano Ronaldo',
        'Role' => 11
      ],
      [
        'Id' => 11,
        'Name' => 'Jadon Sancho',
        'Role' => 11
      ],
      [
        'Id' => 12,
        'Name' => 'Harry Kane',
        'Role' => 12
      ]
    ];
    $this->assertEqualsCanonicalizing($expected9, $actual9);
  }
}
