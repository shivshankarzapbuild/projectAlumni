<?php

namespace App\Policy;

use Authorization\Policy\RequestPolicyInterface;
use Cake\Http\ServerRequest;


class RequestPolicy implements RequestPolicyInterface
{
   
   public function canAccess($identity, ServerRequest $request)
    {

    	// pr($identity);die("Request Policy");
        if (isset($identity) && $identity->role != 3 && $request->getParam('prefix') === 'Admin') {

            return false;
        }

        return true;
    }
   
}

?>