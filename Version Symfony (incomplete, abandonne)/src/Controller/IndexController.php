<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Entity\Voiture;
use App\Form\InscriptionType;
use App\Form\VoitureType;
use App\Repository\UtilisateurRepository;
use App\Repository\VoitureRepository;
use Doctrine\Persistence\ObjectManager;
use http\Client\Curl\User;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(VoitureRepository $repo)
    {
        $voiture = $repo->findAll();
        return $this->render('car/home.html.twig', [
            'voitures'=>$voiture
        ]);
    }

    /**
     * @Route("/mycars", name="myCars")
     */
    public function myCars(VoitureRepository $repo)
    {
        $i = $this->getUser()->getUserIdentifier();
        $voiture = $repo->findBy(array('idLoueur'=>$i));
        return $this->render('car/mycars.html.twig', [
            'voitures'=>$voiture
        ]);
    }

    /**
     * @Route("/", name="deleteCar")
     */
    public function delete($id, VoitureRepository $repo)
    {
        $manager=$this->getDoctrine()->getManager();
        $voiture = $repo->findOneBy(array('id'=>$id));
        $manager->remove($voiture);
        $manager->flush();
        return $this->redirectToRoute('home');
    }



    /**
     * @Route("/car/new", name="carCreate")
     * @Route("/car/{id}/edit", name="carEdit")
     */
    public function car(Request $request, Voiture $voiture = null, UtilisateurRepository $repo)
    {
        if(!$voiture){
            $voiture = new Voiture;
        }

        $i = $this->getUser()->getUserIdentifier();
        $utilisateur = $repo->findOneBy(array('id'=>$i));

        $manager=$this->getDoctrine()->getManager();
        $form = $this->createForm(VoitureType::class, $voiture);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $voiture->setIdLoueur($utilisateur);
            $manager->persist($voiture);
            $manager->flush();
            return $this->redirectToRoute('show_car', ['id'=>$voiture->getId()]);
        }

        return $this->render('car/carForm.html.twig', [
            'carForm'=>$form->createView(),
            'carEdit'=>$voiture->getId() !== null
        ]);
    }



    /**
     * @Route("/car/{id}", name="show_car")
     */
    public function show(Voiture $voiture)
    {
        return $this->render('car/showCar.html.twig', [
            'voiture'=>$voiture
        ]);
    }

}
