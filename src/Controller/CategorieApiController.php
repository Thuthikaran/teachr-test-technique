<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CategorieApiController extends AbstractController
{
    // Route to get all categories as JSON
    #[Route('/api/categorie', name: 'api_categorie_index', methods: ['GET'])]
    public function index(CategorieRepository $categorieRepository): JsonResponse
    {
        $categories = $categorieRepository->findAll();
        return $this->json($categories, JsonResponse::HTTP_OK, [], ['groups' => 'category:read']);  // Add groups
    }

    // Route to get a single category by ID as JSON
    #[Route('/api/categorie/{id}', name: 'api_categorie_show', methods: ['GET'])]
    public function show(Categorie $categorie): JsonResponse
    {
        return $this->json($categorie, JsonResponse::HTTP_OK, [], ['groups' => 'category:read']);  // Add groups
    }
}
