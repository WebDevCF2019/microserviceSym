<?php

// chemin nécessaire pour retrouver la classe parmis les milliers de classes chargées par l'autoload
namespace App\Controller;

// on va donner le chemin pour envoyer en http une réponse au navigateur
use Symfony\Component\HttpFoundation\Response;

// on charge le module d'annotations
use Symfony\Component\Routing\Annotation\Route;

// On prend le contrôleur abstrait de Symfony qui contient de multiples outils préconstruit, dont Twig dans notre cas
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// on va chercher le gestionnaire de Réponse au format JSON
use Symfony\Component\HttpFoundation\JsonResponse;

// on étend notre contrôleur par le contrôleur abstrait de Symfony, ce qui charge des bibliothèques dont Twig
class homeController extends AbstractController
{
    // méthode appelée à l'accueil
    /**
     * @Route("/", name="homepage")
     *
     */
    public function homepage(){

        return $this->render("news/homepage.html.twig");
    }

    /**
     * @Route("/slug/{slug}", name="article")
     */
    public function show($slug){



        // commentaires
        $comments =[
            [
                "nom"=>"Jean Claude Vandâne",
                "url"=>"images/alien-profile.png",
                "texte"=>"Wow c'est merveilleux!",
            ],
            [
                "nom"=>"Steven Seagueule",
                "url"=>"images/astronaut-profile.png",
                "texte"=>"Sublime, on en mangerait....",
            ],
            [
                "nom"=>"Christine Boutrain",
                "url"=>"images/lightspeed.png",
                "texte"=>"Qui veut du gâteau?",
            ]
        ];

        dump($slug,$comments);

        // utilisation de twig (déjà chargé via AbstractController)
        return $this->render("news/news.html.twig",
                [   "titre"=>"Titre : $slug",
                    "heart"=>$slug,
                    "commentaires"=>$comments,
                ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function pourProfile(){
        return $this->render("pages/profile.html.twig");
    }

    /**
     * @Route("/slug/{slug}/heart", name="coeur")
     */
    public function ArticleHeart($slug){
        return new JsonResponse(["heart"=>random_int(5,150)]);
    }
}