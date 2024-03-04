@extends('Admin.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
              <li class="breadcrumb-item active">Add Post</li>
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
            
            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="form-group col-4">
                    <input type="text" name="title" class="form-control" placeholder="name post" value="{{ old('title') }}">
                  @error('title')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group">
                  <textarea id="summernote" placeholder="content text" class="form-control" name="content">{{ old('content') }}</textarea>
                  @error('content')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group col-4">
                  <label for="exampleInputFile">Add Preview</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="preview_image" id="exampleInputFile">
                      <label class="custom-file-label">Choose image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @error('preview_image')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group col-4">
                  <label for="exampleInputFile">Add Main image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="main_image" id="exampleInputFile">
                      <label class="custom-file-label">Choose image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  @error('main_image')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="col-sm-4">
                  <!-- select -->
                  <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="category_id">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? ' selected' : '' }}>{{ $category->title }}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('category_id')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>

                <div class="form-group col-4">
                  <label>Tags</label>
                  <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
                    @foreach ($tags as $tag)      
                      <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? " selected" : ""}} value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                  </select>
                  @error('tag_ids')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              <!-- /.card-body -->
                <div class="form-group">
                  <button type="submit" class="col-4 btn btn-primary">Add</button>
                </div>
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