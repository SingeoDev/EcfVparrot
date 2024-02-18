<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
usE Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class UserSubscriber implements EventSubscriberInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['hashUserPassword'],
        ];
    }

    public function hashUserPassword(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if ($entity instanceof User) {
            // Récupérer le mot de passe en texte brut
            $plainPassword = $entity->getPassword();

            // Hasher le mot de passe
            $hashedPassword = $this->passwordEncoder->hashPassword($entity, $plainPassword);

            // Définir le mot de passe hashé sur l'entité utilisateur
            $entity->setPassword($hashedPassword);
        }
    }
}
