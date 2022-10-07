<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lead\LeadNewsletterRequest;
use App\Http\Resources\Lead\LeadNewsletterResource;
use App\Models\Cake;
use App\Models\Lead;

class LeadController extends Controller
{
    public function newsletter(LeadNewsletterRequest $request)
    {
        $lead = Lead::updateOrCreate($request->validated(), $request->validated());
        $idsCakesWithPositeStock = Cake::whereHas("stock", function ($stock) {
            $stock->where("amount", ">", 0);
        })->pluck("id");
        $lead->cakesILike()->sync($idsCakesWithPositeStock, true);
        return new LeadNewsletterResource($lead);
    }
}
