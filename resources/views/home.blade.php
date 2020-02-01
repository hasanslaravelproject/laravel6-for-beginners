@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @role('user')
                                I am a User!
                            @else

                                I am Admin...
                            @endrole

                             
                       
                               @can('delete')
                             <a href="">Delete btn</a>
                             @endcan
                               @can('create')
                             <a href="">Create btn</a>
                             @endcan
                               @can('view')
                             <a href="">view btn</a>
                             @endcan
                              @can('update')
                             <a href="">update btn</a>
                             @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
