<?php

namespace App\Http\Controllers;

use App\Api\BitrixApi;
use App\Api\RiaApi;
use App\Http\Requests\CarsRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
   public $ria;
   public $bitrix;

   public function __construct(BitrixApi $bitrixApi, RiaApi $riaApi)
   {
       $this->ria = $riaApi;
       $this->bitrix = $bitrixApi;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->ria->getBrand();

        return view('editCar', compact('brands'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsRequest $carsRequest)
    {
        $this->bitrix->send($carsRequest->input());
        (new Car())->create($carsRequest->input());

        return redirect()->route('cars.index')->with('success', 'Data saved');

    }


    public function getModels(Request $request)
    {
        $data = $request->input();
        $id = $data['id'];

        return $this->ria->getModels($id);
    }
}
