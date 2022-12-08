<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Project;
use App\Entity\Skills;
use App\Repository\UserRepository;
use App\Repository\AddressRepository;
use App\Repository\SkillsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security as Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\Json;

#[Route('/api')]
class SecurityController extends AbstractController
{
  public function __construct(
    private UserRepository $userRepository,
    private SerializerInterface $serializer,
    private Security $security,
    private AddressRepository $addressRepository,
    private SkillsRepository $skillsRepository

  )
  {

  }

  #[Route('/login', name: 'app_login', methods: ['POST'])]
  public function login() {
    $user = $this->getUser();
    return $this->json([
      'user' => $user
    ]);
  }

  #[Route('/logout', name: 'app_logout', methods: ['GET'])]
  public function logout()
  {
      // controller can be blank: it will never be called!
      $response = $this->security->logout();

      return $this->json([
        "message" => 'logged out'
      ]);
    }

  #[Route('/register', name: 'user_register', methods: ['POST'])]
  public function app(Request $request) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    $user = $this->userRepository->create($jsonData);

    return $this->json([
      'user'=> $user
    ]);
  }

  #[Route('/registerEdit', name: 'user_register_edit', methods: ['POST'])]
  public function registerEdit(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    $em = $doctrine->getManager();

 
    if (isset($jsonData->data)) {
      $currentUser = $this->userRepository->findOneBy(['id' => $jsonData->data->id]);
      if (isset($jsonData->data->name) && isset($jsonData->firstname) && isset($jsonData->data->phone)) {
        $currentUser->setNom($jsonData->data->name);
        $currentUser->setPrenom($jsonData->data->firstname);
        $currentUser->setTelephone($jsonData->data->phone);
      }
  
      $address = $this->addressRepository->findOneBy(['user_id' => $currentUser->getId()]);
  
      if (!$address && isset($jsonData->data->address)) {
        $address = new Address();
        $address->setUserId($currentUser);
        $address->setAddress($jsonData->data->address);
        $em->persist($address);
      }
    }


    if (isset($currentUser) && $currentUser->getUserType() === 2 && isset($jsonData->project) && isset($jsonData->project->skill)) {
      $project = new Project();
      $project->setUserId($currentUser);
      $project->setDescription($jsonData->project->description);
      $project->setName($jsonData->project->name);
      $project->setField($jsonData->project->field);
      $em->persist($project);

      $skillWantEntry = $this->skillsRepository->findOneBy(['name' => $jsonData->project->skill]);
      if (!$skillWantEntry) {
        $skillWant = new Skills();
        $skillWant->setName($jsonData->project->skill);
        $em->persist($skillWant);
      }
    }

    if (isset($jsonData->data) && isset($currentUser) && 
    $currentUser->getUserType() === 2 && isset($jsonData->data->skill) && isset($jsonData->data->skill1) && isset($jsonData->data->skill2) && isset($jsonData->data->skill3) && isset($jsonData->data->skill4)) {

      for ($i = 1; $i < 4 ; $i++) {
        $skill = $this->skillsRepository->findOneBy(['name' => $jsonData['data']['skill'.$i]]);
        if (!$skill) {
          $skill = new Skills();
          $skill->setName($jsonData['data']['skill'.$i]);
          $em->persist($skill);
          if (isset($project)) $project->addSkill($skill);
        }
      }
    }

    if (isset($currentUser)) $em->persist($currentUser);
    
    $em->flush();

    if (!isset($currentUser)) $currentUser = "no user data to update";

    return $this->json([
      'user'=> $currentUser
    ]);
  }

  #[Route('/infos', name: 'user_infos', methods: ['GET'])]
  public function profile() : JsonResponse
  {
    $currentUser = $this->security->getUser();
    return $this->json([
      'user'=> $currentUser
    ]);
  }
}
