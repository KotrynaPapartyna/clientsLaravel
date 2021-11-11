@extends('layouts.app')

@section('content')

    {{--Kliento pridejimas JS pagalve- veikia--}}
    {{--neveikia mygtukai - ir +  --}}

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="addFields">
                        <button class="btn btn-primary" id="addFields">ADD MORE FIELDS</button>
                    </div>

                    <div class="card-header">{{ __('CREATE MORE CLIENTS') }}</div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('client.storeJS') }}" >
                            @csrf

                            <div class="dynamicFields">

                    {{--Ciklas--}}
                            @for ($i=0; $i<$clientsCount; $i++ )

                            {{--kliento vardas--}}
                            <div class="form-group row">
                                <label for="clientName" class="col-md-4 col-form-label text-md-right">{{ __('CLIENT NAME') }}</label>
                                <div class="col-md-6">
                                    <input id="clientName" type="text" class="form-control" name="clientName[]" autofocus>
                                </div>
                            </div>

                            {{--kliento pavarde--}}
                            <div class="form-group row">
                                <label for="clientSurname" class="col-md-4 col-form-label text-md-right">{{ __('CLIENT SURNAME') }}</label>
                                <div class="col-md-6">
                                    <input id="clientSurname" type="text" class="form-control" name="clientSurname[]" autofocus>
                                </div>
                            </div>

                            {{--kliento aprasymas--}}
                            <div class="form-group row">
                                <label for="clientDescription" class="col-md-4 col-form-label text-md-right">{{ __('DESCRIPTION ABOUT CLIENT') }}</label>
                                <div class="col-md-6">
                                    <textarea  class="form-control"  cols="5" rows="5" name="clientDescription[]"> </textarea>
                                </div>
                            </div>

                            {{--neveikia--}}
                            <div class="remove">
                            <button type="button" id="remove-client" class="btn btn-danger remove-client">-</button>
                            </div>

                            {{--neveikia--}}
                            <div class="add">
                            <button type="button" id="add-client" class="btn btn-danger add-client">+</button>
                            </div>

                            @endfor
                            {{-- ciklo pabaiga--}}
                        </div>

                            {{--isaugojimo mygtukas--}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('SAVE NEW CLIENTS') }}
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

    {{--JS scriptas--}}
    {{--append- prijungia/ prideda  daugiau inputu--}}
    <script>
        $(document).ready(function(){
            $("#addFields").click(function() {
                console.log("veikia");
                $(".dynamicFields").append('<div class="client"><div class="form-group row"><label for="clientName" class="col-md-4 col-form-label text-md-right">{{ __("CLIENT NAME") }}</label><div class="col-md-6"><input id="clientName" type="text" class="form-control" name="clientName[]" autofocus></div></div><div class="form-group row"><label for="clientSurname" class="col-md-4 col-form-label text-md-right">{{ __("CLIENT SURNAME") }}</label><div class="col-md-6"><input id="clientSurname" type="text" class="form-control" name="clientSurname[]" autofocus></div></div><div class="form-group row"><label for="clientDescription" class="col-md-4 col-form-label text-md-right">{{ __("CLIENT DESCRIPTION") }}</label><div class="col-md-6"><textarea  class="form-control"  cols="5" rows="5" name="clientDescription[]"> </textarea></div></div><button type="button" class="btn btn-danger remove-client">-</button></div> </div><button type="button" class="btn btn-danger add-client">+</button></div>')
            });

            // nenori veikti- reikia paziureti kodel
            $(document).on('click', '.remove-client', function() {
                $(this).parents('.client').remove();
            });

        })
    </script>

    @endsection
