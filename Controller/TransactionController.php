<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends AbstractController
{
    /**
     * @Route("/transactions", methods={"GET"})
     */
    public function getTransactions()
    {
        // Fetch transactions for the logged-in user
    }

    /**
     * @Route("/transactions/{id}/location", methods={"POST"})
     */
    public function updateTransactionLocation(Request $request, $id)
    {
        // Update transaction with the selected location
    }
}
