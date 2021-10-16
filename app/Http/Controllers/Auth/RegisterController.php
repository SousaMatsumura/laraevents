<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{User, Address};
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        $requestData = $request->validated();
        $requestData['user']['role'] = 'participant';

        DB::beginTransaction();
        try{
            $user = User::create($requestData['user']);            
            $user->address()->create($requestData['address']);

            foreach($requestData['phones'] as $phone){
                $user->phones()->create($phone);
            }

            DB::commit();

            return "Conta criada com sucesso!";

        }catch(\Exception $exception){
            DB::rollBack();
            return "Mensagem: " . $exception->getMessage();
        };
    }
}
