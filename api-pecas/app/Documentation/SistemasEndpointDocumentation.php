<?php

namespace App\Documentation;

use App\Documentation\SwaggerBase;

class SistemasEndpointDocumentation extends SwaggerBase
{

    public function getPaths(): array
    {
        return [
            '/sistemas' => [
                'get' => [
                    ...$this->tagsSummaryDescription(
                        'sistemas',
                        'Lista sistemas cadastrados no Olinda',
                        'Lista tods os sistemas cadastrados no Olinda'
                    ),
                    'parameters' => [],
                    'responses' => [
                            '200' => [
                                'description' => $this->responses(200)['200']['description'],
                                ...$this->responseContent('#/components/schemas/Sistemas')
                            ],
                        ]
                        + $this->responses(400)
                        + $this->responses(404)
                        + $this->responses(500)
                ],
            ],
        ];
    }

    public function componentsSchemas(): array
    {
        return [
            'Sistemas' => [
                'type' => 'object',
                'properties' => [
                    'CodigoSistema' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'exemple' => 2313
                    ],
                    'SiglaSistema' => [
                        'type' => 'string',
                        'exemple' => 'Acesso Único',
                    ],
                    'DescricaoSistema' => [
                        'type' => 'string',
                        'exemple' => 'Portal de Acesso Único, internalizado ....'
                    ],
                    'SisRelacionado' => [
                        'type' => 'string',
                        'exemple' => 'SISU-Gestao'
                    ],
                    'SiglaArea' => [
                        'type' => 'string',
                        'exemple' => 'SESU'
                    ],
                    'DescrSituacai' => [
                        'type' => 'string',
                        'exemple' => 'ATIVO'
                    ],
                    'Gerente' => [
                        'type' => 'string',
                        'exemple' => 'Nome do Gerente'
                    ],
                    'Portal' => [
                        'type' => 'string',
                        'exemple' => '0'
                    ],
                    'Logo' => [
                        'type' => 'string',
                        'exemple' => 'url do arquivo de Logo'
                    ],
                    'Url' => [
                        'type' => 'string',
                        'exemple' => 'http:\/\/acessounico.prd.mec.gov.br\/'
                    ],
                    'Status' => [
                        'type' => 'string',
                        'exemple' => 'ATIVO'
                    ]
                ]
            ],
            'xml' => [
                'name' => 'sistemas'
            ]
        ];
    }
}