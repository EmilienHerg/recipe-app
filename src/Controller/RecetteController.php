<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecetteController extends AbstractController
{
    #[Route('/recette', name: 'recette.index')]
    public function index(RecetteRepository $repository): Response
    {
        $recettes = $repository->findAll();
        return $this->render('recette/index.html.twig', [
            'recettes' => $recettes,
        ]);
    }
}
