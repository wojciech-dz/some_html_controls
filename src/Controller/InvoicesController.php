<?php

namespace App\Controller;

use App\Enum\VatRates;
use App\Repository\InvoicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoicesController extends AbstractController
{
    private InvoicesRepository $invoicesRepository;

    public function __construct(InvoicesRepository $invoicesRepository)
    {
        $this->invoicesRepository = $invoicesRepository;
    }

    /**
     * @Route("/invoices", name="app_invoices")
    */
    public function index(): Response
    {
        $invoices = $this->invoicesRepository->findAll();
        return $this->render('invoices/index.html.twig', [
            'invoices' => $invoices,
            'rates' => VatRates::VAT_RATES,
        ]);
    }

    /**
     * @Route("/invoices-list", name="app_invoices_list")
     */
    public function list(): Response
    {
        $invoices = $this->invoicesRepository->findAll();
        return $this->render('invoices/list.html.twig', [
            'invoices' => $invoices,
            'rates' => VatRates::VAT_RATES,
        ]);
    }
}
