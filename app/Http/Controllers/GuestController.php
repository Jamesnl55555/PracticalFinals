<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Note;

class GuestController extends Controller
{

    public function land(){
        return view('landpage');        
    }

    public function loginpage(){
        return view('loginpage');
    }
    public function regpage(){
        return view('registerpage');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
       
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('dashboard')->with([
                'success' => 'Login successful',
                'user' => $user,
            ]);
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
        }
    }
    
    public function register(Request $request){
        $validated = $request->validate([
            'uname' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'cpassword' => 'required'
        ]);
        
        if (User::where('email', $validated['email'])->exists()){
            return back()->withErrors(['email' => 'Email account is already made in this site']);
        }
        if ($validated['password'] != $validated['cpassword']){
            return back()->withErrors(['password' => 'Confirmed Password Incorrect']);
        }
       
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Registration successful.', ['user' => $user]);
    }

    public function dashboard(){
            $user = User::find(Auth::id());
            $notes = $user->notes()->get();
            return view('dashboard', ['user' => $user, 'notes' => $notes]);
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('land')->with('success', 'Logged out successfully');
    }

    public function createNote(){
        $user = User::find(Auth::id());
        $notes = $user->notes()->get();

        return view('createnote', ['user' => $user, 'notes' => $notes]);
    }
    public function storeNote(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        
        $note = new Note();
        $note->title = $validated['title'];
        $note->body = $validated['body'];
        $note->user_id = Auth::id();
        $note->save();
        
        return redirect()->route('dashboard')->with('success', 'Note created successfully');
    }   
    public function deleteNote($id){
        $note = Note::find($id);
        if ($note && $note->user_id == Auth::id()) {
            $note->delete();
            return redirect()->route('dashboard')->with('success', 'Note deleted successfully');
        }
        return redirect()->route('dashboard')->withErrors(['delete' => 'Note not found or unauthorized']);
    }
    public function editNote($id){
        
        $user = User::find(Auth::id());
        $notes = $user->notes()->get();
        $note = Note::find($id);
        if ($note && $note->user_id == Auth::id()) {
            return view('editnote', ['note' => $note, 'user' => $user, 'notes' => $notes]);
        }
        return redirect()->route('dashboard')->withErrors(['edit' => 'Note not found or unauthorized']);
    }
    public function updateNote(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        
        $note = Note::find($id);
        if ($note && $note->user_id == Auth::id()) {
            $note->title = $validated['title'];
            $note->body = $validated['body'];
            $note->save();
            return redirect()->route('dashboard')->with('success', 'Note updated successfully');
        }
        return redirect()->route('dashboard')->withErrors(['update' => 'Note not found or unauthorized']);
    }

    public function viewNote($id){
        $note = Note::find($id);
        $user = User::find(Auth::id());
        $notes = $user->notes()->get();
        if ($note && $note->user_id == Auth::id()) {
            return view('viewnote', ['note' => $note, 'user' => $user, 'notes' => $notes]);
        }
        return redirect()->route('dashboard')->withErrors(['view' => 'Note not found or unauthorized']);
    }
    
      
}   
