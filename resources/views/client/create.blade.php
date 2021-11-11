@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

    <div class="card-header">{{ __('CREATE CLIENT') }}</div>

        {{--klaidos pranesimai- dar reikia sutvarkyti
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
        @endif--}}

        <div class="card-body">
            <form method="post" action="{{route("client.store")}}" >
                @csrf

                 {{--kliento vardas--}}
                <div class="form-group row">
                    <label for="clientName" class="col-md-4 col-form-label text-md-right">{{ __('CLIENT NAME') }}</label>
                        <div class="col-md-6">
                            <input id="clientName" type="text" class="form-control" name="clientName" autofocus>

                                </div>
                            </div>
                 {{--kliento pavarde--}}
                <div class="form-group row">
                    <label for="clientSurname" class="col-md-4 col-form-label text-md-right">{{ __('CLIENT SURNAME') }}</label>
                        <div class="col-md-6">
                                <input id="clientSurname" type="text" class="form-control" name="clientSurname" autofocus>

                                </div>
                            </div>

                 {{--kliento aprasymas--}}
                <div class="form-group row">
                    <label for="clientDescription" class="col-md-4 col-form-label text-md-right">{{ __('DESCRIPTION ABOUT CLIENT') }}</label>
                        <div class="col-md-6">
                                <textarea class="form-control"  cols="5" rows="5" name="clientDescription"> </textarea>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
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
