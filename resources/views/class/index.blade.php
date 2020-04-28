@extends('layouts.app')

@section('title','Classes')
    @section('content')
       
       <div class="container">
          <h2  style="color:blue">Classes List</h2>
          <a href={{ route('class.create') }} class="btn btn-primary btn-sm"> Create Class</a>
          @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
        @endif
            <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($classes as $item)
                     <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td><a href={{ route('class.edit',$item->id) }} class="btn btn-primary btn-sm">Edit</a></td>
                        <td>
                           <form method="post" action={{ route('class.destroy',$item->id)  }}>
                                 @csrf   
                                 @method('delete')
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> 
                        </td>
                      </tr>  
                   @endforeach
                  </tbody>
                </table>
       </div>
    @endsection
    
