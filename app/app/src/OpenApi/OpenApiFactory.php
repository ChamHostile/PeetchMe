<?php
namespace App\OpenApi;

use ApiPlatform\OpenApi\Model\Operation;
use ApiPlatform\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\OpenApi\OpenApi;
use ApiPlatform\OpenApi\Model;
use ApiPlatform\OpenApi\Model\PathItem;
use ApiPlatform\OpenApi\Model\RequestBody;
use ArrayObject;

class OpenApiFactory implements OpenApiFactoryInterface
{
    private $decorated;

    public function __construct(OpenApiFactoryInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function __invoke(array $context = []): OpenApi
    {
        $openApi = $this->decorated->__invoke($context);

        /** @var PathItem $path **/
        foreach($openApi->getPaths()->getPaths() as $key => $path) {
          if ($path->getGet() && $path->getGet()->getSummary() === 'hidden') {
            $openApi->getPaths()->addPath($key, $path->withGet(null));
          }
        }

        $schemas = $openApi->getComponents()->getSecuritySchemes();

        $schemas['bearerAuth'] = new ArrayObject([
          'type' => 'http',
          'scheme' => 'bearer',
          'bearerFormat' => 'JWT'
        ]);

        $openApi->getComponents()->getSchemas();
        $schemas['Credentials'] = new ArrayObject([
          'type' => 'object',
          'properties' => [
            'username' => [
              'type' => 'string',
              'example' => 'john@doe.fr'
            ],
            'password' => [
              'type' => 'string',
              'example' => '0000'
            ]
          ]
        ]);

        $pathItem = new PathItem(
          post: new Operation(
            operationId: 'postApiLogin',
            requestBody: new RequestBody(
              content: new ArrayObject([
                'application/json' => [
                  'schema' => [
                    '$ref' => '#/components/schemas/Credentials'
                    ]
                ]
              ])
            ),
            responses: [
              '200' => [
                'description' => 'Utilisateur connecté',
                'content' => [
                  'application/json' => [
                    'schema' => [
                      '$ref' => '#/components/schemas/User-read.User'
                    ]
                  ]
                ] 
              ]
            ]
          )
        );

        $openApi->getPaths()->addPath('/api/login', $pathItem);

        return $openApi;
    }
}