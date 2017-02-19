<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Form;
class FormsController extends Controller
{
    public function create()
    {
        return view('form.contact');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ],
            [
                'content.required' => 'Content obligatoire'
            ]);
        Form::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        return redirect::route('contact')
            ->with('success', 'Formulaire envoyé');
    }
}