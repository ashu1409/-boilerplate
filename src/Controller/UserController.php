<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="users", methods={"GET"})
     */
    public function index()
    {
        // Implement logic to display users (reserved for admins)
    }
}
