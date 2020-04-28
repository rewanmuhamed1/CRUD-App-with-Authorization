@extends('layouts.app')
@section('title','Students')
    @section('content')
       <div class="container">
          <h2  style="color:blue">Students List</h2>
          @if (Request::user()->roles->role === "SuperAdmin" || Request::user()->roles->role === "Teacher")
          <a href={{ url('student/create') }} class="btn btn-primary btn-sm"> Create Student</a>
          @endif
          @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
        @endif
            <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Father Name</th>
                      <th scope="col">Presdent Address</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Home Number</th>
                      <th scope="col">Classe</th>
                      <th scope="col">Department </th>
                      <th scope="col">Roll</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if (Request::user()->roles->role === "Student")
                   @foreach ($students as $item)
                    @if (Auth::user()->email===$item->email && Auth::user()->reg_id_all=== $item->reg_id)
                     <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->father_name }}</td>
                        <td>{{ $item->presdent_address }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>{{ $item->home_number }}</td>
                        <td>{{ $item->classes->title }}</td>
                        <td>{{ $item->department->title }}</td>
                        <td>{{ $item->roll }}</td>
                        <td><a href={{ url('student/edit',$item->id) }} class="btn btn-primary btn-sm">Edit</a></td>
                      </tr>
                     @endif
                   @endforeach
                  @else 
                      @foreach ($students as $item)
                      <tr>
                          <th scope="row">{{ $item->id }}</th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->father_name }}</td>
                          <td>{{ $item->presdent_address }}</td>
                          <td>{{ $item->email }}</td>
                          <td>{{ $item->phone_number }}</td>
                          <td>{{ $item->home_number }}</td>
                          <td>{{ $item->classes->title }}</td>
                          <td>{{ $item->department->title }}</td>
                          <td>{{ $item->roll }}</td>
                          <td><a href={{ url('student/edit',$item->id) }} class="btn btn-primary btn-sm">Edit</a></td>
                        <!-- admin permission if condition  -->
                          @if (Request::user()->roles->role === "SuperAdmin")
                          <td>
                            <form method="post" action={{ url('student/destroy',$item->id)  }}>
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                          </td>
                          @endif
                        </tr>
                      
                    @endforeach
                  @endif 
                  
                  </tbody>
                </table>
       </div>
    @endsection

