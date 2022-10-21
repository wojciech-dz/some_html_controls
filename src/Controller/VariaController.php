<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VariaController extends AbstractController
{
    /**
     * @Route("/varia-index", name="app_varia_index")
     */
    public function index(): Response
    {
        return $this->render('varia/index.html.twig', [
            'controller_name' => 'VariaController',
        ]);
    }

    /**
     * @Route("/varia", name="app_varia")
     */
    public function showVars(Request $request): Response
    {
        $form = $this->createForm(ClientsType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $items = $this->service->getItems($url . $data['film_number']);
            return $this->renderForm('varia/show_varia.html.twig', [
                'form' => $form,
            ]);
        }

        return $this->renderForm('varia/show_varia.html.twig', [
            'form' => $form,
        ]);
    }
}
