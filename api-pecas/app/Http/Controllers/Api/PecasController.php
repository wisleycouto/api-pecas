<?php

namespace App\Http\Controllers\Api;

use App\Models\Pecas;
use App\Http\Requests\PecasRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\PecasService; // Certifique-se de importar o serviço

class PecasController extends Controller
{
    protected $pecasService;

    public function __construct(PecasService $pecasService)
    {
        //dd($pecasService);die;
        $this->pecasService = $pecasService;
    }

    public function consultarPecas(PecasRequest $request)
    {
        try {
            dd($request);die;
            $data = $this->pecasService->consultarPecas($request);
            
            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => utf8_encode($e->getMessage())
            ], $e->getCode());
        }
    }

    public function show($id)
    {
        $query = Pecas::query();
        $query->where('co_pecas', $id);
        
        return $query->paginate(1);
    }
}