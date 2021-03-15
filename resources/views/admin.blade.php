@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">

                  <!-- Table for employee list -->

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Employees</th>
                                <th scope="col">Action</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($employee as $employee)
                                <tr>

                                    <th scope="col">
                                        {{ $employee->name }}
                                    </th>

                                    <th>
                                        @if($employee->is_employee=='1')
                                            <a class="self-btn" href="{{route('permit-employee', $employee->id)}}">
                                            <i id="permit" class="far fa-check permit"> permit</i>
                                            </a>
                                        @else
                                        <a class="self-btn" href="{{route('ban-employee', $employee->id)}}">

                                            <i id="ban" class="fas fa-ban ban"> ban</i>

                                        </a>
                                         @endif


                                    </th>

                                    <th>
                                        @if($employee->is_employee=='1')
                                            <i id="banned" class="banned"> banned</i>
                                        @else
                                            <i id="permitted" class="permitted"> permitted</i>
                                            @endif
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
       .permitted, .permit {
            color: green;
        }
        .banned, .ban {
          color: red;
        }
        .self-btn{
            display: inline-block;
            border: 1px solid #ccc;
            padding: 6px 10px;
            border-radius: 4px;
            width: 100px;
            background-color: white;
        }
        .self-btn:hover{
            transition: all .3s ease-in-out;
            background-color: lightgray;
        }

    </style>


@endsection

@section('script')
    <script>

    </script>
@endsection




