<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Customer\StoreCustomerRequest;
use App\Http\Requests\Admin\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->all());
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
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
