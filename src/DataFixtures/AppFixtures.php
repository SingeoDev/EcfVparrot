<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\OpenDay;
use App\Entity\Services;
use App\Entity\PrivacyPolicy;
use Faker\Factory;
use App\Entity\Vehicles;
use Faker\Generator;
use DateTimeImmutable;
use App\Entity\ImageGallery;
use App\Entity\LegalNotice;
use App\Entity\Options;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        

        // BEGIN FIXTURES VEHICULES

        $randomFuel = ['essence', 'gasoil', 'electrique', 'gpl'];
        $randomGearbox = ['manuelle', 'automatique'];
        
        for ($i = 1; $i < 13; $i++) {
            $vehicle = new Vehicles();
            $vehicle->setName($this->faker->text(20));
            $vehicle->setPrice(mt_rand(3000, 80000));
            $vehicle->setYears(new DateTimeImmutable($this->faker->dateTimeBetween('-25 year', 'now')->format('Y-m-d')));
            $vehicle->setMileage(mt_rand(0, 300000));
            $vehicle->setFuel($randomFuel[array_rand($randomFuel)]);
            $vehicle->setGearbox($randomGearbox[array_rand($randomGearbox)]);
            $vehicle->setUpdatedAt(new DateTimeImmutable('now'));
            $vehicle->setImageName('vehicule' . $i . '.jpg');
            $manager->persist($vehicle);
 

            $randomOption = mt_rand(1, 5);
            for ($j = 1; $j < $randomOption; $j++) {
                $option = new Options();
                $option->setOptions($this->faker->text(mt_rand(5, 60)));
                $option->setvehicleId($vehicle);
                $manager->persist($option);
            }


            $randomImageGallery = mt_rand(2, 5);
            for ($k = 1; $k < $randomImageGallery; $k++) {
                $imageGallery = new ImageGallery();
                $imageGallery->setImageName('interieur' . $i . '-' . $k . '.jpg' );
                $imageGallery->setUpdatedAt(new DateTimeImmutable('now'));
                $imageGallery->setVehicleId($vehicle);
                $manager->persist($imageGallery);
            }

        }

        // FIXTURES VEHICULES FINISHED

    

        // BEGIN FIXTURES SERVICES

        $services1 = new Services();
        $services1->setName('Vidange');
        $services1->setPrice(100);
        $manager->persist($services1);

        $services2 = new Services();
        $services2->setName('Pneus');
        $services2->setPrice(200);
        $manager->persist($services2);

        $services3 = new Services();
        $services3->setName('Freins');
        $services3->setPrice(300);
        $manager->persist($services3);

        $services4 = new Services();
        $services4->setName('Courroie de distribution');
        $services4->setPrice(400);
        $manager->persist($services4);

        // FIXTURES SERVICES FINISHED


        // BEGIN FIXTURES COMMENTAIRES 


        for ($l = 1; $l < 21; $l++) {
            $comment = new Comment();
            $comment->setName($this->faker->name());
            $comment->setMessage($this->faker->text(mt_rand(10, 200)));
            $comment->setStars(mt_rand(1, 5));
            if ($l % 6 == 0) {
                $comment->setIsValid(false);
            } else {
                $comment->setIsValid(true);
            }
            $manager->persist($comment);
        }

        // FIXTURES COMMENTAIRES FINISHED
    


        // BEGIN FIXTURES OPENDAY

        $openDay = new OpenDay();
        $openDay->setMondayAmBegin(new DateTimeImmutable('08:45:00'));
        $openDay->setMondayAmFinish(new DateTimeImmutable('12:00:00'));
        $openDay->setMondayPmBegin(new DateTimeImmutable('14:00:00'));
        $openDay->setMondayPmFinish(new DateTimeImmutable('18:00:00'));
        $openDay->setTuesdayAmBegin(new DateTimeImmutable('08:45:00'));
        $openDay->setTuesdayAmFinish(new DateTimeImmutable('12:00:00'));
        $openDay->setTuesdayPmBegin(new DateTimeImmutable('14:00:00'));
        $openDay->setTuesdayPmFinish(new DateTimeImmutable('18:00:00'));
        $openDay->setWednesdayAmBegin(new DateTimeImmutable('08:45:00'));
        $openDay->setWednesdayAmFinish(new DateTimeImmutable('12:00:00'));
        $openDay->setWednesdayPmBegin(new DateTimeImmutable('14:00:00'));
        $openDay->setWednesdayPmFinish(new DateTimeImmutable('18:00:00'));
        $openDay->setThursdayAmBegin(new DateTimeImmutable('08:45:00'));
        $openDay->setThursdayAmFinish(new DateTimeImmutable('12:00:00'));
        $openDay->setThursdayPmBegin(new DateTimeImmutable('14:00:00'));
        $openDay->setThursdayPmFinish(new DateTimeImmutable('18:00:00'));
        $openDay->setFridayAmBegin(new DateTimeImmutable('08:45:00'));
        $openDay->setFridayAmFinish(new DateTimeImmutable('12:00:00'));
        $openDay->setFridayPmBegin(new DateTimeImmutable('14:00:00'));
        $openDay->setFridayPmFinish(new DateTimeImmutable('18:00:00'));
        $openDay->setSaturdayAmBegin(new DateTimeImmutable('08:45:00'));
        $openDay->setSaturdayAmFinish(new DateTimeImmutable('12:00:00'));
        $manager->persist($openDay);

        // FIXTURES OPENDAY FINISHED


        
        // BEGIN FIXTURES PRIVACY POLICY

        $privacyPolicy = new PrivacyPolicy();
        $privacyPolicy->setdescription($this->faker->text(1500));
        $manager->persist($privacyPolicy);

        // FIXTURES PRIVACY POLICY FINISHED

        
        // BEGIN FIXTURES LEGAL NOTICE

        $legalNotice = new LegalNotice();
        $legalNotice->setdescription($this->faker->text(1500)); 
        $manager->persist($legalNotice);

        // FIXTURES LEGAL NOTICE FINISHED

        $manager->flush();
    }
}