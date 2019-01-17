<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('name', 'nameUnique', [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'その名前はすでに使用されています'
            ]);
        return $validator;
    }
}