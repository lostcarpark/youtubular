<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SearchPhrase;
use AppBundle\Form\SearchForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GuzzleHttp\Client;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // create a search phrase object and give an initial value.
        $search = new SearchPhrase();
        $search->setSearchTerm('Search YouTube');

        // Create the form.
        $form = $this->createForm(SearchForm::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData();

            // Form submitted, so create Guzzle client to fetch YouTube data.
            $client = new Client(['base_uri' => 'https://www.googleapis.com/youtube/v3/']);
            $response = $client->request('GET', 'search', [
                'query' => [
                    'part' => 'snippet',
                    'q' => $search->getSearchTerm(),
                    'type' => $search->getType(),
                    'maxResults' => 25,
                    'key' => $this->container->getParameter('app.api_key'),
                ]
            ]);
            // Convert webservice results into array.
            $searchResults = json_decode($response->getBody(), true);

            // Render results with template.
            return $this->render('default/searchresult.html.twig', array(
                'form' => $form->createView(),
                'searchTerm' => $search->getSearchTerm(),
                'searchType' => $search->getType(),
                'searchResults' => $searchResults,
            ));
        }
        // Render the base form.
        return $this->render('default/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

