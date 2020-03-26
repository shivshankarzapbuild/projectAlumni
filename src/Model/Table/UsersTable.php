<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
   
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('first_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

   
    public function validationDefault(Validator $validator): Validator
    {

         // die('Inside Validation Default');
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 20)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name',__('First Name is required'));

        $validator
            ->scalar('middle_name')
            ->maxLength('middle_name', 20)
            ->allowEmptyString('middle_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 20)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name',__('Last Name is required'));

        $validator
            ->scalar('username')
            ->maxLength('username', 100)
            ->requirePresence('username', 'create')
            ->notEmptyString('username',__('Email is required'));

        $validator
            ->scalar('password')
            ->minLength('password',6,__('Minimum length of password is 6'))
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password',__('Password is required'));


        $validator
            ->scalar('dateofbirth')
            ->maxLength('dateofbirth', 20)
            ->allowEmptyString('dateofbirth');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 5)
            ->allowEmptyString('gender');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->scalar('college_name')
            ->maxLength('college_name', 255)
            ->allowEmptyString('college_name');

        $validator
            ->scalar('profile_pic')
            ->maxLength('profile_pic', 255)
            ->allowEmptyFile('profile_pic');

        $validator
            ->integer('passing_year')
            ->allowEmptyString('passing_year');

        $validator
            ->scalar('mobile_number')
            ->maxLength('mobile_number', 10)
            ->allowEmptyString('mobile_number');

        $validator
            ->scalar('address_line_1')
            ->maxLength('address_line_1', 100)
            ->allowEmptyString('address_line_1');

        $validator
            ->scalar('address_line_2')
            ->maxLength('address_line_2', 100)
            ->allowEmptyString('address_line_2');

        $validator
            ->scalar('district')
            ->maxLength('district', 255)
            ->allowEmptyString('district');

        $validator
            ->scalar('state')
            ->maxLength('state', 30)
            ->allowEmptyString('state');

        $validator
            ->scalar('country')
            ->maxLength('country', 30)
            ->allowEmptyString('country');

        return $validator;
    }

   
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username'],'The Email is already in use'));

        return $rules;
    }
}
