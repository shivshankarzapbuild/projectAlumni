<?php 
	
	declare(strict_types=1);

	namespace App\Model\Entity;

	use Cake\ORM\Entity;

	class Conversation extends Entity{

		protected $_accessible = [

			'creator_id' => true,
			'participant_id' =>true,
			'channel_id' =>true,
		];
	}
?>