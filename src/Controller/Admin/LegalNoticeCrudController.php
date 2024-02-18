<?php

namespace App\Controller\Admin;

use App\Entity\LegalNotice;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LegalNoticeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return LegalNotice::class;
    }

}
