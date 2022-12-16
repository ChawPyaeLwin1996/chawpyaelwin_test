<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function index()
    {
        $data = Clients::orderBy('id','desc')->paginate(10)->setPath('clients');
        return view('clients.index',compact(['data']));
    }

    public function store(Request $request)
    {
        $request->validate([
         'name' => 'required'        
        ]);

        Clients::create($request->all());
        return redirect()->back()->with('success','Create Successfully');
    }

    public function getClient($id)
    {
       $data =  Clients::find($id);
       return view('admin.contacts.show',compact(['data']));
    }

    public function update(Request $request)
    {
        $request->validate([
         'name' => 'required'        
        ]);

        Clients::where('id',$request->id)->update($request->all());
        return redirect()->back()->with('success','Update Successfully');
        
    }

    public function delete($id)
    {
        Clients::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }

}