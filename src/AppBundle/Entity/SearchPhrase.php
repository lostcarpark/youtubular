<?php
// src/AppBundle/Entity/SearchPhrase.php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class SearchPhrase
{
    /**
     * @Assert\NotBlank()
     */
    protected $searchTerm;

    public function getSearchTerm()
    {
        return $this->searchTerm;
    }

    public function setSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }

}