@extends('layouts.app')

@section('title','Departments')
    @section('content')
       
       <div class="container">
          <h2  style="color:blue">Department List</h2>
          <a href={{ route('department.create') }} class="btn btn-primary btn-sm"> Create Department</a>
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
                   @foreach ($departments as $item)
                     <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td><a href={{ route('department.edit',$item->id) }} class="btn btn-primary btn-sm">Edit</a></td>
                        
                        
                        <td>
                           <form method="post" action={{ route('department.destroy',$item->id)  }}>
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
    
