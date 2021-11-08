<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Product;
use App\Entity\ProductType;
use App\Entity\ProductCategory;
use App\Repository\ProductTypeRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;


class AppFixtures extends Fixture
{
    protected $slugger;
    protected $encoder;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $products = [];

        // Info
        $type_list = ['Site', 'Logo', 'Application', 'Carte'];

        $site_list = ['Affaires', 'Boutique en ligne', 'Administration', 'Service de bricolage', 'Restaurants et Alimentations', 'Photographie', 'Evenements', 'Technologie et Web', 'Services de Transports', 'Hotêllerie et Tourisme', 'Musique', 'Arts Créatifs', 'Santé', 'Sport et Loisirs', 'CV et Porefolio', 'Communautés'];

        $logo_list = ['Alpha', 'Beta', 'Charlie', 'Delta'];

        $app_list = ['Gestion', 'Tableau de bord', 'Superviseur'];

        $carte_list = ['Golden', 'Mate Black', 'Abeille', 'Pizza', 'Elegance', 'Hyper'];

        // Other
        $name_list = ['Pâtisserie', 'Restaurant', 'Hôtel', 'Pizzeria', 'Vetements et Mode', 'Tourisme'];

        // Création de Type
        $type = [];
        foreach ($type_list as $key => $value) {
            $productType = new ProductType;

            $productType->setName($value)
                ->setCreatedAt(new DateTime())
                ->setSlug(strtolower($this->slugger->slug($value)));

            $manager->persist($productType);

            $type[] = $productType;
        }

        // Création de Categorie Site
        $site = [];
        foreach ($site_list as $key => $value) {
            $productCategory = new ProductCategory;

            $productCategory->setName($value)
                ->setSlug(strtolower($this->slugger->slug($value)))
                ->setCreatedAt(new DateTime())
                ->setProductType($type[0]);

            $manager->persist($productCategory);

            $site[] = $productCategory;
        }

        // Création de Categorie Logo
        $logo = [];
        foreach ($logo_list as $key => $value) {
            $productCategory = new ProductCategory;

            $productCategory->setName($value)
                ->setSlug(strtolower($this->slugger->slug($value)))
                ->setCreatedAt(new DateTime())
                ->setProductType($type[1]);

            $manager->persist($productCategory);

            $logo[] = $productCategory;
        }

        // Création de Categorie Application
        $app = [];
        foreach ($app_list as $key => $value) {
            $productCategory = new ProductCategory;

            $productCategory->setName($value)
                ->setSlug(strtolower($this->slugger->slug($value)))
                ->setCreatedAt(new DateTime())
                ->setProductType($type[2]);

            $manager->persist($productCategory);

            $app[] = $productCategory;
        }

        // Création de Categorie carte
        $carte = [];
        foreach ($carte_list as $key => $value) {
            $productCategory = new ProductCategory;

            $productCategory->setName($value)
                ->setSlug(strtolower($this->slugger->slug($value)))
                ->setCreatedAt(new DateTime())
                ->setProductType($type[3]);

            $manager->persist($productCategory);

            $carte[] = $productCategory;
        }

        // Création de Site
        $num = 0;
        foreach ($name_list as $key => $value) {
            $num++;
            $product = new Product;

            $product->setReference("SITE-XYZ-$num")
                ->setName($value)
                ->setPrice(2549)
                ->setDelivery(new DateTime())
                ->setCreatedAt(new DateTime())
                ->setProductType($type[0])
                ->setProductCategory($site[$num]);

            $manager->persist($product);
        }

        // Création de Logo
        $num_l = -1;
        foreach ($logo_list as $key => $value) {
            $num_l++;
            $product = new Product;

            $tier = strtoupper($logo_list[$num_l]);
            $product->setReference("LOGO-$tier-$num_l")
                ->setName($value)
                ->setPrice(269)
                ->setDelivery(new DateTime())
                ->setCreatedAt(new DateTime())
                ->setProductType($type[1])
                ->setProductCategory($logo[$num_l]);

            $manager->persist($product);
        }

        // Création de Application
        $num_a = -1;
        foreach ($app_list as $key => $value) {
            $num_a++;
            $product = new Product;

            $product->setReference("APP-PREP-$num_a")
                ->setName($value)
                ->setPrice(1899)
                ->setDelivery(new DateTime())
                ->setCreatedAt(new DateTime())
                ->setProductType($type[2])
                ->setProductCategory($app[$num_a]);

            $manager->persist($product);
        }

        // Création de Application
        $num_c = -1;
        foreach ($carte_list as $key => $value) {
            $num_c++;
            $product = new Product;

            $product->setReference("CARD-ENT-$num_c")
                ->setName($value)
                ->setPrice(59)
                ->setDelivery(new DateTime())
                ->setCreatedAt(new DateTime())
                ->setProductType($type[3])
                ->setProductCategory($carte[$num_c]);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
