<?php


namespace App\Service;


use App\Entity\NewsLetter;
use App\Entity\Setting;
use App\Form\NewletterSubscribtionFormType;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Container\ContainerInterface;


class HomeService extends AbstractService
{
    private $newsletter_repo;
    private $setting_repo;
    private $container;

    public function __construct(ManagerRegistry $doctrine, ContainerInterface $container)
    {
        parent::__construct($doctrine);
        $this->newsletter_repo = $this->doctrine->getRepository(NewsLetter::class);
        $this->setting_repo    = $this->doctrine->getRepository(Setting::class);
        $this->container       = $container;
    }

    public function getNewsletterForm()
    {
        return $this->container
            ->get('form.factory')
            ->create(NewletterSubscribtionFormType::class,[],[
                'action'    =>  $this->container->get('router')->generate('store_subscription')
            ]);
    }

    public function getNewsletterFormView()
    {
        $newsletter_form = $this->getNewsletterForm();
        return $newsletter_form->createView();
    }

    public function storeNewsletterSubscription($newsletter_data)
    {
        $this->newsletter_repo->create($newsletter_data);
    }

    public function getSettings(): array
    {
        $settings = [];

        $entities = $this->setting_repo->findAll();
        foreach ($entities as $entity){
            $settings[$entity->getConfigKey()] = $entity->getConfigValue();
        }

        return $settings;
    }

}