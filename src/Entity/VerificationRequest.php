<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VerificationRequestRepository;
use Doctrine\ORM\Mapping as ORM;

use App\Validator\Constraints\MinimalProperties;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VerificationRequestRepository::class)
 */
class VerificationRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank 
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="verificationRequest", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Message;

    /**
     * @Assert\NotBlank 
     * @ORM\Column(type="string", length=255)
     */
    private $IdImageUrl;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $RequestStatus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $RejectReason;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $CreatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(?string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }

    public function getIdImageUrl(): ?string
    {
        return $this->IdImageUrl;
    }

    public function setIdImageUrl(string $IdImageUrl): self
    {
        $this->IdImageUrl = $IdImageUrl;

        return $this;
    }

    public function getRequestStatus(): ?string
    {
        return $this->RequestStatus;
    }

    public function setRequestStatus(string $RequestStatus): self
    {
        $this->RequestStatus = $RequestStatus;

        return $this;
    }

    public function getRejectReason(): ?string
    {
        return $this->RejectReason;
    }

    public function setRejectReason(?string $RejectReason): self
    {
        $this->RejectReason = $RejectReason;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }
}
