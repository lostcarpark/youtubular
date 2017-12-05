<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SearchPhrase;
use AppBundle\Form\SearchForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $search = new SearchPhrase();
        $search->setSearchTerm('Search YouTube');

        $form = $this->createForm(SearchForm::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData();

            return $this->render('default/searchresult.html.twig', array(
                'searchTerm' => $search->getSearchTerm(),
            ));
        }
        return $this->render('default/searchform.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

