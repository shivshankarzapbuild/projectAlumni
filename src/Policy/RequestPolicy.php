<?php

namespace App\Policy;

use Authorization\Policy\RequestPolicyInterface;
use Cake\Http\ServerRequest;

class RequestPolicy implements RequestPolicyInterface
{
   
    public function canAccess($identity, ServerRequest $request)
    {
        die("User Policy--------------->");

        if ($request->getParam('controller') === 'Users'
            && $request->getParam('action') === 'home'
        ) {
            return true;
        }

        return false;
    }
    public function canAccessHome($identity, ServerRequest $request){

        return true;
    }
}

?>