@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h3>Employee Dashboard </h3>   {{\Illuminate\Support\Carbon::now()}}</div>

                    <div class="card-header btn-parent">
{{--                     @if($last_checkin!=null && Auth::user()->name==$last_checkin->username)--}}


                            <form action="{{route('checkout')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->name }}" name="username">
                                <input type="hidden" value="{{ Auth::user()->email }}" name="email">
                                <button class="btn btn-primary checkout">CheckOut</button>
                            </form>

{{--                        @else--}}

                            <form action="{{route('checkin')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->name }}" name="username">
                                <input type="hidden" value="{{ Auth::user()->email }}" name="email">
                                <button class="btn btn-primary checkin">CheckIn</button>
                            </form>

{{--                         @endif--}}
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-6">
                            <div class="card-body">

                                    Top 5 Employee

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">

                                    2 leading and lagging employee

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .checkin, .checkout{
            width: 100px;
        }
        .checkin:hover{
            background-color: green;
        }
        .checkout:hover{
            background-color: red;
        }
        .btn-parent{
            display: flex;
            justify-content: space-between;
        }

    </style>
@endsection
