<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line



class User extends Entity
{

    protected $_accessible = [
        'first_name' => true,
        'middle_name' => true,
        'last_name' => true,
        'username' => true,
        'password' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'dateofbirth' => true,
        'gender' => true,
        'status' => true,
        'college_name' => true,
        'profile_pic' => true,
        'passing_year' => true,
        'mobile_number' => true,
        'address_line_1' => true,
        'address_line_2' => true,
        'district' => true,
        'state' => true,
        'country' => true,
    ];

   
    protected $_hidden = [
        'password',
    ];

       protected function _setPassword(string $password) : ?string
            {
                if (strlen($password) > 0)  {
                    return (new DefaultPasswordHasher())->hash($password);
                }
            }
}
