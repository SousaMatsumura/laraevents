<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>
<body>
    <h1 class="text-center my-4">Criar conta</h1>

    <div class="card shadow my-5 w-75 mx-auto">
        <div class="card-body">
            <form action="{{ route('auth.register.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input
                                type="text"
                                name="user[name]"
                                class="form-control {{$errors->has('user.name') ? 'is-invalid' : '' }}"
                                placeholder="Nome"
                                value="{{ old('user.name') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('user.name')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <input
                                type="email"
                                name="user[email]"
                                class="form-control {{$errors->has('user.email') ? 'is-invalid' : '' }}"
                                placeholder="E-mail"
                                value="{{ old('user.email') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('user.email')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">     
                            <input
                                type="text"
                                name="user[cpf]"
                                class="form-control cpf {{$errors->has('user.cpf') ? 'is-invalid' : '' }}"
                                placeholder="CPF"
                                value="{{ old('user.cpf') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('user.cpf')}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">  
                        <div class="form-group">     
                            <input
                                type="password"
                                name="user[password]"
                                class="form-control {{$errors->has('user.password') ? 'is-invalid' : '' }}"
                                placeholder="Senha"
                            >
                            <div class="invalid-feedback">{{$errors->first('user.password')}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">  
                        <div class="form-group">     
                            <input
                                type="password"
                                name="user[password_confirmation]"
                                class="form-control"
                                placeholder="Confirmar Senha"
                            >
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[cep]"
                                id="cep"
                                class="form-control cep {{$errors->has('address.cep') ? 'is-invalid' : '' }}"
                                placeholder="CEP"
                                value="{{ old('address.cep') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('address.cep')}}</div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[uf]"
                                id="uf"
                                class="form-control uf {{$errors->has('address.uf') ? 'is-invalid' : '' }}"
                                placeholder="UF"
                                value="{{ old('address.uf') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('address.uf')}}</div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[city]"
                                id="city"
                                class="form-control {{$errors->has('address.city') ? 'is-invalid' : '' }}"
                                placeholder="Cidade"
                                value="{{ old('address.city') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('address.city')}}</div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[street]"
                                id="street"
                                class="form-control {{$errors->has('address.street') ? 'is-invalid' : '' }}"
                                placeholder="Logradouro"
                                value="{{ old('address.street') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('address.street')}}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[number]"
                                id="number"
                                class="form-control {{$errors->has('address.number') ? 'is-invalid' : '' }}"
                                placeholder="Número"
                                value="{{ old('address.number') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('address.number')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[district]"
                                id="district"
                                class="form-control {{$errors->has('address.district') ? 'is-invalid' : '' }}"
                                placeholder="Bairro"
                                value="{{ old('address.district') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('address.district')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="text"
                                name="address[complement]"
                                class="form-control {{$errors->has('address.complement') ? 'is-invalid' : '' }}"
                                placeholder="Complemento"
                                value="{{ old('address.complement') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('address.complement')}}</div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row mt-4">
                    <div class="col-md-6">  
                        <div class="form-group">     
                            <input
                                type="text"
                                name="phones[0][number]"
                                class="form-control phone {{$errors->has('phones.0.number') ? 'is-invalid' : '' }}"
                                placeholder="Telefone"
                                value="{{ old('phones.0.number') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('phones.0.number')}}</div>
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">     
                            <input
                                type="text"
                                name="phones[1][number]"
                                class="form-control cellphone {{$errors->has('phones.1.number') ? 'is-invalid' : '' }}"
                                placeholder="Celular"
                                value="{{ old('phones.1.number') }}"
                            >
                            <div class="invalid-feedback">{{$errors->first('phones.1.number')}}</div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-3">
                    Criar conta
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/auth/register.js') }}"></script>

</body>
</html>