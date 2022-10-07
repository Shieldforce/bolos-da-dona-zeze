<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Events\Cake\CakeStockEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cake\AddStockCakeRequest;
use App\Http\Requests\Cake\RemoveStockCakeRequest;
use App\Http\Requests\Cake\StoreCakeRequest;
use App\Http\Requests\Cake\UpdateCakeRequest;
use App\Http\Resources\Cake\CakeResource;
use App\Models\Cake;
use Illuminate\Support\Facades\DB;

class CakeController extends Controller
{

    public function index()
    {
        return CakeResource::collection(Cake::paginate(10));
    }

    public function store(StoreCakeRequest $request)
    {
        $create = DB::transaction(function () use ($request) {

            $create = Cake::create($request->validated());

            event(new CakeStockEvent($request, $create));

            return $create;

        });

        return new CakeResource($create);
    }

    public function show(Cake $cake)
    {
        return new CakeResource($cake);
    }

    public function update(UpdateCakeRequest $request, Cake $cake)
    {
        $cake->update($request->validated());

        event(new CakeStockEvent($request, $cake));

        return new CakeResource($cake);
    }

    public function destroy($id)
    {
        return Cake::destroy($id);
    }

    public function addStock(AddStockCakeRequest $request, Cake $cake)
    {
        $stock = $cake->stock->first();
        $stock->update(["amount" => ($stock->amount + $request->amount) ]);
        return new CakeResource($cake);
    }

    public function removeStock(RemoveStockCakeRequest $request, Cake $cake)
    {
        $stock = $cake->stock->first();
        $stock->update(["amount" => ($stock->amount - $request->amount) ]);
        return new CakeResource($cake);
    }
}
