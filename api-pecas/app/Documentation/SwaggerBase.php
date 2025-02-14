<?php

namespace App\Documentation;

abstract class SwaggerBase
{
    protected string $openApiVersion = '3.0.0';
    protected array $info = [
        'title' => 'API SEGMEC',
        'version' => '1.0.0',
        'description' => 'TO DO ...'
    ];

    public string $basePath;
    protected string $pathPrefix = '/api';

    public function __construct()
    {
        $this->basePath = getenv('APP_URL');
    }

    abstract public function getPaths(): array;

    abstract public function componentsSchemas(): array;

    public function toSecuritySchemes(): array
    {
        return [
            'TokenAuth' => [
                'type' => 'apiKey',
                'in' => 'header',
                'name' => 'Authorization',
                'description' => 'Insira seu token no formato: ' . getenv('SECRET_TOKEN_SISTEMAS_PUBLICOS')
            ]
        ];
    }

    public function toArray(): array
    {
        $paths = array_map(function ($path, $key) {
            $prefixKey = $this->pathPrefix . $key;
            return [$prefixKey => $path];
        }, $this->getPaths(), array_keys($this->getPaths()));

        $componentSchemas = $this->getComponentSchemas();

        return [
            'openapi' => $this->openApiVersion,
            'info' => $this->info,
            'servers' => [
                ['url' => $this->basePath . $this->pathPrefix]
            ],
            'paths' => array_reduce($paths, 'array_merge', []),
            'components' => [
                'schemas' => $componentSchemas,
                'securitySchemes' => $this->toSecuritySchemes()
            ],
            'security' => [
                ['TokenAuth' => []]
            ]
        ];
    }

    public function getComponentSchemas(): array
    {
        return $this->componentsSchemas();
    }

    public function responses(int $codeResponse): array
    {
        $response = [
            200 => 'Retorno de um processamento com sucesso',
            201 => 'Retorno de um processamento de cadastro',
            204 => 'Retorno de um processamento de exclusão',
            400 => 'Retorno de uma falha no servidor',
            401 => 'Retorno de autorização',
            404 => 'Retorno de recurso não encontrado',
            405 => 'Retorno de método não suportado',
            412 => 'Retorno de uma condição de falha',
            422 => 'Retorno de erro negocial',
            500 => 'Retorno de erro interno',
        ];

        return [(string)$codeResponse => ['description' => $response[$codeResponse] ?? 'Código de status HTTP não reconhecido']];
    }

    public function tagsSummaryDescription(string $tags, string $summary, string $description): array
    {
        return [
            'tags' => [$tags],
            'summary' => $summary,
            'description' => $description
        ];
    }

    public function responseContent(string $urlComponents)
    {
        return [
            'content' => [
                'application/json' => [
                    'schema' => [
                        'type' => 'array',
                        'items' => [
                            '$ref' => $urlComponents
                        ]
                    ]
                ]
            ]
        ];
    }
}