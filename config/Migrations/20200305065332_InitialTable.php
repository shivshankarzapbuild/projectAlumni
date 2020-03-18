<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class InitialTable extends AbstractMigration
{

    public function change()
    {
        $this->table('comments')

        ->addColumn('post_id','integer',[

            'default' => null,
            'limit' => 10,
            'null' => false
        ])
        ->addColumn('comments','text',[

            'default' => null,
            'null' => false

        ])
        ->addColumn('created','datetime',[

            'default' => 'CURRENT_TIMESTAMP',
            'limit' => null,
            'null' => false
        ])
        ->addColumn('modified','datetime',[


            'default' => null,
            'limit' => null,
            'null' => false
        ])
        ->addIndex(['post_id',])


        ->create();


        $this->table('conversations')

        ->addColumn('creator_id','integer',[

            'default' => null,
            'limit' => 10,
            'null' => false
        ])

        ->addColumn('participant_id','integer',[

            'default' => null,
            'limit' => 10,
            'null' => false
        ])
        ->addColumn('channel_id','string',[

            'default' => null,
            'limit' => 10,
            'null' => false
        ])
        ->addColumn('created','datetime',[

            'default' => 'CURRENT_TIMESTAMP',
            'null' => false
        ])
        ->addColumn('modified','datetime',[

            'default' => null,
            'null' => false
        ])

        ->addIndex([

            'creator_id',
            'participant_id',
        ])

        ->create();




       $this->table('courses')

        ->addColumn('department_id','integer',[

            'default' => null,
            'limit' => 10,
            'null'=> false
        ])


        ->addColumn('created','datetime',[

            'default' => 'CURRENT_TIMESTAMP',
            'null'=> false
        ])

        ->addColumn('modified','datetime',[

            'default' => null,
            'null'=> false
        ])


        ->addColumn('course_name','string',[

            'default' => null,
            'limit' => 100,
            'null'=> false
        ])

        ->addIndex(['department_id',])


        ->create();


        $this->table('deletedConversations')

        ->addColumn('conversation_id','integer',[

            'default' => null,
            'limit' => 10,
            'null'=> false
        ])


        ->addColumn('student_id','integer',[

            'default' => null,
            'limit' => 10,
            'null'=> false

        ])

        ->addColumn('deleted_at','datetime',[

            'default' => 'CURRENT_TIMESTAMP',
            'null'=> false
        ])


        ->addIndex(['conversation_id',])

        ->create();



        $this->table('deletedMessages')

        ->addColumn('message_id','integer',[

            'default' => null,
            'limit' => 10,
            'null'=> false
        ])


        ->addColumn('student_id','integer',[

            'default' => null,
            'limit' => 10,
            'null'=> false
        ])

        ->addColumn('deleted_at','datetime',[

            'default' => 'CURRENT_TIMESTAMP',
            'null'=> false
        ])

        ->addIndex(['message_id',])

        ->create();



        $this->table('departments')

        ->addColumn('departments','string',[

            'default' => null,
            'limit' => 50,
            'null'=> false
        ])

        ->addColumn('created','datetime',[

            'default' => 'CURRENT_TIMESTAMP',
            'null'=> false
        ])
        

        ->addColumn('modified','datetime',[

            'default' => null,
            'null'=> false
        ])

        ->create();


        $this->table('messages')

        ->addColumn('conversation_id','integer',[
            
            'default' => null,
            'limit' => 10,
            'null' => false
            ])        

        ->addColumn('sender_id','integer',[
            
            'default' => null,
            'limit' => 10,
            'null' => false
            ])        
        
        ->addColumn('participant_id','integer',[
            
            'default' => null,
            'limit' => 10,
            'null' => false
            ])    

            ->addColumn('messagetype','enum',[

                'values'=>['0','1'],
                'default' => '1',
                'limit' => null,
                'null' => false,
            ])   

            ->addColumn('attachmentUrl','string',[

                'default' => null,
                'limit' => 150, 
                'null' => false
            ]) 

            ->addColumn('message','text',[

                'default' => null,
                'null' => false

            ])

            ->addColumn('created','datetime',[

            'default' => 'CURRENT_TIMESTAMP',
            'null'=> false
            ])

            ->addColumn('modified','datetime',[

            'default' => null,
            'null'=> false
            ])

            ->addIndex([

                'sender_id',
                'participant_id',
                'conversation_id',

            ])
            ->create();




            $this->table('participants')

            ->addColumn('conversation_id','integer',[

                'default' => null,
                'limit' => 10,
                'null' => false
            ])

            ->addColumn('student_id','integer',[

                'default' => null,
                'limit' => 10,
                'null' => false
            ])

            ->addColumn('created','datetime',[

                'default' => 'CURRENT_TIMESTAMP',
                'null' => false
            ])

            ->addIndex([
            
                'conversation_id',
                'student_id',
            ])

           ->create();


            $this->table('posts')


            ->addColumn('student_id','integer',[


                'default' => null,
                'limit' => 10,
                'null' => false

            ])

            ->addColumn('post','text',[

                'default' => null,
                'null' => false
            ])

            ->addColumn('picture_uploaded','string',[

                'default' => null,
                'limit' => 150,
                'null' => false

            ])

            ->addColumn('created','datetime',[

                'default' => 'CURRENT_TIMESTAMP',
                'null' => false
             ])

            ->addColumn('modified','datetime',[

                'default' => null,
                'null' => false
            ])

            ->addIndex(['student_id',])


            ->create();


            $this->table('reports')

            ->addColumn('student_id','integer',[

                'default' => null,
                'limit' => 10,
                'null' => false
            ])

            ->addColumn('participant_id','integer',[

                'default' => null,
                'limit' => 10,
                'null' => false
                
            ])

            ->addColumn('report_type','string',[

                'default' => null,
                'limit' => 50,
                'null' => false
            ])

            ->addColumn('notes','text',[

                'default' => null,
                'null' => false
            ])

            ->addColumn('created','datetime',[

                'default' => 'CURRENT_TIMESTAMP',
                'null' => false
             ])

            ->create();


            $this->table('users')

            ->addColumn('first_name','string',[

                'default' => null,
                'limit' =>20,
                'null' => false

            ])
            ->addColumn('middle_name','string',[

                'default' => null,
                'limit' =>20,
                'null' => true

            ])
            
            ->addColumn('last_name','string',[

                'default' => null,
                'limit' =>20,
                'null' => false

            ])

            ->addColumn('email','string',[

                'default' => null,
                'limit' =>100,
                'null' => false

            ])

            ->addColumn('password','string',[

                'default' => null,
                'limit' =>255,
                'null' => false

            ])


            ->addColumn('created','datetime',[

                'default' => 'CURRENT_TIMESTAMP',
                'null' => false

            ])


            ->addColumn('modified','datetime',[

                'default' => null,
                'null' => false

            ])

           ->addColumn('dateofbirth','string',[

                'default' => null,
                'limit' => 20,
                'null'  => false,
            ])
           ->addColumn('gender','string',[

                'default' => null,
                'null' => false,
                'limit' => 5
           ])

            ->addColumn('status','enum',[

                'values'=>['0','1'],
                'default' => '1',
                'limit' => null,
                'null' => false
            ])
            ->addColumn('college_name','string',[

                'default' => null,
                'limit' =>255,
                'null' => false

            ])
            ->addColumn('profile_pic','string',[

                'default' => null,
                'limit' =>255,
                'null' => false

            ])

            ->addColumn('passing_year','integer',[

                'default' => null,
                'limit' =>4,
                'null' => false

            ])
            ->addColumn('mobile_number','string',[

                'default' => null,
                'limit' =>10,
                'null' => false

            ])

            ->addColumn('address_line_1','string',[

                'default' => null,
                'limit' =>100,
                'null' => false

            ])
            ->addColumn('address_line_2','string',[

                'default' => null,
                'limit' =>100,
                'null' => false

            ])

            ->addColumn('district','string',[

                'default' => null,
                'limit' =>255,
                'null' => false

            ])

            ->addColumn('state','string',[

                'default' => null,
                'limit' =>30,
                'null' => false

            ])
            ->addColumn('country','string',[

                'default' => null,
                'limit' =>30,
                'null' => false

            ])

           ->create();


            $this->table('studentCourses')

            ->addColumn('course_id','integer',[

                'default' => null,
                'limit' =>10,
                'null' => false

            ])
            ->addColumn('student_id','integer',[

                'default' => null,
                'limit' =>10,
                'null' => false

            ])

            ->addColumn('course_name','string',[

                'default' => null,
                'limit' =>255,
                'null' => false

            ])

            ->addIndex(['course_id','student_id',])
            ->create();


    

        $this->table('comments')
            ->addForeignKey(
                'post_id',
                'posts',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('conversations')

            ->addForeignKey(
                'creator_id',
                'users',
                'id',
                [

                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'participant_id',
                'users',
                'id',
                [

                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]

            )
            ->update(); 


        $this->table('courses')

            ->addForeignKey(
                'department_id',
                'departments',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('deletedConversations')
            ->addForeignKey(
                'conversation_id',
                'conversations',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('deletedMessages')
            ->addForeignKey(
                'message_id',
                'messages',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('messages')

            ->addForeignKey(
                'sender_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'participant_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(
                'conversation_id',
                'conversations',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('participants')

            ->addForeignKey(

                'conversation_id',
                'conversations',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )

            ->addForeignKey(

                'student_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->update();

        $this->table('posts')

            ->addForeignKey(

                'student_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )

            ->update();

        $this->table('student_courses')

            ->addForeignKey(

                'student_id',
                'users',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )
            ->addForeignKey(

                'course_id',
                'courses',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'CASCADE',
                ]
            )

            ->update();



    }


}
