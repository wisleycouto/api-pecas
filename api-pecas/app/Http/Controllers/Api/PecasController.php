<?php

namespace App\Http\Controllers\Api;

use App\Models\Pecas;
use App\Http\Requests\PecasRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\PecasService; 

class PecasController extends Controller
{
    protected $pecasService;

    public function __construct(PecasService $pecasService)
    {
        $this->pecasService = $pecasService;
    }


    public function cadastrarPeca(Request $request)
    {
        try {
            $peca = $this->pecasService->cadastrarPeca($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Peça cadastrada com sucesso!!!',
                'data' => $peca
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => utf8_encode($e->getMessage())
            ], $e->getCode() ?: 400);
        }
    }


         public function consultarPeca($co_peca)
         {
             $peca = Pecas::find($co_peca);
             if ($peca) {
                 return response()->json($peca);
             } else {
                 return response()->json(['message' => 'Peça não encontrada'], 404);
             }
         }


         public function atualizaPeca(Request $request, $co_peca)
         {
             try {
                 $peca = $this->pecasService->atualizaPeca($request->all(), $co_peca);
     
                 return response()->json([
                     'success' => true,
                     'message' => 'Peça Atualizada com sucesso!',
                     'data' => $peca
                 ]);
             } catch (\Exception $e) {
                 return response()->json([
                     'success' => false,
                     'error' => utf8_encode($e->getMessage())
                 ], $e->getCode() ?: 400);
             }
         }     

         
    public function deletaPeca($co_peca)
    {
            $peca = Pecas::find($co_peca);
            if ($peca) {
                $peca->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Peça deletada com sucesso!!!'
                ]);
            } else {
                return response()->json(['message' => 'Peça não encontrada'], 404);
            }
  
    }

 }










        










        




 