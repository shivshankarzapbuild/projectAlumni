<?php 
	
	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\ORM\Table;
	use Cake\ORM\Validator;

	class CommentsTable extends Table{

				public function initialize(array $config) :void {

					parent::initialize($config);
					$this->setTable('comments');
					$this->setPrimaryKey('id');

					$this->belongsTo('posts',[

						'foreignKey' => 'post_id',
						'joinType' => 'INNER'
					]);
				}
	// public function validationDefault(Validator $validator) :Validator{

					
	// 			}
	// 			public function buildRules(RulesChecker $rules) : RulesChecker{

	// 				$rules->add($rules->existsIn(['post_id'],'posts'));


	// 			}




			}
	
?>