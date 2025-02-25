<?php

namespace App\Controller;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategorieApiController extends AbstractController
{
    // GET all categories
    #[Route('/api/categorie', name: 'api_categorie_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $categories = $em->getRepository(Categorie::class)->findAll();
        return $this->json($categories, JsonResponse::HTTP_OK, [], ['groups' => 'category:read']);
    }

    // GET a single category
    #[Route('/api/categorie/{id}', name: 'api_categorie_show', methods: ['GET'])]
    public function show(Categorie $categorie): JsonResponse
    {
        return $this->json($categorie, JsonResponse::HTTP_OK, [], ['groups' => 'category:read']);
    }

    // POST: Create a new category
    #[Route('/api/categorie', name: 'api_categorie_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['nom'])) {
            return $this->json(['error' => 'Missing parameter: nom'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $categorie = new Categorie();
        $categorie->setNom($data['nom']);

        $em->persist($categorie);
        $em->flush();

        return $this->json($categorie, JsonResponse::HTTP_CREATED, [], ['groups' => 'category:read']);
    }

    // PUT: Update an existing category
    #[Route('/api/categorie/{id}', name: 'api_categorie_update', methods: ['PUT'])]
    public function update(Request $request, Categorie $categorie, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['nom'])) {
            $categorie->setNom($data['nom']);
        }

        $em->flush();

        return $this->json($categorie, JsonResponse::HTTP_OK, [], ['groups' => 'category:read']);
    }

    // DELETE: Remove a category
    #[Route('/api/categorie/{id}', name: 'api_categorie_delete', methods: ['DELETE'])]
    public function delete(Categorie $categorie, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($categorie);
        $em->flush();

        return $this->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
