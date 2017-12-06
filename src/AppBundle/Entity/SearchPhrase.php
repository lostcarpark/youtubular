<?php
// src/AppBundle/Entity/SearchPhrase.php
//
// This is the entity class for a search phrase, used to store data to build the form, and return the form result.
//
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class SearchPhrase
{
    /**
     * @Assert\NotBlank()
     */
    protected $searchTerm;
    protected $type;

    public function getSearchTerm()
    {
        return $this->searchTerm;
    }

    public function setSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

}