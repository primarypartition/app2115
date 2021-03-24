<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }
    
    public function configureFields(string $pageName): iterable
    {     
        return [
            Field::new('name'),
            AssociationField::new('offers')
                    ->setFormTypeOption("by_reference", false),
            Field::new('description')
                    ->onlyOnDetail() 
                    ->onlyOnForms(),
            ImageField::new('image')                    
                    ->setUploadDir($this->getParameter('product_images')) 
                    ->onlyOnForms(),
            ImageField::new('image')
                    ->setBasePath($this->getParameter('app.path.product_images'))
                    ->onlyOnDetail() 
                    ->onlyOnIndex()
        ]; 
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions         
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)            
        ;
    }
    
}
