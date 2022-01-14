<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\PasswordHasherEncoder;

class UserFixtures extends Fixture
{
    private $password_hasher;

    public function __construct(UserPasswordHasherInterface $password_hasher)
    {
        $this->password_hasher = $password_hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Admin user
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@admin.com');
        $user->setPassword($this->password_hasher->hashPassword($user,'admin'));
        $user->setRoles(['admin']);
        $manager->persist($user);

        // Normal user
        $user = new User();
        $user->setUsername('normal user')
             ->setPassword($this->password_hasher->hashPassword($user, 'user'))
             ->setEmail('asd@asd.com')
             ->setRoles(['author']);
        $manager->persist($user);
        $manager->flush();
    }
}
