<?php

namespace App\Controller\Admin;

use App\Entity\PrivacyPolicy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class PrivacyPolicyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PrivacyPolicy::class;
    }

}
