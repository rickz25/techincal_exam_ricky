<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    //
    public function index()
    {
        $providers = Provider::all();

        // foreach($provider as $pro){
        //     echo "<pre>"; print_r($pro->provider_name); "</pre>"; 
        // }
        // die;
        return view('provider.index')->with([
            'providers' => $providers
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'provider_name' => 'required',
            'url' => 'required'
        ]);
        Provider::create($request->all());
        return redirect()->route('index')->with('success', 'Provider created!');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'provider_name' => 'required',
            'url' => 'required'
        ]);
        $provider = Provider::find($id);
        $provider->update($request->all());
        return redirect()->route('index')->with('success', 'Provider updated!');
    }

    public function destroy($id)
    {
        $provider = Provider::find($id);
        $provider->delete();
        return redirect()->route('index')->with('success', 'Provider is deleted!');
    }

    public function getImageURL(Request $request)
    {
        $model = new Provider;
        try {
            $data = $model->getURL($request->input('id'));
            $jsonData = ['message' => $data->url, 'status' => 'success'];
        } catch (\Exception $e) {
            //  $e->getMessage();
            $jsonData = ['message' => 'Error getting url', 'status' => 'error'];
        }
        echo json_encode($jsonData);
    }
}