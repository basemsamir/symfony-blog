<?php


namespace App\Service;


use App\Entity\Article;
use App\Entity\Comment;
use Carbon\Carbon;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Route;

class ArticleService extends AbstractService
{
    private $article_repo;
    private $comment_repo;
    private $entity_manager;
    private $router;

    public function __construct(ManagerRegistry $doctrine, EntityManagerInterface $entity_manager, UrlGeneratorInterface $router)
    {
        parent::__construct($doctrine);

        $this->article_repo     = $this->doctrine->getRepository(Article::class);
        $this->comment_repo     = $this->doctrine->getRepository(Comment::class);
        $this->entity_manager   = $entity_manager;
        $this->router           = $router;
    }

    public function getArticlesCount(): int
    {
        return $this->article_repo->getArticlesCount();
    }

    public function getArticlesPerPage($page_number, $articles_per_page): array
    {
        $start = ($page_number - 1) * $articles_per_page;
        return $this->article_repo->getArticlesPerPage($articles_per_page, $start);
    }

    public function getLatestArticles($number_of_articles)
    {
        $package = new Package(new EmptyVersionStrategy());
        $articles = $this->article_repo->getOrderedNumberOfArticles($number_of_articles, 'DESC');

        array_walk($articles, function (&$item) use($package){
           $item['image_path']   = $package->getUrl('/img/'.$item['image_path']);
           $item['article_url']  = $this->router->generate('article',['id' => $item['id']]);
        //   $item['category_url'] = $this->router->generate('category_articles',['id' => $item['category_id']]);
           $item['created']      = date('Y-m-d',strtotime($item['created']));
        });

        return $articles;
    }

    public function getPreviousNextArticles(Article $current_article)
    {
        return $this->article_repo->getPrevNextArticle($current_article->getId());
    }

    public function increaseViews(Article $article)
    {
        $article->setViews($article->getViews()+1);

        $this->entity_manager->persist($article);
        $this->entity_manager->flush();
    }

    public function getPopularArticles($number_of_articles)
    {
        $popular_articles = $this->article_repo->getMostViewedArticles($number_of_articles);

        array_walk($popular_articles, function (&$item){
           $item['article_url'] =   $this->router->generate('article',['id' => $item['id']]);
           $item['created']     =   date('d M',strtotime($item['created']));
        });

        return $popular_articles;
    }

    public function postArticleComment($comment_data)
    {
        $comment_data['article'] = $this->article_repo->find($comment_data['article_id']);
        unset($comment_data['article_id']);
        $this->comment_repo->insertComment($comment_data);
    }

    public function getArticlesChart(): array
    {
        $current_month_label    = Carbon::now()->format('F');
        $last_month_label       = Carbon::now()->subMonth()->format('F');
        $last_two_month_label   = Carbon::now()->subMonth()->subMonth()->format('F');

        $months_range[]         = Carbon::now()->subMonth()->subMonth()->format('m');
        $months_range[]         = Carbon::now()->subMonth()->format('m');
        $months_range[]         = Carbon::now()->format('m');
        $result                 = $this->article_repo->getArticlesCountLastMonths($months_range);

        return [
            'monthsLabel'  => [$last_two_month_label, $last_month_label, $current_month_label],
            'monthsCount'  => array_column($result,"number_of_articles")
        ];
    }
}