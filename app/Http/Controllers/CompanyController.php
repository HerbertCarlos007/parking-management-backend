<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

class CompanyController extends Controller
{
    public function store(StoreUpdateCompanyRequest $request)
    {
        $validated = $request->validated();
        $company = Company::create($validated);
        return new CompanyResource($company);
    }

    public function index($idCompany)
    {
        $companies = Company::where('id', $idCompany)->get();
        return CompanyResource::collection($companies);
    }

}
