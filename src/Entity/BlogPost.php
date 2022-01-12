<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BlogPostRepository;
use Doctrine\ORM\Mapping as ORM;

use App\Validator\Constraints\MinimalProperties;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ApiResource(
 *     collectionOperations={
 *          "get"={"security"="is_granted('ROLE_USER')"},
 *          "post"={"security"="is_granted('ROLE_VERIFIED_USER')"},
 *     },
 *     itemOperations={
 *          "get"={"security"="is_granted('ROLE_USER')"},
 *          "patch"={"security"="is_granted('ROLE_VERIFIED_USER')"},
 *          "delete"={"security"="is_granted('ROLE_VERIFIED_USER')"},
 *     }
 * )
 * @ORM\Entity(repositoryClass=BlogPostRepository::class)
 */
class BlogPost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank 
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $PostDate;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private $PostContent;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="blogPosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getPostDate(): ?\DateTimeInterface
    {
        return $this->PostDate;
    }

    public function setPostDate(?\DateTimeInterface $PostDate): self
    {
        $this->PostDate = $PostDate;

        return $this;
    }

    public function getPostContent(): ?string
    {
        return $this->PostContent;
    }

    public function setPostContent(string $PostContent): self
    {
        $this->PostContent = $PostContent;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->Author;
    }

    public function setAuthor(?User $Author): self
    {
        $this->Author = $Author;

        return $this;
    }
}
