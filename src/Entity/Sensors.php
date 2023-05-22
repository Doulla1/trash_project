<?php

namespace App\Entity;

use App\Repository\SensorsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SensorsRepository::class)]
class Sensors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $joystick = null;

    #[ORM\Column]
    private ?float $ultrasound = null;

    #[ORM\Column]
    private ?float $sensor_three = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoystick(): ?float
    {
        return $this->joystick;
    }

    public function setJoystick(float $joystick): self
    {
        $this->joystick = $joystick;

        return $this;
    }

    public function getUltrasound(): ?float
    {
        return $this->ultrasound;
    }

    public function setUltrasound(float $ultrasound): self
    {
        $this->ultrasound = $ultrasound;

        return $this;
    }

    public function getSensorThree(): ?float
    {
        return $this->sensor_three;
    }

    public function setSensorThree(float $sensor_three): self
    {
        $this->sensor_three = $sensor_three;

        return $this;
    }
}
