<?php

class Seeder
{
  private static $sets = [
    0 => [
      'roles' => [
        [
          'Id' => 1,
          'Name' => 'System Administrator',
          'Parent' => 0
        ],
        [
          'Id' => 2,
          'Name' => 'Location Manager',
          'Parent' => 1,
        ],
        [
          'Id' => 3,
          'Name' => 'Supervisor',
          'Parent' => 2,
        ],
        [
          'Id' => 4,
          'Name' => 'Employee',
          'Parent' => 3,
        ],
        [
          'Id' => 5,
          'Name' => 'Trainer',
          'Parent' => 3,
        ]
      ],
      'users' => [
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
      ]
    ],
    1 => [
      'roles' => [
        [
          'Id' => 1,
          'Name' => 'System Administrator',
          'Parent' => 0
        ],
        [
          'Id' => 2,
          'Name' => 'Location Manager',
          'Parent' => 1,
        ],
        [
          'Id' => 3,
          'Name' => 'Supervisor',
          'Parent' => 2,
        ],
        [
          'Id' => 4,
          'Name' => 'Employee',
          'Parent' => 3,
        ],
        [
          'Id' => 5,
          'Name' => 'Trainer',
          'Parent' => 3,
        ],
        [
          'Id' => 6,
          'Name' => 'Rain Maker',
          'Parent' => 1
        ],
        [
          'Id' => 7,
          'Name' => 'Magician',
          'Parent' => 1
        ],
        [
          'Id' => 8,
          'Name' => 'Magician Trainee',
          'Parent' => 7
        ]
      ],
      'users' => [
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
      ]
    ],
    2 => [
      'roles' => [
        [
          'Id' => 1,
          'Name' => 'System Administrator',
          'Parent' => 0
        ],
        [
          'Id' => 2,
          'Name' => 'Location Manager',
          'Parent' => 1,
        ],
        [
          'Id' => 3,
          'Name' => 'Supervisor',
          'Parent' => 2,
        ],
        [
          'Id' => 4,
          'Name' => 'Employee',
          'Parent' => 3,
        ],
        [
          'Id' => 5,
          'Name' => 'Trainer',
          'Parent' => 3,
        ],
        [
          'Id' => 6,
          'Name' => 'Rain Maker',
          'Parent' => 1
        ],
        [
          'Id' => 7,
          'Name' => 'Magician',
          'Parent' => 1
        ],
        [
          'Id' => 8,
          'Name' => 'Magician Trainee',
          'Parent' => 7
        ],
        [
          'Id' => 9,
          'Name' => 'Another Department Manager',
          'Parent' => 0
        ],
        [
          'Id' => 10,
          'Name' => 'Another Department Assistant',
          'Parent' => 9
        ],
        [
          'Id' => 11,
          'Name' => 'Another Department Employee',
          'Parent' => 10
        ],
        [
          'Id' => 12,
          'Name' => 'Another Department Secretary',
          'Parent' => 9
        ]
      ],
      'users' => [
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
      ]
    ]
  ];

  /**
   * Prove roles dataset
   * @param int $id default to 0
   * @return array
   */
  public static function getRolesDataSet($id = 0): array
  {
    return self::$sets[$id]['roles'];
  }

  /**
   * Prove users dataset
   * @param int $id default to 0
   * @return array
   */
  public static function getUsersDataSet($id = 0): array
  {
    return self::$sets[$id]['users'];
  }
}
