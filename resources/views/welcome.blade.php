@extends('layouts.app')

@section('content')

<style>


</style>
    <div class="container">
        <div class="row ">
            <div class="col-md-12 card_login">
                <div class="card">
                    <div class="card-body ">
                        <div class="row">
                        <div class="col-md-6">
                            <form method="get" action="{{ route('home') }}">
                                @csrf


                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Funcionario') }}</label>

                                    <div class="col-md-6">
                           <select class="form-control" name="funcionario">
                            <option value="">Selecionar</option>
                            @foreach($funcionarios as $funcionario)
                                <option value="{{$funcionario->nome}}">{{$funcionario->nome}}</option>
                            @endforeach
                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('Avançar') }}
                                        </button>


                                    </div>
                                </div>
                            </form>
                        </div>
                         <div class="col-md-6 logo_login">

                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6 logo m-3">
                                    <img src="{{ asset('assets/img/ci.png') }}" class="w-100 imglogo" />
                                    <p class="text-center mt-2">Ci Online</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
