<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security/logIn", name="logIn")
     */
    public function logIn()
    {
        return $this->render('security/logIn.html.twig');
    }
    /**
     * @Route("/security/logOut", name="logOut")
     */
    public function logOut()
    {
        return $this->render('security/logOut.html.twig');
    }

    /**
     * @Route("/security/signIn", name="signIn")
     */
    public function signIn(Request $request)
    {
        $utilisateur = new Utilisateur();
        $manager=$this->getDoctrine()->getManager();
        $form = $this->createForm(InscriptionType::class, $utilisateur);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $motDePasse = password_hash($utilisateur->getMotDePasse(), PASSWORD_DEFAULT);
            $utilisateur->setMotDePasse($motDePasse);
            $manager->persist($utilisateur);
            $manager->flush();
           return $this->redirectToRoute('logIn');
        }

        return $this->render('security/signIn.html.twig', [
            'signInUser'=>$form->createView()
        ]);
    }
}
