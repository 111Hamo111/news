@extends('Admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Users</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            
            <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
              @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control" placeholder="user name">
                </div>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="email">
                </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                {{-- password input --}}
                
                {{-- <div class="form-group">
                  <input type="text" name="password" class="form-control" placeholder="password">
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror --}}

                <div class="col-sm-5">
                  <!-- select -->
                  <div class="form-group">
                    <label>Select Role</label>
                    <select class="form-control" name="role">
                      @foreach ($roles as $id => $role)
                        <option value="{{ $id }}" {{ $id == old('role') ? ' selected' : '' }}>{{ $role }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('role')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              <!-- /.card-body -->
                <button type="submit" class="col-5 btn btn-primary">Add</button>
            </form>




          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection