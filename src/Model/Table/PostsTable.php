<?php
	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\ORM\Table;

	class PostsTable extends Table{

			public function initialize(array $config) : void{

				parent::initialize($config);

				$this->setTable('posts');

				$this->setPrimaryKey('id');
				$this->hasMany('comments',[

					'foreignKey' => 'post_id'
				]);

				$this->belongsTo('students',[

					'foreignKey' => 'student_id',
					'joinType' => 'INNER'
				]);
			} 
	}
?>