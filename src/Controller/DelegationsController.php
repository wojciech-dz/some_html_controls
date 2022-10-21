<?php

namespace App\Controller;

use App\Repository\DelegationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DelegationsController extends AbstractController
{
    private DelegationsRepository $delegationsRepository;

    public function __construct(DelegationsRepository $delegationsRepository)
    {
        $this->delegationsRepository = $delegationsRepository;
    }


    /**
     * @Route("/delegations", name="app_delegations")
     */
    public function index(): Response
    {
        $delegations = $this->delegationsRepository->findAll();
        return $this->render('delegations/index.html.twig', [
            'delegations' => $delegations,
        ]);
    }

    /**
     * @Route("/delegations-list", name="app_delegations_list")
     */
    public function list(): Response
    {
        $delegations = $this->delegationsRepository->findAll();
        return $this->render('delegations/list.html.twig', [
            'delegations' => $delegations,
        ]);
    }
}
