<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Base;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;









class NautiqueController extends AbstractController
{
    /**
     * @Route("/nautique", name="nautique")
     */
    public function index()
    {
            $repo = $this->getDoctrine()->getRepository(Base::class);
            $bases = $repo->findAll();

        return $this->render('nautique/index.html.twig', [
            'controller_name' => 'NautiqueController',
            'bases'=> $bases
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home ()
    {
        return $this->render('nautique/home.html.twig',[
            'title' => "bienvenue les amis !",
            'age'=> 31
        ]);
    }

    
       /**
     * @Route("/nautique/new", name="nautique_create")
     * @Route("/nautique/{id}/edit", name="nautique_edit")
     */
     public function form(Base $base = null,Request $request,ObjectManager $manager)
     {

        if(!$base) {
             $base=new Base();
        }

       

        //  $base->setName("Nom de la base")
        //       ->setDescription("La description de la base")
        //       ->setAdresse("L'adresse de la base")
        //       ->setCity("La ville de la base")
        //       ->getCodePostal("Le code postale de la base");




            $form= $this->createFormBuilder($base)
                    ->add('name',TextType::class,[
                        'attr'=>[
                            'placeholder'=>"Nom de la base",
                            'class'=>"form-control"
                        ]
                    ])
                    ->add('description',TextareaType::class,[
                        'attr'=>[
                            'placeholder'=>"Description de la base",
                            'class'=>"form-control"
                        ]
                    ])
                    ->add('adresse',TextType::class,[
                        'attr'=>[
                            'placeholder'=>"Adresse de la base",
                            'class'=>"form-control"
                        ]
                    ])
                    ->add('city',TextType::class,[
                        'attr'=>[
                            'placeholder'=>"Ville de la base",
                            'class'=>"form-control"
                        ]
                    ])
                    ->add('code_postal',TextType::class,[
                        'attr'=>[
                            'placeholder'=>"Code postale de la base",
                            'class'=>"form-control"
                        ]
                    ])
                    ->getForm();


                $form->handleRequest($request);
                if($form->isSubmitted() && $form->isValid()) {
                $manager->persist($base);
                $manager->flush();

                return $this->redirectToRoute('nautique_show',['id'=> $base->getId()]);
                }



            return $this->render('nautique/create.html.twig',[
            'formBase'=>$form->createView(),
            'editMode' => $base->getId() != null
        ]);

     }
    
    
    
    /**
     * @Route("/nautique/{id}", name="nautique_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Base::class);
        $bases = $repo->find($id);
        return $this->render('nautique/show.html.twig',[
        'base'=> $bases
        ]);

     }


   
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     /**
     * @Route("/nautique/delete/{id}", name="nautique_delete")
     */
    public function removeEntity($entity){
$manager = $this->getDoctrine()->getManager();
$entity = $manager->merge($entity);       //   <= ajoute cette ligne
$manager->remove($entity);
$manager->flush();
}

     
}
