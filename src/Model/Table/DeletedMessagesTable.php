<?php 

	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\ORM\Table;

	class DeletedMessagesTable extends Table{

		public function initialize(array $config) : void {

			parent::initialize($config);

			$this->table('deletedMessages');
			$this->setPrimaryKey('id');

			$this->belongsTo('messages',[

				'foreignKey' => 'message_id',
				'joinType' => 'INNER'
			]);
		}

		public function validateDefault(Validator $validator) : Validator{


			return $validator;
		}

		public function buildRules(RulesChecker $rules) :RulesChecker {

			$rules->add($rules->existsIn(['message_id'],'Messages'));

		}
	} 
 ?>