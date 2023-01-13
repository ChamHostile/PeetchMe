<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Project;
use App\Entity\Skills;
use App\Repository\UserRepository;
use App\Repository\AddressRepository;
use App\Repository\ProjectRepository;
use App\Repository\SkillsRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
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
    private SkillsRepository $skillsRepository,
    private ProjectRepository $projectRepository
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

  #[Route('/api/login', name: 'api_login', methods: ['POST'])]
  public function apiLogin() {
    $user = $this->getUser();
    return $this->json([
      'user' => $user,
      'userId' => $user->getId()
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
      if (isset($jsonData->data->name) && isset($jsonData->data->firstname)) {
        $currentUser->setNom($jsonData->data->name);
        $currentUser->setPrenom($jsonData->data->firstname);
        if (isset($jsonData->data->phone)) $currentUser->setTelephone($jsonData->data->phone);
        if (isset($jsonData->data->experience)) $currentUser->setExperience($jsonData->data->experience);
        if (isset($jsonData->data->secteur)) $currentUser->setSecteur($jsonData->data->secteur);
        if (isset($jsonData->data->age)) $currentUser->setAge(intval($jsonData->data->age));

        $em->persist($currentUser);
      }
  
      $address = $this->addressRepository->findOneBy(['user_id' => $currentUser->getId()]);
  
      if (!$address && isset($jsonData->data->country)) {
        $address = new Address();
        $address->setUserId($currentUser);
        $address->setCountry($jsonData->data->country); 
        $address->setAddress(""); 
        $address->setZip($jsonData->data->zip);
        if (isset($jsonData->data->localization)) {
          $address->setAddress($jsonData->data->localization);
        }
        $em->persist($address);

      } else if (isset($jsonData->data->country) && $address){

        $address->setCountry($jsonData->data->country);
        $em->persist($address);

      }

    }

    if (isset($jsonData->project)) {
      $user = $this->userRepository->findOneBy(['id' => $jsonData->project->project->id]);
      if ($user->getUserType() === 2) {
        $project = new Project();
        $project->setUserId($user);
        $project->setDescription($jsonData->project->project->description);
        $project->setName($jsonData->project->project->name);
        $project->setField($jsonData->project->project->field);
        $em->persist($project);
  
        $skillWantEntry = $this->skillsRepository->findOneBy(['name' => $jsonData->project->project->skill]);
        $fieldWantEntry = $this->skillsRepository->findOneBy(['name' => $jsonData->project->project->field]);

        if (!$skillWantEntry) {
          $skillWant = new Skills();
          $skillWant->setName($jsonData->project->project->skill);
          $skillWant->setType("competence");
          $em->persist($skillWant);
          $project->addSkill($skillWant);
          $em->persist($project);
        } 
        if (!$fieldWantEntry) {
          $fieldWant = new Skills();
          $fieldWant->setName($jsonData->project->project->field);
          $fieldWant->setType("domaine");
          $em->persist($fieldWant);
          $project->addSkill($fieldWant);
          $em->persist($project);
        }
      }
    }

    if (isset($jsonData->data) && isset($currentUser) && isset($jsonData->data->skill)) {

      foreach($jsonData->data->skill as $skill) {
        $skillEntry = $this->skillsRepository->findOneBy(['name' => $skill]);
        if ($skillEntry) {
          $currentUser->addSkill($skillEntry);
          $em->persist($currentUser);
        }
      }
    }

    if (isset($jsonData->data) && isset($currentUser) && isset($jsonData->data->softSkills)) {

      foreach($jsonData->data->softSkills as $soft) {
        $skillEntry = $this->skillsRepository->findOneBy(['name' => $soft]);
        if ($skillEntry) {
          $currentUser->addSkill($skillEntry);
          $em->persist($currentUser);
        }
      }
    }

    if (isset($jsonData->data) && isset($currentUser) && isset($jsonData->data->secteurs)) {

      foreach($jsonData->data->secteurs as $secteur) {
        $skillEntry = $this->skillsRepository->findOneBy(['name' => $secteur]);
        if ($skillEntry) {
          $currentUser->addSkill($skillEntry);
          $em->persist($currentUser);
        }
      }
    }
    if (isset($jsonData->data->password)) {
      $password = $this->userRepository->changePwd($jsonData->data->password, $currentUser);
    }

    if (isset($currentUser)) $em->persist($currentUser);
    
    $em->flush();

    if (!isset($currentUser)) $currentUser = "no user data to update";
    if (!isset($jsonData)) $jsonData = "no data";
    $thisProject = "";
    if (isset($jsonData->project)) $thisProject = $jsonData->project->project;
    // if (!isset($jsonData->project)) $jsonData = $jsonData.", no project";

    return $this->json([
      'user'=> $currentUser,
      'data' => $jsonData,
      'project' => $thisProject,
      'address' => $address,
      'email' => $currentUser->getEmail()
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

  #[Route('/getProject', name: 'getProject', methods: ['POST'])]
  public function getProject(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    // dd($jsonData);
    $user = $this->userRepository->findOneBy(['id' => $jsonData->id]);
    $project = $this->projectRepository->findOneBy(['user_id' => $user]);

    return $this->json([
      'project' => $project
    ]);
  }

  #[Route('/getProjectFull', name: 'getProjectFull', methods: ['POST'])]
  public function getProjectFull(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    // dd($jsonData);
    $project = $this->projectRepository->findOneBy(['id' => $jsonData->projectId]);
    $user = $this->userRepository->findOneBy(['id' => $project->getUserId()]);

    return $this->json([
      'project' => $project,
      'user' => $user
    ]);
  }

  #[Route('/getUserFull', name: 'getUserFull', methods: ['POST'])]
  public function getUserFull(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    // dd($jsonData);
    $user = $this->userRepository->findOneBy(['id' => $jsonData->id]);
    $address = $this->addressRepository->findOneBy(['user_id' => $user->getId()]);

    $userSkill = $user->getSkills();


    return $this->json([
      'user' => $user,
      'skills' => $userSkill,
      'address' => $address,
      'email' => $user->getEmail()
    ]); 
  }

  #[Route('/match/porteurs', name: 'getProjects', methods: ['GET'])]
  public function getPorteurMatchs(Request $request, ManagerRegistry $doctrine, $page=1) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    if  (isset($jsonData->page)) $page = $jsonData->page;
    $project = $this->projectRepository->createQueryBuilder('u')
                    ->orderBy('u.id', 'DESC')
                    ->getQuery();
    $pageSize = '20';
    $paginator = new Paginator($project);

    $totalItems = count($paginator);

    $pagesCount = ceil($totalItems / $pageSize);

    $paginator
      ->getQuery()
      ->setFirstResult($pageSize * ($page - 1))
      ->setMaxResults($pageSize);

    return $this->json([
      'projects' => $paginator,
      'maxPages' => $pagesCount,
      'maxResults' => $totalItems
    ]);
  }

  #[Route('/match/chercheur', name: 'getChercheurs', methods: ['GET'])]
  public function getCherheurMatchs(Request $request, ManagerRegistry $doctrine, $page=1) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    if (isset($jsonData->page)) $page = $jsonData->page;
    $user = $this->userRepository->createQueryBuilder('u')
                    ->orderBy('u.id', 'DESC')
                    ->getQuery();
    $pageSize = '20';
    $paginator = new Paginator($user);

    $totalItems = count($paginator);

    $pagesCount = ceil($totalItems / $pageSize);

    $paginator
      ->getQuery()
      ->setFirstResult($pageSize * ($page - 1))
      ->setMaxResults($pageSize);

    return $this->json([
      'chercheurs' => $paginator,
      'maxPages' => $pagesCount,
      'maxResults' => $totalItems,
      'page' => $page
    ]);
  }
}
