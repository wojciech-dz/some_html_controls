<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\Clients1Type;
use App\Repository\ClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientsController extends AbstractController
{
    private ClientsRepository $clientsRepository;

    public function __construct(ClientsRepository $clientsRepository)
    {
        $this->clientsRepository = $clientsRepository;
    }

    /**
     * @Route("/clients", name="app_clients")
    */
    public function index(): Response
    {
        $clients = $this->clientsRepository->findAll();
        return $this->render('clients/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/clients-list", name="app_clients_list")
    */
    public function list(): Response
    {
        $clients = $this->clientsRepository->findAllNotRemoved();
        return $this->render('clients/list.html.twig', [
            'clients' => $clients,
        ]);
    }

    /**
     * @Route("/new", name="app_client_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ClientsRepository $clientsRepository): Response
    {
        $client = new Clients();
        $form = $this->createForm(Clients1Type::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientsRepository->add($client, true);

            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client/new.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_client_show", methods={"GET"}, requirements={"id":"\d+"})
     */
    public function show(Clients $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_client_edit", methods={"GET", "POST"}, requirements={"id":"\d+"})
     */
    public function edit(Request $request, Clients $client, ClientsRepository $clientsRepository): Response
    {
        $form = $this->createForm(Clients1Type::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientsRepository->add($client, true);

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client/edit.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_client_delete", methods={"POST"}, requirements={"id":"\d+"})
     */
    public function delete(Request $request, Clients $client, ClientsRepository $clientsRepository): Response
    {
        echo 'a kuku in delete';
        if ($this->isCsrfTokenValid('delete' . $client->getId(), $request->request->get('_token'))) {
            $clientsRepository->setRemoved($client, true);
        }

        return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
    }
}
