<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Chatroom;
use App\Entity\User;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api')]
class ChatController extends AbstractController
{
    #[Route('/chatroom/{id}', name: 'chatroom', methods:['GET'])]
    public function getChatroom(ManagerRegistry $doctrine, $id): JsonResponse
    {
        $chatroom = $doctrine->getRepository(Chatroom::class)->find($id);
        $messages =  $doctrine->getRepository(Message::class)->findBy(['chatroom' => $chatroom]);

        return $this->json([
            'messages' => $messages,
            'chatroom' => $chatroom
          ]);
    }

    #[Route('/chat', name: 'sendChat', methods:['POST'])]
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
        
        return $this->json([
            'messages' => $messages,
            'chatroom' => $chatroom
          ]);
    }

    #[Route('/chatrooms', name: 'chatrooms', methods:['POST'])]
    public function getChatroomsUser(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $jsonData = json_decode($request->getContent());
      $user = $doctrine->getRepository(User::class)->find($jsonData->userId);
        $chatrooms = $doctrine->getRepository(Chatroom::class)->findBy(['user1' => $jsonData->userId]);
        $chatrooms2 = $doctrine->getRepository(Chatroom::class)->findBy(['user2' => $jsonData->userId]);

        $chatroomsTotal = array_merge($chatrooms, $chatrooms2);
        return $this->json([
            'chatrooms' => $chatroomsTotal,
          ]);
    }

    #[Route('/sendMessage', name: 'sendMessage', methods:['POST'])]
    public function sendMessage(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $em = $doctrine->getManager();

        $jsonData = json_decode($request->getContent());
        
        $chatroom = $doctrine->getRepository(Chatroom::class)->findOneBy(['id' => $jsonData->chatroomId]);

        $message = new Message();

        $message->setMessage($jsonData->message);
        $message->setUser($jsonData->sender);
        $message->setCreatedAt(new DateTime('now'));
        $message->setChatroom($chatroom);
        $em->persist($message);
        $em->flush();

        $chatroom->addMessage($message);
        $em->persist($chatroom);

        return $this->json([
            'chatrooms' => $chatroom
          ]);
    }
    #[Route('/newMessage', name: 'newMessage', methods:['POST'])]
    public function sendNewMessage(Request $request, ManagerRegistry $doctrine): JsonResponse
    {
        $em = $doctrine->getManager();

        $jsonData = json_decode($request->getContent());
        $sender= $doctrine->getRepository(User::class)->findOneBy(['id' => $jsonData->sender]);

        $chatroom = $doctrine->getRepository(Chatroom::class)->findBy(['user1' => $jsonData->sender, 'user2' => $jsonData->receiver]);
        // dd($chatroom);
        if ($chatroom) return $this->json([
            'added' => true
          ]); 
          // dd();
        $chatroom = new Chatroom();
        $chatroom->setUser1($jsonData->sender);
        $chatroom->setUser2($jsonData->receiver);
        $chatroom->setCreatedAt(new DateTime('now'));

        $em->persist($chatroom);
        $em->flush();
        $message = new Message();

        $message->setMessage($jsonData->message);
        $message->setUser($jsonData->sender);
        $message->setCreatedAt(new DateTime('now'));
        $message->setChatroom($chatroom);
        $em->persist($message);
        $em->flush();

        $chatroom->addMessage($message);
        $em->persist($chatroom);

        $em->flush();
        
        return $this->json([
            'added' => true
          ]);
    }
}
