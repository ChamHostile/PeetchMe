<?php

namespace App\Controller;

use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\Model\PathItem;
use ApiPlatform\OpenApi\Model\RequestBody;
use ApiPlatform\OpenApi\OpenApi;
use ArrayObject;
use Symfony\Bundle\SecurityBundle\Security;
use ApiPlatform\OpenApi\Model\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MeController extends AbstractController
{

  public function __construct(private OpenApiFactoryInterface $decorated)
  {
        
  }

  public function __invoke(array $context = []): OpenApi
  {
    
    
        
  }

}

?>