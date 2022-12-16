<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{

    public function index()
    {
        $data = Clients::orderBy('id','desc')->paginate(10)->setPath('billing');
        return view('billing.index',compact(['data']));
    }

    public function store(Request $request)
    {
        $request->validate([
         'amount' => 'required'        
        ]);

        Billing::create($request->all());
        return redirect()->back()->with('success','Create Successfully');
    }

    public function getBilling($id)
    {
       $data =  Billing::find($id);
       return view('admin.contacts.show',compact(['data']));
    }

    public function update(Request $request)
    {
        $request->validate([
         'amount' => 'required'        
        ]);

        Billing::where('id',$request->id)->update($request->all());
        return redirect()->back()->with('success','Update Successfully');
        
    }

    public function delete($id)
    {
        Billing::where('id',$id)->delete();
        return redirect()->back()->with('success','Delete Successfully');
    }

}