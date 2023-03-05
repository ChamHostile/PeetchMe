<?php

namespace App\Controller;

use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\Model\PathItem;
use ApiPlatform\OpenApi\Model\RequestBody;
use ApiPlatform\OpenApi\OpenApi;
use ArrayObject;
use ApiPlatform\OpenApi\Model\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;

class MeController extends AbstractController
{

  public function __construct(private Security $security)
  {
        
  }

  public function __invoke()
  {
    
    $user = $this->security->getUser();
    return $user;
    
  }

}

?>