<?php

namespace App\Http\Controllers;

use App\Models\Navget;
use Illuminate\Http\Request;

class NavgetController extends Controller
{
    public function index()
    {
        $emp = Navget::all();
        return view("navget.index", compact('emp'));
    }

    public function create()
    {
        return view("navget.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'empName' => "required|string|min:3|max:20|unique:navgets,name",
            'empSalary' => "required|numeric"
        ]);

        $emp = new Navget();
        $emp->name = $request->input('empName');
        $emp->salary = $request->input('empSalary');
        $emp->save();
        return redirect('/emp')->with("done", "Add Navget Done");
    }
    public function show($id)
    {
        $emp = Navget::find($id);
        return view("navget.layout.show")->with("emp", $emp);
    }


    public function edit($id)
    {
        $emp = Navget::find($id);
        return view("navget.layout.edit")->with("emp", $emp);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'empName' => "required|string|min:3|max:20|unique:emp,name,$id",
            'empSalary' => "required|numeric"
        ]);

        $emp = Navget::find($id);
        $emp->name = $request->input('empName');
        $emp->salary = $request->input('empSalary');
        $emp->save();
        return redirect('/emp')->with("done", "Update Navget Done");
    }

    public function destroy($id)
    {
        $emp = Navget::find($id);
        $emp->delete();
        return redirect('/emp')->with("done", "Delete Navget Done");
    }
}
