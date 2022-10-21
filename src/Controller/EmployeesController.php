<?php

namespace App\Controller;

use App\Repository\EmployeesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeesController extends AbstractController
{
    private EmployeesRepository $employeesRepository;

    public function __construct(EmployeesRepository $employeesRepository)
    {
        $this->employeesRepository = $employeesRepository;
    }

    /**
     * @Route("/employees", name="app_employees")
     */
    public function index(): Response
    {
        $employees = $this->employeesRepository->findAll();
        return $this->render('employees/index.html.twig', [
            'employees' => $employees,
        ]);
    }

    /**
     * @Route("/employees-list", name="app_employees_list")
     */
    public function list(): Response
    {
        $employees = $this->employeesRepository->findAll();
        return $this->render('employees/list.html.twig', [
            'employees' => $employees,
        ]);
    }
}
