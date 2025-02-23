<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected function send(array $data, bool $success = true) {
        if ($success) {
            return $this->sendResponse($data, 'Operação realizada com sucesso!');
        }

        return $this->sendResponse($data, 'Erro ao realizar operação!', 500);
    }

    private function sendResponse(array $data, string $message, int $status = 200) {
        $data = [
            'data' => $data,
            'message' => $message
        ];

        return response()->json($data, $status);
    }
}
