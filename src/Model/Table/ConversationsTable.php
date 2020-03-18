<?php 

	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\Orm\Table;

	class ConversationsTable extends Table{


		public function initialize(array $config) : void{

			parent::initialize($config);

			$this->setTable('conversations');
			$this->setPrimaryKey('id');

			$this->hasMany('deleted_conversations',[

				'foreignKey' => 'conversation_id'
			]);

			$this->hasMany('messages',[

				'foreignKey' => 'conversation_id'
			]);

			$this->hasMany('participants',[

				'foreignKey' => 'conversation_id'
			]);

			$this->belongsTo('students',[

				'foreignKey' => 'creator_id',
				'joinType' => 'INNER'
			]);

			$this->belongsTo('students',[

				'foreignKey' => 'participant_id',
				'joinType' => 'INNER'
			]);

		}
	}
?>