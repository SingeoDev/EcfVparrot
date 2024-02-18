<?php

namespace App\Twig\Extension;

use Twig\TwigFunction;
use App\Entity\OpenDay;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;

class OpenDayExtension extends AbstractExtension 
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('openDay', [$this, 'getOpenDay']),
        ];
    }

    public function getOpenDay()
    {
        return $this->em->getRepository(OpenDay::class)->findOneBy([]);
    }
}
