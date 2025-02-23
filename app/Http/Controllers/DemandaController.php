<?php

namespace App\Http\Controllers;

use App\Http\Services\ProtheusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DemandaController extends BaseController
{
    public function __construct(readonly ProtheusService $service) {}
    
    public function index() {
        try {
            $data = $this->service->getAll();

            return $this->send($data);
        } catch (\ErrorException $e) {
            return $this->send([$e->getMessage()], false);
        }
    }

    public function show($id) {
        try {
            $data = $this->service->get($id);

            return $this->send($data);
        } catch (\Error $e) {
            return $this->send([$e->getMessage()], false);
        }
    }
    
    public function store(Request $request) {
        try {
            $input = $request->all();

            $data = $this->service->store($input);

            return $this->send([$data]);
        } catch (\Error $e) {
            return $this->send([$e->getMessage()], false);
        }
    }
    
    public function update(Request $request) {
        try {
            $data = $this->service->update($request->all());
            
            return $this->send($data);
        } catch (\Error $e) {
            return $this->send([$e->getMessage()], false);
        }
    }
    
    public function destroy($id) {
        try {
            $data = $this->service->delete($id);

            return $this->send($data);
        } catch (\Error $e) {
            return $this->send([$e->getMessage()], false);
        }
    }
}
