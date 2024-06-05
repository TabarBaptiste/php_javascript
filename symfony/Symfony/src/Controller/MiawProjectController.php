<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Entity\Chassis;
use App\Entity\Roue;
use App\Entity\Moteur;
use App\Entity\Client;
use App\Entity\Vehicule;
use App\Entity\Couleur;
use App\Form\MoteurFormType;
use App\Form\RoueFormType;
use App\Form\ChassisFormType;
use App\Form\ClientFormType;
use App\Form\VehiculeFormType;

class MiawProjectController extends AbstractController
{
    /**
     * @Route("/miaw_project", name="app_miaw_project")
     */
    public function index(): Response
    {
        return $this->render('miaw_project/title.html.twig', [
            // 'controller_name' => 'MiawProjectController',
            'title' => "Le titre là ici peut-être I think.",
            'date' => date('d/m/Y'),
            'heure' => date('H:i:s'),
        ]);
    }

    /**
     * @Route("/tableau", name="app_tableau")
     */
    public function tableau(): Response
    {
        // Définir un tableau d'éléments
        $elements = ['BMW', 'Audi', 'Mercedes', 'Toyota'];

        // Rendre le template Twig en transmettant le tableau d'éléments
        return $this->render('miaw_project/tableau.html.twig', [
            'elements' => $elements,
        ]);
    }

    /**
     * @Route("/add_roue/{diametre}", name="app_add_roue")
     */
    public function addRoue($diametre): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $maRoue = new Roue();
        $maRoue->setDiametre($diametre);

        $entityManager->persist($maRoue);
        $entityManager->flush();
        // return new Response('Nouvelle roue créée : ' . $maRoue->getId());
        return $this->render('miaw_project/get_roue.html.twig', [
            'roue' => $maRoue,
        ]);
    }

    /**
     * @Route("/add_chasseur/{longueur}/{largeur}", name="app_add_chasseur")
     */
    public function addChassis($longueur, $largeur): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $monChassis = new Chassis();
        $monChassis->setLongueur($longueur);
        $monChassis->setLargeur($largeur);

        $entityManager->persist($monChassis);
        $entityManager->flush();
        // return new Response('Nouvelle chassis créée : ' . $maRoue->getId());
        return $this->render('miaw_project/get_element.html.twig', [
            'chassis' => $monChassis,
            'type' => 'chassis'
        ]);
    }

    /**
     * @Route("/add_moteur/{energie}/{puissance}", name="app_add_moteur")
     */
    public function addMoteur($energie, $puissance): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $monMoteur = new Moteur();
        $monMoteur->setEnergie($energie);
        $monMoteur->setPuissance($puissance);

        $entityManager->persist($monMoteur);
        $entityManager->flush();
        // return new Response('Nouvelle Moteur créée : ' . $maRoue->getId());
        return $this->render('miaw_project/get_element.html.twig', [
            'moteur' => $monMoteur,
            'type' => 'moteur'
        ]);
    }

    /**
     * @Route("/ajout_moteur", name="app_ajout_moteur")
     */
    public function ajoutMoteur(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();

            // Récupérer les données du formulaire
            $energie = $request->request->get('energie');
            $puissance = $request->request->get('puissance');

            // Vérifier si le moteur existe déjà en base de données
            $moteurRepository = $entityManager->getRepository(Moteur::class);
            $existingMoteur = $moteurRepository->findOneBy(['energie' => $energie, 'puissance' => $puissance]);

            if ($existingMoteur) {
                // Afficher un message d'erreur ou rediriger avec un message d'erreur
                $this->addFlash('error', 'Ce moteur existe déjà en base de données.');
                return $this->redirectToRoute('app_ajout_moteur');
            }

            // Créer une nouvelle instance de l'entité Moteur
            $moteur = new Moteur();
            $moteur->setEnergie($energie);
            $moteur->setPuissance($puissance);

            // Persist et flush pour enregistrer le moteur en base de données
            $entityManager->persist($moteur);
            $entityManager->flush();

            // Rediriger vers une autre page ou afficher un message de succès
            return $this->render('miaw_project/get_element.html.twig', ['type' => 'moteur', 'moteur' => $moteur]);
        }

        // Si la méthode est GET, afficher simplement le formulaire
        return $this->render('miaw_project/ajout_moteur.html.twig');
    }

    /**
     * @Route("/ajout_chassis", name="app_ajout_chassis")
     */
    public function ajoutChassis(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();

            // Récupérer les données du formulaire
            $longueur = $request->request->get('longueur');
            $largeur = $request->request->get('largeur');

            // Vérifier si le chassis existe déjà en base de données
            $chassisRepository = $entityManager->getRepository(Chassis::class);
            $existingChassis = $chassisRepository->findOneBy(['longueur' => $longueur, 'largeur' => $largeur]);

            if ($existingChassis) {
                // Afficher un message d'erreur ou rediriger avec un message d'erreur
                $this->addFlash('error', 'Ce chassis existe déjà en base de données.');
                return $this->redirectToRoute('app_ajout_chassis');
            }

            // Créer une nouvelle instance de l'entité Chassis
            $chassis = new Chassis();
            $chassis->setLargeur($longueur);
            $chassis->setLongueur($largeur);

            // Persist et flush pour enregistrer le chassis en base de données
            $entityManager->persist($chassis);
            $entityManager->flush();

            // Rediriger vers une autre page ou afficher un message de succès
            return $this->render('miaw_project/get_element.html.twig', ['type' => 'chassis', 'chassis' => $chassis]);
        }

        // Si la méthode est GET, afficher simplement le formulaire
        return $this->render('miaw_project/ajout_chassis.html.twig');
    }

    /**
     * @Route("/new_roue", name="app_new_roue")
     */
    public function newRoue(Request $request)
    {
        $roue = new Roue();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $roue);

        $formBuilder
            ->add('diametre', TextType::class)
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {

                $roue = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($roue);
                $entityManager->flush();

                $message = "La roue de diamètre " . $roue->getDiametre() . " a bien été créée.";
            } else {
                $message = "Y'a un problème dans le formulaire.";
            }
        } else {
            $message = "Entrer le diamètre de la roue.";
        }

        return $this->render('miaw_project/form-roue.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    /**
     * @Route("/new_moteur", name="app_new_moteur")
     */
    public function newMoteur(Request $request)
    {
        $moteur = new Moteur();

        $formBuilder = $this->get('form.factory')->createBuilder(MoteurFormType::class, $moteur);

        $form = $formBuilder->getForm();

        $formBuilder
            ->add('save', SubmitType::class);

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {

                $moteur = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($moteur);
                $entityManager->flush();

                $message = "Nouveau moteur enregistré. Energie : " . $moteur->getEnergie() . ". Puissance : " . $moteur->getPuissance();
            } else {
                $message = "Y'a un problème dans le formulaire.";
            }
        } else {
            $message = "Entrer l'énergie et la puissance du moteur.";
        }

        return $this->render('miaw_project/form-roue.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    /**
     * @Route("/new_roue2", name="app_new_roue2")
     */
    public function newRoue2(Request $request)
    {
        $roue = new Roue();

        $formBuilder = $this->get('form.factory')->createBuilder(RoueFormType::class, $roue);

        $formBuilder
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {

                $roue = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($roue);
                $entityManager->flush();

                $message = "Nouveau roue enregistré. Energie : " . $roue->getEnergie() . ". Puissance : " . $roue->getPuissance();
            } else {
                $message = "Y'a un problème dans le formulaire.";
            }
        } else {
            $message = "Entrer l'énergie et la puissance du roue.";
        }

        return $this->render('miaw_project/form-roue.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    /**
     * @Route("/new_chassis", name="app_new_chassis")
     */
    public function newChassis(Request $request)
    {
        $chassis = new Chassis();

        $formBuilder = $this->get('form.factory')->createBuilder(ChassisFormType::class, $chassis);

        $formBuilder
            ->add('save', SubmitType::class);
        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {

                $chassis = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($chassis);
                $entityManager->flush();

                $message = "Nouveau chassis enregistré";
            } else {
                $message = "Y'a un problème dans le formulaire.";
            }
        } else {
            $message = "Entrer l'énergie et la puissance du chassis.";
        }

        return $this->render('miaw_project/form-roue.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    /**
     * @Route("/new_client", name="app_new_client")
     */
    public function newClient(Request $request)
    {
        $client = new Client();

        $formBuilder = $this->get('form.factory')->createBuilder(ClientFormType::class, $client);

        $formBuilder
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {

                $client = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($client);
                $entityManager->flush();

                $message = "Nouveau client enregistré. Prénom : " . $client->getPrenom() . ". Nom : " . $client->getPuissance() . ". Email : " . $client->getEmail();
            } else {
                $message = "Y'a un problème dans le formulaire.";
            }
        } else {
            $message = "Entrer l'énergie et la puissance du client.";
        }

        return $this->render('miaw_project/form-roue.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    /**
     * @Route("/new_vehicule", name="app_new_vehicule")
     */
    public function newVehicule(Request $request)
    {
        $vehicule = new Vehicule();

        $formBuilder = $this->get('form.factory')->createBuilder(VehiculeFormType::class, $vehicule);

        $formBuilder
            ->add('save', SubmitType::class);

        $form = $formBuilder->getForm();

        if ($request->isMethod('POST')) {
            if ($form->handleRequest($request)->isValid()) {

                $vehicule = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($vehicule);
                $entityManager->flush();

                $message = "Nouveau vehicule enregistré. Prénom : " . $vehicule->getModel();
            } else {
                $message = "Y'a un problème dans le formulaire.";
            }
        } else {
            $message = "Entrer l'énergie et la puissance du vehicule.";
        }

        return $this->render('miaw_project/form-vehicule.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }

    /**
     * @Route("/roues/list", name="app_list_roue")
     */
    public function listeRoues()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $roues = $entityManager->getRepository(Roue::class)->findAll();

        return $this->render('miaw_project/liste_roues.html.twig', ['roues' => $roues]);
    }

    /**
     * @Route("/roues/show/{uid}", name="app_show_roue")
     */
    public function showRoues($uid)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $roue = $entityManager->getRepository(Roue::class)->find($uid);

        return $this->render('miaw_project/show_roue.html.twig', ['roue' => $roue]);
    }

    /**
     * @Route("/vehicule/list", name="app_list_vehicule")
     */
    public function listeVehiculeAction(): Response
    {
        $vehicules = $this->getDoctrine()->getRepository(Vehicule::class)->findAll();
        dump($vehicules);
        return $this->render('miaw_project/vehicule_liste.html.twig', ['vehicules' => $vehicules]);
    }

    /**
     * @Route("/ajout_couleur", name="app_ajout_couleur")
     */
    public function ajoutCouleur(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();

            // Récupérer les données du formulaire
            $couleurValue = $request->request->get('couleur');

            // Vérifier si la couleur existe déjà en base de données
            $couleurRepository = $entityManager->getRepository(Couleur::class);
            $existingCouleur = $couleurRepository->findOneBy(['couleur' => $couleurValue]);

            if ($existingCouleur) {
                // Afficher un message d'erreur ou rediriger avec un message d'erreur
                $this->addFlash('error', 'Cette couleur existe déjà en base de données.');
                return $this->redirectToRoute('app_ajout_couleur');
            }

            // Créer une nouvelle instance de l'entité Couleur
            $couleur = new Couleur();
            $couleur->setCouleur($couleurValue);

            // Persist et flush pour enregistrer la couleur en base de données
            $entityManager->persist($couleur);
            $entityManager->flush();

            // Rediriger vers une autre page ou afficher un message de succès
            return $this->render('miaw_project/get_element.html.twig', ['type' => 'couleur', 'couleur' => $couleur]);
        }

        // Si la méthode est GET, afficher simplement le formulaire
        return $this->render('miaw_project/ajout_couleur.html.twig');
    }
}