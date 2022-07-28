<?php

namespace App\Controller\Api;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/list/messages", name="list_messages")
     * @throws TransportExceptionInterface
     */
    public function listMessages(): Response
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://127.0.0.1:8000/api/v1/messages/list');
        $content = $response->toArray();

        return $this->render('message/list.html.twig', [
            'messages' => $content['messages'],
        ]);
    }
}
