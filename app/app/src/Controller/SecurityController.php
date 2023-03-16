<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Bibilotheque;
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
use App\Repository\BibilothequeRepository;

#[Route('/api')]
class SecurityController extends AbstractController
{
  public function __construct(
    private UserRepository $userRepository,
    private SerializerInterface $serializer,
    private Security $security,
    private AddressRepository $addressRepository,
    private SkillsRepository $skillsRepository,
    private ProjectRepository $projectRepository,
    private BibilothequeRepository $bibilothequeRepository
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

  #[Route('/user/setType', name: 'set_user_type', methods: ['POST'])]
  public function setUserType(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    $currentUser = $this->userRepository->findOneBy(['id' => $jsonData->id]);
    $currentUser->setUserType($jsonData->type);
    $em = $doctrine->getManager();
    $em->persist($currentUser);
    $em->flush();
    return $this->json([
      'user'=> $currentUser
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
        if (isset($jsonData->data->age)) $currentUser->setAge(intval($jsonData->data->age));

        $em->persist($currentUser);
      }

      if (isset($jsonData->data->description)) {
        if (isset($jsonData->data->experience)) $currentUser->setExperience($jsonData->data->experience);
        if (isset($jsonData->data->secteur)) $currentUser->setSecteur($jsonData->data->secteur);
        if (isset($jsonData->data->description)) $currentUser->setDescription($jsonData->data->description);
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
    if (!isset($address)) $address = [];
    // if (!isset($jsonData->project)) $jsonData = $jsonData.", no project";

    return $this->json([
      'user'=> $currentUser,
      'project' => $thisProject,
      'address' => $address,
      'skill' => $currentUser->getSkills(),
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
      'skills' => $project->getSkills(),
      'user' => $user
    ]);
  }

  #[Route('/getUserFull', name: 'getUserFull', methods: ['POST'])]
  public function getUserFull(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    $em = $doctrine->getManager();

    // dd($jsonData);
    $user = $this->userRepository->findOneBy(['id' => $jsonData->id]);
    $address = $this->addressRepository->findOneBy(['user_id' => $user->getId()]);

    $bibliotheque = $user->getBibilotheque();
    if (!$bibliotheque) {
      $bibliotheque = new Bibilotheque();
      $bibliotheque->setUserId($user);
      $em->persist($bibliotheque);
      $em->flush();
    }

    $biblioProjects = $bibliotheque->getProjectId();

    return $this->json([
      'user' => $user,
      'address' => $address,
      'skill' => $user->getSkills(),
      'email' => $user->getEmail(),
      'bibliothequeProjects' => $biblioProjects
    ]); 
  }

  #[Route('/addToBibliotheque', name: 'addToBibli', methods: ['POST'])]
  public function addToBibliotheque(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $em = $doctrine->getManager();
    $jsonData = json_decode($request->getContent());
    // dd($jsonData);
    $user = $this->userRepository->findOneBy(['id' => $jsonData->userId]);
    $project = $this->projectRepository->findOneBy(['id' => $jsonData->projectId]);

    $bibliotheque = $user->getBibilotheque();
    if (!$bibliotheque) {
      $bibliotheque = new Bibilotheque();
      $bibliotheque->setUserId($user);
    }
    $projectsBibli = $bibliotheque->getProjectId();
    foreach($projectsBibli as $userProjects) {
      if ($project == $userProjects) $added = true;
      return $this->json([
        'added' => true
      ]);
    }

    $bibliotheque->addProjectId($project);

    $em->persist($bibliotheque);
    $em->flush();

    $user->setBibilotheque($bibliotheque);
    $em->persist($user);
    $em->flush();

    $added = true;

    return $this->json([
      'added' => $added
    ]); 
  }

  #[Route('/getBibliotheque', name: 'getBibliotheque', methods: ['POST'])]
  public function getBibliotheque(Request $request, ManagerRegistry $doctrine) : JsonResponse
  {
    $em = $doctrine->getManager();
    $jsonData = json_decode($request->getContent());
    // dd($jsonData);
    $user = $this->userRepository->findOneBy(['id' => $jsonData->userId]);
    $project = $this->projectRepository->findOneBy(['id' => $jsonData->projectId]);

    $bibliotheque = $user->getBibilotheque();
    if (!$bibliotheque) {
      $bibliotheque = new Bibilotheque();
    }
    $bibliotheque->setUserId($user);
    $bibliotheque->addProjectId($project);

    $em->persist($bibliotheque);
    $em->flush();

    return $this->json([
      'user' => $user,
    ]); 
  }


  #[Route('/match/porteurs', name: 'getProjects', methods: ['POST'])]
  public function getPorteurMatchs(Request $request, ManagerRegistry $doctrine, $page=1) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    if  (isset($jsonData->page)) $page = $jsonData->page;
    $qb = $this->projectRepository->createQueryBuilder('u');
    if ($jsonData->search && isset($jsonData->search->search) != null) {
      $qb = $qb->where($qb->expr()->like('u.name', ':project'))
      ->setParameter('project', '%'.$jsonData->search->search.'%');
    }
    $qb->orderBy('u.id', 'DESC');
    $project = $qb->getQuery();
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

  #[Route('/match/chercheur', name: 'getChercheurs', methods: ['POST'])]
  public function getCherheurMatchs(Request $request, ManagerRegistry $doctrine, $page=1) : JsonResponse
  {
    $jsonData = json_decode($request->getContent());
    if (isset($jsonData->page)) $page = $jsonData->page;
   $qb = $this->userRepository->createQueryBuilder('u');
   if (isset($jsonData->search)) {
    $qb = $qb->where($qb->expr()->like('u.nom', ':nom'))
          ->orWhere($qb->expr()->like('u.prenom', ':prenom'))
    ->setParameter('nom', '%'.$jsonData->search.'%')
    ->setParameter('prenom', '%'.$jsonData->search.'%');
    }
    $qb->orderBy('u.id', 'DESC');
    $user = $qb->getQuery();
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
