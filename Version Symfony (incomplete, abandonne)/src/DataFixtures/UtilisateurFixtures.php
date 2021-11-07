<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();

        $utilisateur1 = new Utilisateur();
        $utilisateur1->setNom("Nirussan")
            ->setMotDePasse(password_hash("Nitoomy", PASSWORD_DEFAULT))
            ->setEmail("snirussan@gmail.com")
            ->setRole("renter")
            ->setNomEntreprise("NitoomyRent")
            ->setAdresseEntreprise("156 rue du docteur Bauer");
        $manager->persist($utilisateur1);
        $utilisateur = new Utilisateur();
        $utilisateur->setNom("Vicheva")
            ->setMotDePasse(password_hash("detcha1234", PASSWORD_DEFAULT))
            ->setEmail("detchaVicheva@gmail.com")
            ->setRole("entreprise")
            ->setNomEntreprise("Vish")
            ->setAdresseEntreprise("25 rue Biryani");
        $manager->persist($utilisateur);
        $utilisateur = new Utilisateur();
        $utilisateur->setNom("Abdel")
            ->setMotDePasse(password_hash("rebeu93", PASSWORD_DEFAULT))
            ->setEmail("djalil@gmail.com")
            ->setRole("entreprise")
            ->setNomEntreprise("Abdel&Co")
            ->setAdresseEntreprise("76 rue Tisane");
        $manager->persist($utilisateur);
        $utilisateur = new Utilisateur();
        $utilisateur->setNom("Louise")
            ->setMotDePasse(password_hash("LOULOU2709", PASSWORD_DEFAULT))
            ->setEmail("louisMal@gmail.com")
            ->setRole("entreprise")
            ->setNomEntreprise("Loulouse")
            ->setAdresseEntreprise("95 rue Malassigné");
        $manager->persist($utilisateur);
        $utilisateur = new Utilisateur();
        $utilisateur->setNom("Rodrigue")
            ->setMotDePasse(password_hash("Rodirk18", PASSWORD_DEFAULT))
            ->setEmail("demars@gmail.com")
            ->setRole("entreprise")
            ->setNomEntreprise("RodrigueMobile")
            ->setAdresseEntreprise("87 rue Bpatout");
        $manager->persist($utilisateur);

        $voiture = new Voiture();
        $voiture->setModele("Lamborghini Urus")
            ->setCaracteristiques("4.0-liter twin-turbo V8 engine producing 650 CV and 850 Nm of torque, Urus accelerates from 0 to 62 mph in 3.6 seconds and reaches a top speed of 190 mph.")
            ->setPhoto("https://besthqwallpapers.com/Uploads/28-11-2018/72806/thumb2-lamborghini-urus-tuning-2018-cars-suvs-vossen-wheels.jpg")
            ->setNbVoitures(23)
            ->setIdLoueur($utilisateur1)
            ->setPrice(200)
            ->setEtatLocation("available");
        $manager->persist($voiture);
        $voiture = new Voiture();
        $voiture->setModele("BMW F82")
            ->setCaracteristiques("2.9L twin-turbo DOHC 32-valve V-8/471 hp @ 7,000 rpm, 426 lb-ft @ 4,000 rpm, 5-speed manual, 2-door, 2-passenger, mid-engine, RWD coupe, 11/16 mpg")
            ->setPhoto("https://images.hdqwalls.com/wallpapers/bmw-f82-dark-side-car-digital-art-4k-3d.jpg")
            ->setNbVoitures(3)
            ->setIdLoueur($utilisateur1)
            ->setPrice(250)
            ->setEtatLocation("available");
        $manager->persist($voiture);
        $voiture = new Voiture();
        $voiture->setModele("Bugatti Veyron")
            ->setCaracteristiques("From 0-100 km/h (62 mph) in 2.4 seconds, 0-200 km/h (124 mph) in 6.1 seconds and 0-300 km/h (186 mph) in 13.1 seconds with a top speed electronically limited to 380 km/h (240 mph). Its kerb weight is 1,976 kg (4,356 lb)")
            ->setPhoto("https://www.teahub.io/photos/full/73-735650_free-bugatti-chiron-car-headlights-rolls-royce.jpg")
            ->setNbVoitures(14)
            ->setIdLoueur($utilisateur1)
            ->setPrice(450)
            ->setEtatLocation("available");
        $manager->persist($voiture);
        $voiture = new Voiture();
        $voiture->setModele("Nissan GT-R")
            ->setCaracteristiques("The Nissan GT-R features a new turbocharger. This has been designed with improved performance & responsiveness at lower RPMs, giving you an even sharper driving experience.")
            ->setPhoto("https://4kwallpapers.com/images/wallpapers/nissan-gt-r-neon-digital-art-3840x2160-1426.jpg")
            ->setNbVoitures(21)
            ->setIdLoueur($utilisateur1)
            ->setPrice(250)
            ->setEtatLocation("available");
        $manager->persist($voiture);
        $voiture = new Voiture();
        $voiture->setModele("Mercedes-Benz AMG GT-R")
            ->setCaracteristiques("tuned to an output of 430 kW (585 PS; 577 hp) at 6,250 rpm and 700 N⋅m (516 lb⋅ft) of torque at 5,500 rpm.")
            ->setPhoto("https://wallpaperaccess.com/full/1489250.jpg")
            ->setNbVoitures(18)
            ->setIdLoueur($utilisateur1)
            ->setPrice(300)
            ->setEtatLocation("available");
        $manager->persist($voiture);
        $voiture = new Voiture();
        $voiture->setModele("McLaren 650S")
            ->setCaracteristiques("Power is rated at 641 horses and 500 lb-ft of torque. Zero to sixty is done in just 2.9 seconds on its way to a claimed top speed of 204 mph, since this is the Spider version with the folding hard top..")
            ->setPhoto("https://i.pinimg.com/originals/46/14/d1/4614d1d1c9a90b2a6160d80cb01967e4.jpg")
            ->setNbVoitures(2)
            ->setPrice(200)
            ->setIdLoueur($utilisateur1)
            ->setEtatLocation("available");
        $manager->persist($voiture);
        $voiture = new Voiture();
        $voiture->setModele("Audi R8")
            ->setCaracteristiques("It's been clocked hitting 60 mph in under three seconds and it can easily break the 200 mph mark. It's a shockingly fast car and the fastest thing we've ever driven.")
            ->setPhoto("https://wallpapersmug.com/download/3840x2160/35a345/basement-audi-r8.jpg")
            ->setNbVoitures(13)
            ->setIdLoueur($utilisateur1)
            ->setPrice(400)
            ->setEtatLocation("available");

        $manager->persist($voiture);
        $manager->flush();
    }
}
