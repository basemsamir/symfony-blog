<?php


namespace App\Service;


use App\Entity\NewsLetter;
use App\Entity\Setting;
use App\Form\NewletterSubscribtionFormType;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;


class HomeService extends AbstractService
{
    private $newsletter_repo;
    private $setting_repo;
    private $container;
    private $form_factory;

    public function __construct(ManagerRegistry $doctrine, ContainerInterface $container)
    {
        parent::__construct($doctrine);
        $this->newsletter_repo = $this->doctrine->getRepository(NewsLetter::class);
        $this->setting_repo    = $this->doctrine->getRepository(Setting::class);
        $this->container       = $container;
        $this->form_factory    = $this->container->get('form.factory');
    }

    public function getNewsletterForm()
    {
        return $this->form_factory->create(
            NewletterSubscribtionFormType::class,
            [], [
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
        $cached_settings = $this->cache->getItem('settings.all');
        if(!$cached_settings->isHit()){
            $settings = [];
            $entities = $this->setting_repo->findAll();
            foreach ($entities as $entity){
                $settings[$entity->getConfigKey()] = $entity->getConfigValue();
            }
            $cached_settings->set($settings);
            $this->cache->save($cached_settings);
        }

        return $cached_settings->get();
    }

}