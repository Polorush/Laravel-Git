<?php
namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    public function delete(Request $request, $id) {
        $comments = Comment::find($id);
        $comments->body = $request->body;
        $comments->delete();
        return redirect()->route('users.index', [$comments->id])->with('success', 'Commentaire supprimé');
    }
}