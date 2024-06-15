<?php
namespace App\Controller;

use App\Entity\Transaction;
use App\Entity\Location;
use App\Repository\TransactionRepository;
use App\Repository\LocationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends AbstractController
{
    private $transactionRepository;
    private $locationRepository;
    private $entityManager;

    public function __construct(TransactionRepository $transactionRepository, LocationRepository $locationRepository, EntityManagerInterface $entityManager)
    {
        $this->transactionRepository = $transactionRepository;
        $this->locationRepository = $locationRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/transactions", name="get_transactions", methods={"GET"})
     */
    public function getTransactions(): JsonResponse
    {
        $user = $this->getUser();
        $transactions = $this->transactionRepository->findBy(['user' => $user]);

        return $this->json($transactions);
    }

    /**
     * @Route("/transactions/{id}/location", name="update_transaction_location", methods={"POST"})
     */
    public function updateTransactionLocation(Request $request, $id): JsonResponse
    {
        $transaction = $this->transactionRepository->find($id);

        if (!$transaction) {
            return $this->json(['error' => 'Transaction not found'], 404);
        }

        $locationData = json_decode($request->getContent(), true);
        $location = new Location();
        $location->setName($locationData['name']);
        $location->setLatitude($locationData['latitude']);
        $location->setLongitude($locationData['longitude']);

        $this->entityManager->persist($location);
        $transaction->setLocation($location);
        $this->entityManager->flush();

        return $this->json(['message' => 'Transaction location updated successfully']);
    }
}
