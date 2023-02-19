<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Chatroom;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ChatController extends AbstractController
{
    #[Route('/chatroom/{id}', name: 'chatroom', methods:['GET'])]
    public function getChatroom(ManagerRegistry $doctrine, $id): JsonResponse
    {
        $chatroom = $doctrine->getRepository(Chatroom::class)->find($id);
        $messages = $chatroom->getMessages();
        return $this->json([
            'messages' => $messages,
            'chatroom' => $chatroom
          ]);
    }

    #[Route('/chat', name: 'chatroom', methods:['POST'])]
    public function sendChat(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $jsonData = json_decode($request->getContent());
        $em = $doctrine->getManager();

        $chatroom = $doctrine->getRepository(Chatroom::class)->find($jsonData->chatroom);

        $chat = new Message();
        $chat->setCreatedAt(new DateTime('now'));
        $chat->setUser($jsonData->user);
        $chat->setChatroom($chatroom);

        $em->persist($chat);
        $em->flush();

        $chatroom->addMessage($chat);

        $em->persist($chatroom);
        $em->flush();

        $messages = $chatroom->getMessages();
        
        return $this->json([
            'messages' => $messages,
            'chatroom' => $chatroom
          ]);
    }

    #[Route('/chatrooms', name: 'chatroom', methods:['POST'])]
    public function getChatroomsUser(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $jsonData = json_decode($request->getContent());

        $chatrooms = $doctrine->getRepository(Chatroom::class)->findBy(['user1' => $jsonData->user1]);
        return $this->json([
            'chatrooms' => $chatrooms
          ]);
    }
}
