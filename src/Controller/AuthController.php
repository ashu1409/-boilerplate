<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Request $request)
    {
        // Handle user authentication
    }

    /**
     * @Route("/logout", name="logout", methods={"POST"})
     */
    public function logout(Request $request)
    {
        // Handle user logout
    }
}
