<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Test\TestServiceBundle\TestService;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="indexPage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TestService $testService): Response
    {


        return new Response('main page');
    }
}
