<?php

namespace App\Security\Voter;

use App\Entity\Plat;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

Class PlatsVoter extends Voter
{
    const EDIT = 'PLAT_EDIT';
    const DELETE = 'PLAT_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $plat): bool
    {
        if(!in_array($attribute, [self::EDIT, self::DELETE])){
            return false;
        }
        if(!$plat instanceof Plat){
            return false;
        }
        return true;

        // return in_array($attribute, [self::EDIT, self::DELETE]) && plat instanceof Plat;
    }

    protected function voteOnAttribute($attribute, $plat, TokenInterface $token): bool
    {
        // on récupère l'utilisateur à partir du token 
        $user = $token->getUser();

        if(!$user instanceof UserInterface) return false;

        // on vérifie si l'utilisateur est admin 
        if($this->security->isGranted('ROLE_ADMIN')) return true;

        // on vérifie les permissions 
        switch($attribute){
            case self::EDIT:
                // on vérifie si l'utilisateur peut éditer
                return $this->canEdit();
                break;
            case self::DELETE:
                // on vérifie si l'utilisateur peut supprimer
                return $this->canDelete();
                break;
        }
    }


    private function canEdit(){
        return $this->security->isGranted('ROLE_CHEF');
    }
    private function canDelete(){
        return $this->security->isGranted('ROLE_ADMIN');
    }
}