<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiOdooController extends Controller
{
    public function getProducts(Request $request)
    {
        $url = 'https://guzman.odooultimatetics.cloud/jsonrpc';

        $payload = [
            "jsonrpc" => "2.0",
            "method" => "call",
            "params" => [
                "service" => "object",
                "method" => "execute_kw",
                "args" => [
                    "guzmandb",
                    2,
                    "6bfa26493033f90476e304cf2ebc0796578b2747",
                    "product.product",
                    "search_read",
                    [],
                    [
                        "fields" => [
                            "name",
                            "default_code",
                            "lst_price",
                            "type",
                            "categ_id",
                            "qty_available"
                        ],
                        "limit" => 10
                    ]
                ]
            ],
            "id" => 2
        ];

        try {
            $response = Http::post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['result'])) {
                    return response()->json($data['result']); // ✅ Solo productos
                } else {
                    return response()->json([
                        'error' => 'Respuesta de Odoo malformada',
                        'data' => $data
                    ], 500);
                }
            } else {
                return response()->json([
                    'error' => 'Odoo no respondió correctamente.',
                    'status' => $response->status()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error de conexión con Odoo',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
