<?php
// src/Controller/PaymentController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     * @Route("/api/payments", name="payments_list", methods={"GET"})
     */
    public function listPayments(Request $request): JsonResponse
    {
        // Fetch payments for the logged-in user
        $payments = $this->getDoctrine()->getRepository(Payment::class)->findBy(['user' => $this->getUser()]);

        return $this->json($payments);
    }

    /**
     * @Route("/api/payments/{id}/locate", name="locate_payment", methods={"POST"})
     */
    public function locatePayment(Request $request, int $id): JsonResponse
    {
        // Handle locating a payment
        // Update payment with the selected location

        return $this->json(['message' => 'Payment located successfully']);
    }
}
