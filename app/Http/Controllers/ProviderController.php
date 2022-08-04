<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Requests\Admin\Provider\StoreProviderRequest;
use App\Http\Requests\Admin\Provider\UpdateProviderRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::get();
        return view('admin.providers.index', compact('providers'));
    }

    public function create()
    {
        return view('admin.providers.create');
    }

    public function store(StoreProviderRequest $request)
    {
        Provider::create($request->all());
        return redirect()->route('providers.index');
    }

    public function show(Provider $provider)
    {
        return view('admin.providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', compact('provider'));
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $provider->update($request->all());
        return redirect()->route('providers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        //
    }

    public function search_ruc(Request $request)
    {
        $token = config('services.apisunat.token');
        $baseurl = config('services.apisunat.baseurl');
        $urlruc = config('services.apisunat.urlruc');

        if ($request->ajax()) {
            $numero = $request->ruc;
            
            $client = new Client(['base_uri' => $baseurl, 'verify' => false]);
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
            $datos = json_decode($res->getBody()->getContents(), true);
            return response()->json($datos);
        }
    }
}
