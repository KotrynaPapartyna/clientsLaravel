@extends('layouts.app')

@section('content')

{{--- kazkaip nenori veikti--}}

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <form method="get" action="{{route('client.createClients')}}">
                        <input class="form-control" type="text" name="clientsCount" value="{{$clientsCount}}">
                        <button class="btn btn-success" type="submit">Create</button>
                    </form>

                    <form method="get" action="{{route('client.createClients')}}">
                        <input type="text" name="clientsCount" value="{{$clientsCount}}" hidden>
                        <button class="btn btn-primary" type="submit" name="clientAdd" value="plus">+</button>
                        <button class="btn btn-danger" type="submit" name="clientAdd" value="minus">-</button>
                    </form>
                    <div class="card-header">{{ __('CREATE CLIENTS') }}</div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('client.storeClients') }}" >
                            @csrf

                            {{--ciklo pradzia--}}
                            @for ($i=0; $i<$clientsCount; $i++ )

                                 {{--kliento vardas--}}
                                <div class="form-group row">
                                    <label for="clientName" class="col-md-4 col-form-label text-md-right">{{ __('CLIENTS NAME') }}</label>
                                    <div class="col-md-6">
                                        <input id="clientName" type="text" class="form-control" name="clientName[]" autofocus>
                                        @error("clientSurname.".$i.".surname")
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                {{--kliento pavarde--}}
                                <div class="form-group row">
                                    <label for="clientSurname" class="col-md-4 col-form-label text-md-right">{{ __('CLIENT SURNAME') }}</label>
                                    <div class="col-md-6">
                                        <input id="clientSurname" type="text" class="form-control" name="clientSurname[]" autofocus>
                                        @error("clientName.".$i.".name")
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>

                                 {{--kliento aprasymas--}}
                                <div class="form-group row">
                                    <label for="clientDescription" class="col-md-4 col-form-label text-md-right">{{ __('DESCRIPTION ABOUT CLIENT') }}</label>
                                    <div class="col-md-6">
                                        <textarea  class="form-control" cols="5" rows="5" name="clientDescription[]"> </textarea>
                                        @error("clientDescription.".$i.".description")
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            @endfor
                        {{--ciklo pabaiga--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('SAVE') }}
                                    </button>
                                </form>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection




