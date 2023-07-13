<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(private UserRepository $repo)
    {
    }

    #[Route('/api/user', methods: 'GET')]
    public function all(): JsonResponse
    {
        return $this->json($this->repo->findAll());
    }



    #[Route('/api/user/{email}/promote', methods: 'PATCH')]
    public function promote(string $email, Request $request): JsonResponse
    {
        $user = $this->repo->findByEmail($email);
        if ($user) {
            throw new NotFoundHttpException('User not exist');
        }
        $user->setRole('ROLE_ADMIN');
        $this->repo->update($user);
        return $this->json($user);
    }
}