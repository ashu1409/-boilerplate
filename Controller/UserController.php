<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/api/users", name="user_list")
     */
    public function listUsers(): JsonResponse
    {
        // Logic to fetch users from the database
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        // Serialize users data
        $userData = [];
        foreach ($users as $user) {
            $userData[] = [
                'email' => $user->getEmail(),
                'lastName' => $user->getLastName(),
                'firstName' => $user->getFirstName(),
                'score' => $user->getScore(),
                'paymentsWaiting' => $user->getPaymentsWaiting(),
            ];
        }

        return $this->json($userData);
    }
}
