<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Tag;
use App\Entity\User;
use App\Repository\UserRepository;
use Carbon\Carbon;
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

        $tags = $this->saveTags($manager, ['football','news']);
        $this->persist_articles_for_category($manager, 'Sports', $tags);

        $tags = $this->saveTags($manager, ['fashion','travel','life style']);
        $this->persist_articles_for_category($manager, 'Fashion', $tags);

        $tags = $this->saveTags($manager, ['war','ill','covid']);
        $this->persist_articles_for_category($manager, 'News', $tags);

        $manager->flush();
    }

    /**
     * Store some fake data into articles
     * @param ObjectManager $manager
     * @param string $category_name
     * @param array $tags
     */
    private function persist_articles_for_category(
        ObjectManager $manager,
        string $category_name,
        array $tags)
    {
        $faker = Factory::create();

        $category = new Category();
        $category->setName($category_name);
        $category->setActive(1);
        $manager->persist($category);

        $commentator = $this->doctrine->getRepository(User::class)->find('11');

        for($i=0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence());
            $article->setContent($faker->text());
            $article->setCreated($faker->dateTimeBetween('-7 days', '0 days'));
            $article->setImagePath('blog/blog1.png');
            $article->setCategory($category);
            $article->setUser($this->user);
            $article->setLikes($faker->randomNumber(2));

            foreach ($tags as $tag){
                $article->addTag($tag);
            }

            $comment = new Comment();
            $comment->setContent($faker->paragraphs(3,true));
            $comment->setCreated(Carbon::now());
            $comment->setUser($commentator);
            $manager->persist($comment);
            $article->addComment($comment);

            $manager->persist($article);
        }
    }

    public function saveTags(ObjectManager $manager, array $tags): array
    {
        $saved_tags = [];
        for ($j=0; $j<count($tags); $j++){
            $tag = new Tag();
            $tag->setTitle($tags[$j]);
            $tag->setCreated(Carbon::now());
            $manager->persist($tag);
            $saved_tags[] = $tag;
        }
        return $saved_tags;
    }
}
