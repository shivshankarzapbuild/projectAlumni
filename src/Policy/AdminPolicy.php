<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Admin;
use Authorization\IdentityInterface;


class AdminPolicy
{
    
    public function canCreate(IdentityInterface $user, Admin $admin)
    {
        return true;
    }

  
    public function canUpdate(IdentityInterface $user, Admin $admin)
    {
        return true;
    }

  
    public function canDelete(IdentityInterface $user, Admin $admin)
    {
        return true;
    }

    public function canView(IdentityInterface $user, Admin $admin)
    {
        return true;
    }
}
