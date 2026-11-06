<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::all());
    }

    public function store(CustomerStoreRequest $request)
    {
        $customer = Customer::create($request->validated());
        return CustomerResource::make($customer);
    }

    public function show(Customer $customer)
    {
        return CustomerResource::make($customer);
    }

    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return CustomerResource::make($customer);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(["message" => "deleted "]);
    }
}
