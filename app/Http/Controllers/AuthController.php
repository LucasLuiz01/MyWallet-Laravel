<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function cadastro(Request $request){
        $regras =[
            'email' => 'required|email|min:3|unique:users',
            'password' =>  'required|min:3',
            'confirmPassword' => 'required|same:password'
        ];

        $feedback = [
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Digite um email válido.',
            'email.unique' => 'Este email já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 3 caracteres.',
            'confirmPassword.required' => 'O campo confirmar senha é obrigatório.',
            'confirmPassword.same' => 'A senha e a confirmação de senha devem ser iguais.',
        ];
        $request->validate($regras, $feedback);
        $user = new User();
        $user->email = $request->input('email');
        $hashPassword = Hash::make($request->input('password'));
        $user->password = $hashPassword;
        $user->save();
        return redirect()->route('app.login');
    }
    public function getcadastro(){
        return view('cadastro');
    }
    public function login(Request $request){
        $regras =[
            'email' => 'required|email|min:3|exists:users',
            'password' =>  'required|min:3',
        ];

        $feedback = [
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Digite um email válido.',
            'email.exists' => 'Este email é invalido.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 3 caracteres.',
        ];
        $request->validate($regras, $feedback);

        $credencias = $request->only('email', 'password');
        if(Auth::attempt($credencias)){
            return redirect()->route('app.menu');
        }else{
            return back()->withErrors(['password' => 'credenciais inválidas'])->withInput();
        }
    }
    public function getlogin(){
        return view('login');
    }
    
}
