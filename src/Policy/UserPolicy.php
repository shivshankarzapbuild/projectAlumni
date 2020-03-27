<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;
use Authorization\Policy\Result;


class UserPolicy
{

   
    public function canCreate(IdentityInterface $user, User $resource)
    {

        return true;
    }

   
    public function canUpdate(IdentityInterface $user, User $resource)
    {

                return $this->isAuthor($user, $resource);

    }

   
    public function canDelete(IdentityInterface $user, User $resource)
    {

        return false;
        
    }


    public function canView(IdentityInterface $user, User $resource)
    {

    }

    public function canHome(IdentityInterface $user, User $resource){

                return $this->isAuthor($user, $resource);

    }
    public function canProfile(IdentityInterface $user, User $resource){

            return $this->isAuthor($user, $resource);

    }
    public function canAdmin(IdentityInterface $user, User $resource){

        return false;
    }
   

     protected function isAuthor(IdentityInterface $user,User $resource)
    {
        return $user->id === $user->getIdentifier();
    }
}
