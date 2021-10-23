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

        $site_list = ['Affaires', 'Boutique en ligne', 'Administration', 'Service de bricolage', 'Restaurants et Alimentations', 'Photographie', 'Evenements', 'Technologie et Web', 'Services de Transports', 'Hotêllerie et Tourisme', 'Musique', 'Arts Créatifs', 'Santé', 'Sport et Loisirs', 'CV et Porefolio', 'Communautés'];

        $type_list = ['Site', 'Logo', 'Application', 'Carte'];

        $type = [];
        foreach ($type_list as $key => $value) {
            $productType = new ProductType;

            $productType->setName($value)
                ->setCreatedAt(new DateTime())
                ->setSlug(strtolower($this->slugger->slug($value)));

            $manager->persist($productType);

            $type[] = $productType;
        }

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

        for ($s = 0; $s < 8; $s++) {
            $product = new Product;

            $product->setReference("SITE-XYZ-$s")
                ->setName($faker->company())
                ->setPrice(2549)
                ->setDelivery(new DateTime())
                ->setCreatedAt(new DateTime())
                ->setProductType($type[0])
                ->setProductCategory($site[$s]);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
