@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('clients') }}</div>



                    <form method="GET" action="{{route('client.create') }}">
                        @csrf
                        <button class="btn btn-primary" type="submit">CREATE NEW CLIENT</button>
                    </form>



                    <form method="GET" action="{{route('client.createClients') }}">
                        @csrf
                        <button class="btn btn-primary" type="submit">CREATE NEW CLIENTS</button>
                    </form>



                    <form method="GET" action="{{route('client.createJS') }}">
                        @csrf
                        <button class="btn btn-primary" type="submit">CREATE NEW CLIENTS with JS</button>
                    </form>


    {{--MYGTUKU LAUKAS--}}
    <table class="table table-striped table-hover">
        <tr>


    @if ($clients->count() == 0)
        <p>CLIENTS TABLE IS EMPTY</p>
    @endif



            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Description</th>

            </tr>

            @foreach ($clients as $client)
                <tr>
                    <td>{{$client->id}} </td>
                    <td>{{$client->name}} </td>
                    <td>{{$client->surname}} </td>
                    <td>{{$client->description}} </td>


                </tr>
            @endforeach

        </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


