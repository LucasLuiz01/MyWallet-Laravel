<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class MenuController extends Controller
{
    public function getMenu(){
        if(Auth::check()){
            //Dados do usuario
            $user = Auth::user();

            $walletData = Wallet::where('user_id', $user->id)->get();
            $saldo = 0;
            foreach($walletData as $data){
                $saldo += $data->entrada ? $data->valor : -$data->valor;
            }
            return view('menu', ['walletData' => $walletData, 'saldo' =>$saldo, 'user' => $user]);
        }else{
            return redirect()->route('app.login');
        }
    }

    public function getEntrada($id){
       $walletData = Wallet::where('id', $id)->get();
        return view('entrada', ['walletData' => $walletData]);
    }
    public function getSaida($id){
        $walletData = Wallet::where('id', $id)->get();
        return view('saida', ['walletData' => $walletData]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('app.login');
    }
    public function wallet(Request $request) {
        $user = Auth::user();
        $currentDate = date('Y-m-d');
        $entrada = ($request->input('entrada') === 'true') ? true : false;
        $wallet = new Wallet();
        $wallet->description =$request->input('description');
        $wallet->valor =$request->input('value');
        $wallet->user_id =$user->id;
        $wallet->entrada =$entrada;
        $wallet->data = $currentDate;
        $wallet->save();
        return redirect()->route('app.menu');

    }
    public function delete($id) {
        $user = Auth::user();
        Wallet::findOrFail($id)->delete();
        $walletData = Wallet::where('user_id', $user->id)->get();
        $saldo = 0;
        foreach($walletData as $data){
            $saldo += $data->entrada ? $data->valor : -$data->valor;
        }
        return redirect()->route('app.menu',['walletData' => $walletData, 'saldo' =>$saldo, 'user' => $user]);
    }
    public function edit(Request $request, $id) {
        $user = Auth::user();
        $wallet = Wallet::where('id', $id)->first();
        $wallet->description =$request->input('description');
        $wallet->valor =$request->input('value');
        $wallet->save();
        $walletData = Wallet::where('user_id', $user->id)->get();
        $saldo = 0;
        foreach($walletData as $data){
            $saldo += $data->entrada ? $data->valor : -$data->valor;
        }
        return redirect()->route('app.menu',['walletData' => $walletData, 'saldo' =>$saldo, 'user' => $user]);
    }
}
