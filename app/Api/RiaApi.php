<?php


namespace App\Api;

use Illuminate\Support\Facades\Http;

class RiaApi
{
    public $riaKey;

    public function __construct()
    {
        $this->riaKey = env('API_RIA_KEY');
    }

    public function getBrand()
    {
        $brands = Http::get('https://developers.ria.com/auto/categories/1/marks?api_key=' . $this->riaKey);

        return $brands->json();
    }

    public function getModels($idBrand)
    {
        $models = Http::get('https://developers.ria.com/auto/categories/1/marks/' . $idBrand . '/models?api_key=' . $this->riaKey);

        return $models->json();
    }

}
