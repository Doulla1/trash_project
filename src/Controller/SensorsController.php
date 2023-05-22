<?php

namespace App\Controller;

use PhpParser\Builder\Class_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Sensors;
use Doctrine\ORM\EntityManagerInterface;


class SensorsController extends AbstractController
{
	public function __construct(EntityManagerInterface $sensorsManager)
	{
		$this->entityManager = $sensorsManager;
	}
	
	 /**
     * @Route("/sensors", methods={"GET"})
     */
    public function index(): Response
    {
        $sensors = $this->entityManager->getRepository(Sensors::class)->findAll();

        return $this->json($sensors);
    }

    /**
     * @Route("/sensors", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $sensors = new Sensors();
        $sensors->setJoystick($data['joystick']);
        $sensors->setUltrasound($data['ultrasound']);
        $sensors->setSensorThree($data['button']);

        $this->entityManager->persist($sensors);
        $this->entityManager->flush();

        return $this->json($sensors, Response::HTTP_CREATED);
    }

    /**
     * @Route("/sensors/{id}", methods={"PUT"})
     */
    public function update(Request $request, Sensors $sensor, int $id): Response
    {
        $data = json_decode($request->getContent(), true);
        $sensor2 = $this->entityManager->getRepository(Sensors::class)->find($id);

        $sensor2->setJoystick($data['joystick']);
        $sensor2->setUltrasound($data['ultrasound']);
        $sensor2->setSensorThree($data['button']);

        $this->entityManager->flush();

        return $this->json($sensor2);
    }
}
