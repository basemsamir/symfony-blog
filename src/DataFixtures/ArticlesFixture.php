<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ArticlesFixture extends Fixture
{
    private $doctrine;
    private $password_hasher;
    private $user;
    public function __construct(ManagerRegistry $doctrine, UserPasswordHasherInterface $password_hasher)
    {
        $this->doctrine = $doctrine;
        $this->password_hasher = $password_hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $this->user = new User();
        $this->user->setUsername('normal user 2')
            ->setPassword($this->password_hasher->hashPassword($this->user, 'user'))
            ->setEmail('asd2@asd.com')
            ->setRoles(['author']);
        $manager->persist($this->user);
        $manager->flush();

        $this->persist_articles_for_category($manager, 'Sports');
        $this->persist_articles_for_category($manager, 'Fashion');
        $this->persist_articles_for_category($manager, 'News');
        $manager->flush();
    }

    /**
     * Store some fake data into articles
     * @param ObjectManager $manager
     * @param string $category_name
     */
    private function persist_articles_for_category(ObjectManager $manager, string $category_name)
    {
        $faker = Factory::create();

        $category = new Category();
        $category->setName($category_name);
        $category->setActive(1);
        $manager->persist($category);

        for($i=0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence());
            $article->setContent($faker->text());
            $article->setCreated($faker->dateTimeBetween('-7 days', '0 days'));
            $article->setImagePath('blog/blog1.png');
            $article->setCategory($category);
            $article->setUser($this->user);

            $comment = new Comment();
            $comment->setContent($faker->paragraphs(3,true));
            $manager->persist($comment);
            $article->addComment($comment);

            $manager->persist($article);
        }
    }
}
