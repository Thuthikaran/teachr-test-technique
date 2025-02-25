<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProduitApiController extends AbstractController
{
    // GET all products
    #[Route('/api/produit', name: 'api_produit_index', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository): JsonResponse
    {
        $produits = $produitRepository->findAll();
        return $this->json($produits, JsonResponse::HTTP_OK, [], ['groups' => 'product:read']);
    }

    // GET a single product
    #[Route('/api/produit/{id}', name: 'api_produit_show', methods: ['GET'])]
    public function show(Produit $produit): JsonResponse
    {
        return $this->json($produit, JsonResponse::HTTP_OK, [], ['groups' => 'product:read']);
    }

    // POST: Create a new product
    #[Route('/api/produit', name: 'api_produit_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['nom'], $data['description'], $data['prix'], $data['categorie'])) {
            return $this->json(['error' => 'Missing parameters'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $produit = new Produit();
        $produit->setNom($data['nom']);
        $produit->setDescription($data['description']);
        $produit->setPrix((float)$data['prix']);
        $produit->setDateCreation(new \DateTime());

        $categorie = $em->getRepository(Categorie::class)->find($data['categorie']);
        if (!$categorie) {
            return $this->json(['error' => 'Categorie not found'], JsonResponse::HTTP_BAD_REQUEST);
        }
        $produit->setCategorie($categorie);

        $em->persist($produit);
        $em->flush();

        return $this->json($produit, JsonResponse::HTTP_CREATED, [], ['groups' => 'product:read']);
    }

    // PUT: Update an existing product
    #[Route('/api/produit/{id}', name: 'api_produit_update', methods: ['PUT'])]
    public function update(Request $request, Produit $produit, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['nom'])) {
            $produit->setNom($data['nom']);
        }
        if (isset($data['description'])) {
            $produit->setDescription($data['description']);
        }
        if (isset($data['prix'])) {
            $produit->setPrix((float)$data['prix']);
        }
        // Only update category if a non-empty value is provided.
        if (isset($data['categorie']) && $data['categorie'] !== '') {
            $categorie = $em->getRepository(Categorie::class)->find($data['categorie']);
            if (!$categorie) {
                return $this->json(['error' => 'Categorie not found'], JsonResponse::HTTP_BAD_REQUEST);
            }
            $produit->setCategorie($categorie);
        }

        $em->flush();

        return $this->json($produit, JsonResponse::HTTP_OK, [], ['groups' => 'product:read']);
    }

    // DELETE: Remove a product
    #[Route('/api/produit/{id}', name: 'api_produit_delete', methods: ['DELETE'])]
    public function delete(Produit $produit, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($produit);
        $em->flush();

        return $this->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
