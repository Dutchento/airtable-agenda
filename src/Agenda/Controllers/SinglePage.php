<?php

declare(strict_types=1);

namespace Dutchento\Agenda\Controllers;

use Dutchento\Agenda\Factories\Airtable;
use Dutchento\Agenda\Factories\SpeakingSlot;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class SinglePage
{
    protected $view;

    public function __construct(ContainerInterface $container)
    {
        $this->view = $container->get('view');
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return mixed
     */
    public function __invoke(Request $request, Response $response, $args = [])
    {
        $table = Airtable::getDbInstance('appdLzM2UvB5LA2Cy');

        $tableRequest = $table->getContent('Speaking Slots', [
            'sort' => [['field' => 'Start', 'direction' => 'desc']],
            'view' => 'Grid view'
        ]);

        $recordsCollection = [];
        do {
            $response = $tableRequest->getResponse();
            $recordsCollection = array_map(function($object) {
                return SpeakingSlot::createObject(json_decode(json_encode($object),true));
            }, $response['records']);
        }
        while( $tableRequest = $response->next() );

        return $this->view->render($response, 'pages/agenda.twig', [
            'slots' => $recordsCollection
        ]);
    }
}
