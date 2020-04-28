@extends('layouts.app')

@section('title','Edit Departmet')
    @section('content')
    <div class="container">
                    <div class="card">
                        <div class="card-header">Edit Department #{{ $id->id }}</div>
        @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
        @endif

                        <div class="card-body">

                            <form method="post" action="{{ route('department.update',$id->id) }}">
                                @csrf
        @method('put')
                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
        
                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $id->title }}" required autofocus>
        
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
        
                                
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                           update
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    @endsection