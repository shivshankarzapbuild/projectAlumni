<?php
	declare(strict_types=1);

	namespace App\Model\Table;

	

	use Cake\ORM\Query;
	use Cake\ORM\RulesChecker;
	use Cake\ORM\Table;
	use Cake\Validation\Validator;

	class PostsTable extends Table{

			public function initialize(array $config) : void{

				parent::initialize($config);
				$this->setDisplayField('comment');

				$this->setTable('posts');

				$this->setPrimaryKey('id');

				// $this->belongsTo('ParentCategories', [
		  //           'className' => 'Categories',
		  //           'foreignKey' => 'parent_id',
		  //       ]);
		  //       $this->hasMany('ChildCategories', [
		  //           'className' => 'Categories',
		  //           'foreignKey' => 'parent_id',
		  //       ]);
				$this->hasMany('comments',[

					'foreignKey' => 'post_id'
				]);

				$this->belongsTo('users',[

					'foreignKey' => 'user_id',
					'joinType' => 'INNER'
				]);
			}

			public function validationDefault(Validator $validator) : Validator 
			{

				$validator
			            ->scalar('post')
			            ->requirePresence('post')
			            ->notEmptyString('post',__('Post data  is required'));
				
				return $validator;

			}
	}
?>