<?php

namespace App\Controller\Admin;

use App\Entity\OpenDay;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class OpenDayCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return OpenDay::class;
    }

}