<?php 
namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Transaction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Create a user
        $user = new User();
        $user->setEmail('test@example.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));
        $manager->persist($user);

        // Create transactions
        for ($i = 0; $i < 10; $i++) {
            $transaction = new Transaction();
            $transaction->setDescription("Transaction $i");
            $transaction->setAmount(mt_rand(10, 100));
            $transaction->setDate(new \DateTime());
            $transaction->setLatitude(mt_rand(-90, 90));
            $transaction->setLongitude(mt_rand(-180, 180));
            $transaction->setUser($user);
            $manager->persist($transaction);
        }

        $manager->flush();
    }
}
