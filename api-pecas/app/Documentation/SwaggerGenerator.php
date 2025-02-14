<?php

namespace App\Documentation;

use Exception;

class SwaggerGenerator
{
    private array $documentationClass = [];

    public function registerDocumentationClass(SwaggerBase $documentation): void
    {
        $this->documentationClass[] = $documentation;
    }

    public function generationOpenApiArray(): array
    {
        if (empty($this->documentationClass)) {
            throw new Exception('Nenhuma classe de documentação foi registrada');
        }

        $baseClassInstance = $this->documentationClass[0];

        $openApiDocument = $baseClassInstance->toArray();

        $openApiDocument['paths'] = [];

        foreach ($this->documentationClass as $documentationClass) {
            $paths = $documentationClass->getPaths();
            $openApiDocument['paths'] = array_merge($openApiDocument['paths'], $paths);
        }

        return $openApiDocument;
    }

    public function generateOpenApiJson(): string
    {
        $openApiArray = $this->generationOpenApiArray();
        $jsonContent = json_encode($openApiArray, JSON_PRETTY_PRINT);
        $filePath = storage_path('app/public/api-docs.json');

        file_put_contents($filePath, $jsonContent);
        return $jsonContent;
    }
}