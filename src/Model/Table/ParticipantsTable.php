<?php
	
	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\ORM\Table;

	class ParticipantsTable extends Table{

			public function initialize(array $config) : void {

				parent::initialize($config);

				$this->setTable('participants');
				$this->setPrimaryKey('id');

				$this->belongsTo('users',[

					'foreignKey' => 'user_id',
					'joinType' => 'INNER'
				]);

				$this->belongsTo('conversations',[

					'foreignKey' => 'conversation_id',
					'joinType' => 'INNER'
				]);
			}
	}
?>