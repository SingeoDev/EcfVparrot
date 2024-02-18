<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $roles = [
            'ROLE_ADMIN' => 'ROLE_ADMIN',
            'ROLE_EMPLOYEES' => 'ROLE_EMPLOYEES'
        ];
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email'),
            TextField::new('password'),
            ChoiceField::new('roles')->setChoices($roles)->allowMultipleChoices()->renderAsBadges()
        ];
        

    }

   


    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
