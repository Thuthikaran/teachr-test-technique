<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProduitApiController extends AbstractController
{
    // Route to get all products as JSON
    #[Route('/api/produit', name: 'api_produit_index', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository): JsonResponse
    {
        $produits = $produitRepository->findAll();
        return $this->json($produits, JsonResponse::HTTP_OK, [], ['groups' => 'product:read']);  // Add groups
    }

    // Route to get a single product by ID as JSON
    #[Route('/api/produit/{id}', name: 'api_produit_show', methods: ['GET'])]
    public function show(Produit $produit): JsonResponse
    {
        return $this->json($produit, JsonResponse::HTTP_OK, [], ['groups' => 'product:read']);  // Add groups
    }
}
