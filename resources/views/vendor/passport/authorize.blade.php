@extends('layouts.base', ['title' => 'Authorization'])

@section('body')
    <div class="pt-24 text-center bg-gray-100 h-screen">

        <div class="max-w-2xl mx-auto p-8 bg-white shadow-lg rounded">

            <h3 class="mb-6 text-xl tracking-wider text-gray-700">Authorize <strong>{{$client->name}}</strong></h3>

            <p class="mb-10">
                {{$client->name}} is requesting permission to access your account.
            </p>

            <div class="flex">
                <form class="flex-1" method="post" action="{{ route('passport.authorizations.approve') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <button type="submit" class="w-full p-3 bg-green-200 rounded shadow-md">Authorize</button>
                </form>

                <form class="flex-1 ml-12" method="post" action="{{ route('passport.authorizations.deny') }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <button class="w-full p-3 bg-gray-200 rounded shadow-md">Cancel</button>
                </form>
            </div>

        </div>

    </div>
@endsection
