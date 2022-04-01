<?php

namespace App\Controller;

use App\Form\ContactUsFormType;
use App\Form\NewletterSubscribtionFormType;
use App\Message\NewsLetter;
use App\Service\ArticleService;
use App\Service\CategoryService;
use App\Service\HomeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $article_service;
    private $category_service;
    private $home_service;

    public function __construct(ArticleService $article_service,
                                CategoryService $category_service,
                                HomeService $home_service)
    {
        $this->article_service = $article_service;
        $this->category_service = $category_service;
        $this->home_service     = $home_service;
    }

    /**
     * @Route(
     *     "/posts",
     *     name="posts"
     *     )
     */
    public function index(MessageBusInterface $bus): Response
    {
        // Test newsletter
        $bus->dispatch(new NewsLetter('Hello Guys'));

        $latest_articles = $this->article_service->getLatestArticles(6);

        return $this->render('home/index.html.twig', [
            'latest_articles'   => $latest_articles,
        ]);
    }

    /**
     * @Route (
     *     "/get-posts/{page}",
     *     name = "get-posts-per-page",
     *     methods = "GET",
     *     requirements= {"page" ="\d+"}
     *     )
     *
     * @param int $page
     * @return JsonResponse
     */
    public function get_posts(int $page = 1): JsonResponse
    {
        $articles = $this->article_service->getArticlesPerPage($page, 3);
        $number_of_pages = ceil($this->article_service->getArticlesCount() / 3);

        return new JsonResponse(
            [
                'data' => $articles,
                'number_of_pages' => $number_of_pages
            ],200
        );

    }
    /**
     * @Route(
     *     "/contact-us",
     *     name="contact-us"
     * )
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function contact_us(Request $request, MailerInterface $mailer): Response
    {
        $contact_us_form = $this->createForm(ContactUsFormType::class);

        $contact_us_form->handleRequest($request);
        if ($contact_us_form->isSubmitted() && $contact_us_form->isValid()) {
            $mail_data = $contact_us_form->getData();

            $email = (new Email())
                ->from($mail_data['email'])
                ->to('basemlovephp@gmail.com')
                ->subject($mail_data['subject'])
                ->text($mail_data['message']);

            $mailer->send($email);
            $this->addFlash(
                'notice',
                'Your message was send!'
            );
            return $this->redirectToRoute('contact-us');
        }

        return $this->render('home/contact-us.html.twig',
        [
            'contact_us' => $contact_us_form->createView()
        ]);
    }

    /**
     * @Route(
     *     "/subscribe",
     *     name="store_subscription",
     *     methods = "post"
     * )
     */
    public function storeSubscription(Request $request)
    {
        $newsletter_form = $this->home_service->getNewsletterForm();
        $newsletter_form->handleRequest($request);
        if($newsletter_form->isSubmitted() && $newsletter_form->isValid()){
            $newsletter_data = $newsletter_form->getData();
            $this->home_service->storeNewsletterSubscription($newsletter_data);

            $this->addFlash(
                'success',
                'You subscribed to us!'
            );
            return $this->redirect($request->headers->get('referer'));

        }
        dd($request->request->all());
    }
}
