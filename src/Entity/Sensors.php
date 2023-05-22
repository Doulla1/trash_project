<?php

namespace App\Entity;

use App\Repository\SensorsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @ORM\Entity()
 * @Route("/sensors")
 */
class Sensors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $joystick = null;

    #[ORM\Column(nullable: true)]
    private ?float $ultrasound = null;

    #[ORM\Column(nullable: true)]
    private ?float $sensor_tree = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoystick(): ?float
    {
        return $this->joystick;
    }

    public function setJoystick(?float $joystick): self
    {
        $this->joystick = $joystick;

        return $this;
    }

    public function getUltrasound(): ?float
    {
        return $this->ultrasound;
    }

    public function setUltrasound(?float $ultrasound): self
    {
        $this->ultrasound = $ultrasound;

        return $this;
    }

    public function getSensorTree(): ?float
    {
        return $this->sensor_tree;
    }

    public function setSensorTree(?float $sensor_tree): self
    {
        $this->sensor_tree = $sensor_tree;

        return $this;
    }
}
