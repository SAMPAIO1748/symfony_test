<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    private $tableau_articles = [
        1 => [
            'titre' => "Vive la Bretagne",
            "contenu" => "La Bretagne c'est magnifique",
            "id" => 1
        ],
        2 => [
            'titre' => "Vive la Corse",
            "contenu" => "La Corse c'est magnifique",
            "id" => 2
        ],
        3 => [
            'titre' => "Vive la Normandie",
            "contenu" => "La Normandie c'est magnifique",
            "id" => 3
        ],

    ];

    /**
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/home", name="home")
     */
    public function home()
    {
        var_dump('Bonjour');
        die;
    }

    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome()
    {
        var_dump('Bienvenue sur le site de la mort qui tue');
        die;
    }

    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        // Classe Response permet de créer une réponse à la fonction.
        return new Response("Test de Response");
    }

    // faire une route qui affichera une réponse qui dira "mentions légales du site"

    /**
     * @Route("/legal", name="legal")
     */
    public function legal()
    {
        return new Response("Mentions légales du site");
    }

    /**                // Wildcard : qui permet de mettre un paramètre à la route et
     *                  // personnaliser le contenu de la page
     * @Route("/number/{id}", name="number")
     */
    public function number($id)
    {
        return new Response($id);
    }

    // créer une route qui va afficher le contenu d'un article en particulier 
    // grâce à une 

    /**
     * @Route("/article/{id}", name="article")
     */
    public function articleShow($id)
    {
        return new Response($this->tableau_articles[$id]['titre'] . "<br>" . $this->tableau_articles[$id]['contenu']);
    }

    // créer une route poker avec une wildcard qui correspond à l'âge
    // si l'âge est inférieur à 18 la réponse est "accés interdit"
    // si l'âge est supérieur ou égale à 18 la réponse est "accés autorisé"

    /**
     * @Route("/poker/{age}", name="poker")
     */
    public function poker($age)
    {
        if ($age < 18) {
            return $this->render("kid.html.twig");
        } else {
            return $this->render("adulte.html.twig");
        }
    }

    /**
     * @Route("/vue", name="vue")
     */
    public function vue()
    {
        // render permet de retourner vers un fichier twig
        // et ainsi afficher une vue.
        return $this->render("vue.html.twig");
    }

    // refaire la fonction poker mais remplacer new Response par render
    // pour afficher une vue avec du texte dans un h1
    // et avec une image.
}
