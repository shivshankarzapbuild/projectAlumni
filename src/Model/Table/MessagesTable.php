<?php 
	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\ORM\Table;

	class MessagesTable extends Table{

		public function initialize(array $config) : void {

			parent::initialize($config);

			$this->setTable('messages');
			$this->setPrimaryKey('id');

			$this->hasMany('deleted_messages',[

				'foreignKey' => 'message_id'
			]);

			
		}
	}
?>