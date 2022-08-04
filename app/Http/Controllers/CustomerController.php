<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Customer\StoreCustomerRequest;
use App\Http\Requests\Admin\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->all());
        return redirect()->route('customers.index');
    }

    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back();
    }

    public function search(Request $request)
    {
        $token = config('services.apisunat.token');
        $baseurl = config('services.apisunat.baseurl');
        $urldni = config('services.apisunat.urldni');
        $urlruc = config('services.apisunat.urlruc');

        if ($request->ajax()) {
            $numero = $request->document_number;
            $client = new Client(['base_uri' => $baseurl, 'verify' => false]);

            if ($request->document_type == 'DNI') {
                $parameters = [
                    'http_errors' => false,
                    'connect_timeout' => 5,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token,
                        'Referer' => $urldni,
                        'User-Agent' => 'laravel/guzzle',
                        'Accept' => 'application/json',
                    ],
                    'query' => ['numero' => $numero]
                ];
                $res = $client->request('GET', '/v1/dni', $parameters);
            } else if ($request->document_type == 'RUC') {
                $parameters = [
                    'http_errors' => false,
                    'connect_timeout' => 5,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token,
                        'Referer' => $urlruc,
                        'User-Agent' => 'laravel/guzzle',
                        'Accept' => 'application/json',
                    ],
                    'query' => ['numero' => $numero]
                ];
                $res = $client->request('GET', '/v1/ruc', $parameters);
            }
            
            $datos = json_decode($res->getBody()->getContents(), true);
            return response()->json($datos);
        }
    }
}
