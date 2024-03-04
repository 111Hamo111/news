@extends('Personal.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Likes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Likes</li>
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
          <div class="col-6">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Show</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($posts as $post)
                      <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td><a href="{{ route('admin.post.show', $post->id) }}"><i class="fas fa-regular fa-eye"></i></a></td>
                        <td>
                          <form action="{{ route('personal.liked.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-solid fa-trash text-danger"></i>
                              </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection