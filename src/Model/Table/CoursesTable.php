<?php
	declare(strict_types=1);

	namespace App\Model\Table;

	use Cake\ORM\Table;

	class CoursesTable extends Table{

		 public function initialize(array $config) : void{


		 		parent::initialize($config);

		 		$this->setTable('courses');
		 		$this->setPrimaryKey('id');

		 		$this->hasMany('student_courses',[

		 			'foreignKey' => 'course_id'

		 		]);

		 		$this->belongsTo('departments',[

		 			'foreignKey' => 'department_id',
		 			'joinType' => 'INNER' 
		 		]);
		 }
	}

?>