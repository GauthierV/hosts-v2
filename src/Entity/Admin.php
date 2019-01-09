<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdminRepository")
 */
class Admin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Reservation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TableHost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->User;
    }

    public function setUser(string $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getReservation(): ?string
    {
        return $this->Reservation;
    }

    public function setReservation(string $Reservation): self
    {
        $this->Reservation = $Reservation;

        return $this;
    }

    public function getTableHost(): ?string
    {
        return $this->TableHost;
    }

    public function setTableHost(string $TableHost): self
    {
        $this->TableHost = $TableHost;

        return $this;
    }
}
