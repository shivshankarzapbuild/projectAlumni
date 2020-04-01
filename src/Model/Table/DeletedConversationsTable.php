<?php
	
	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\ORM\Table;

	class DeletedConversationsTable extends Table{

		public function initialize(array $config) : void{

				parent::initialize($config);

				$this->setTable('deletedConversations');
				$this->setPrimaryKey('id');

				$this->belongsTo('conversations',[

					'foreignKey' => 'conversation_id',
					'joinType' => 'INNER'
				]);
		}
	}
?>