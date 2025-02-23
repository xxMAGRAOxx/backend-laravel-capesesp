<?php

namespace App\Http\Services;

use Error;
use Illuminate\Support\Facades\Http;

class ProtheusService {
    private string $url;
    private string $user;
    private string $pass;

    public function __construct() {
        $this->url = env('PROTHEUS_URL');
        $this->user = env('PROTHEUS_USER');
        $this->pass = env('PROTHEUS_PASS');
        
    }

    public function getAll(): array {
        $data = Http::withBasicAuth($this->user, $this->pass)->get($this->url . '?TIPO=2')->json();

        return $data;
    }

    public function get($id): array {
        $data = Http::withBasicAuth($this->user, $this->pass)->get($this->url . "?TIPO=1&INFO=$id")->json();

        return $data;
    }

    public function store(array $input): array {
        $data = Http::withBasicAuth($this->user, $this->pass)->post($this->url, $input);

        if ($data->status() !== 201) {
            throw new Error();
        }

        return [];
    }

    public function update(array $input): array {
        $data = Http::withBasicAuth($this->user, $this->pass)->put($this->url, $input);

        if ($data->status() !== 200) {
            throw new Error();
        }

        return [];
    }

    public function delete($id): array {
        $data = Http::withBasicAuth($this->user, $this->pass)->delete($this->url, ['codigo' => $id]);

        if ($data->status() !== 200) {
            throw new Error();
        }

        return [];
    }
}
