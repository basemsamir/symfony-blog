<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Repository\UserRepository;
use Carbon\Carbon;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints\Choice;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnIndex()->hideOnForm(),
            TextField::new('title')->setSortable(false),
            TextareaField::new('content')->hideOnIndex(),
            AssociationField::new('category')->setSortable(false),
            AssociationField::new('user','Author')
                ->setSortable(false)
                ->hideOnForm(),
            AssociationField::new('tags')->hideOnIndex()
            ->setFormTypeOptionIfNotSet('by_reference', false),
            ImageField::new('image_path')->setUploadDir('public/img')->hideOnIndex(),

            IntegerField::new('views')->hideOnForm(),
            IntegerField::new('likes')->hideOnForm(),
            DateTimeField::new('created')->hideOnForm(),

        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['created'=>'DESC'])
            ->setSearchFields(['title','user.username']);
    }

    public function configureFilters(Filters $filters): Filters
    {
       return $filters->add(EntityFilter::new('category'));
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $parent_query = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        if(!in_array('ROLE_ADMIN',$this->getUser()->getRoles())){
            $parent_query->where('entity.user = '.$this->getUser()->getId());
        }
        return $parent_query;
    }

    public function createEntity(string $entityFqcn): Article
    {
       $article = new Article();
       $article->setLikes(0);
       $article->setCreated(Carbon::now());
       $article->setUser($this->getUser());
       return $article;
    }

}
