<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sensors;
use Doctrine\ORM\EntityManagerInterface;


class SensorsController extends AbstractController
{
    /*#[Route('/sensors', name: 'app_sensors')]
    public function index(): Response
    {
        return $this->render('sensors/index.html.twig', [
            'controller_name' => 'SensorsController',
        ]);
    }
	*/
	public function __construct(EntityManagerInterface $sensorsManager)
	{
		$this->entityManager = $sensorsManager;
	}
	
	 /**
     * @Route("/sensors", methods={"GET"})
     */
    public function index(EntityManagerInterface $sensorsManager): Response
    {
        $sensors = $this->findAll();

        return $this->json($sensors);
    }

    /**
     * @Route("/sensors", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $sensors = new Sensors();
        $sensors->setSensor1($data['sensor1']);
        $sensors->setSensor2($data['sensor2']);
        $sensors->setSensor3($data['sensor3']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($sensors);
        $entityManager->flush();

        return $this->json($sensors, Response::HTTP_CREATED);
    }

    /**
     * @Route("/sensors/{id}", methods={"PUT"})
     */
    public function update(Request $request, Sensors $sensors): Response
    {
        $data = json_decode($request->getContent(), true);

        $sensors->setSensor1($data['sensor1']);
        $sensors->setSensor2($data['sensor2']);
        $sensors->setSensor3($data['sensor3']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->json($sensors);
    }
}
