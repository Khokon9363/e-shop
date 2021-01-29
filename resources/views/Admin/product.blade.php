@extends('Admin.master')

@section('title')
    Product
@endsection

@php
    $route = 'admin.product.'
@endphp

@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-11 m-auto">
            <div class="card">
            @if(session('success') || session('delete'))
                <div class="card-body col-md-6 m-auto">
                    <div class="alert {{ session('success') ? 'alert-success' : 'alert-danger' }} alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
                <div class="card-header" style="background-color: white;">
                <h5 class="float-left">{{ $page == 'edit' ? 'Edit Product' : 'View Product'}}</h5>
                <h5 class="float-right">
                @if($page == 'edit' || $page == 'show')
                    <a href="{{ route($route.'index') }}" class="btn btn-info btn-sm">Go Back</a>
                @else
                    <button class="btn btn-info btn-sm" type="button" data-toggle="collapse" data-target="#collapseProduct">Add Product</button>
                @endif
                </h5>
                </div>
                @if($page == 'index' || $page == 'edit')
                <div class="card-body {{ $errors->any() || $page == 'edit' ? 'show' : 'collapse' }}" style="background-color: whitesmoke;" id="collapseProduct">
                    <form action="{{ $page == 'edit' ? route($route.'update', $data->id) : route($route.'store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($page == 'edit')
                        @method('PATCH')
                    @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="categoryId">Select Category</label>
                                    <select name="category_id" class="form-control" id="categoryId">
                                    @foreach($categories as $category)
                                        <option {{ isset($data->category_id) && $data->category_id == $category->id || old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('category_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="image">Choose Image</label>
                                    <input type="file" name="image[]" id="image" multiple class="form-control">
                                    <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" value="{{ isset($data->name) ? $data->name : old('name') }}" id="name" class="form-control" placeholder="Text one">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="title">Product Title</label>
                                    <input type="text" name="title" value="{{ isset($data->title) ? $data->title : old('title') }}" id="title" class="form-control" placeholder="Text two">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="short">Short Description</label>
                                    <textarea name="short" id="short" class="form-control" placeholder="Short Description">{{ isset($data->short) ? $data->short : old('short') }}</textarea>
                                    <span class="text-danger">
                                        @error('short')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="long">Long Description</label>
                                    <textarea name="long" id="long" class="form-control" placeholder="Long Description">{{ isset($data->long) ? $data->long : old('long') }}</textarea>
                                    <span class="text-danger">
                                        @error('long')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="past_price">Previous Price</label>
                                    <input type="number" name="past_price" value="{{ isset($data->past_price) ? $data->past_price : old('past_price') }}" id="past_price" class="form-control" placeholder="Text one">
                                    <span class="text-danger">
                                        @error('past_price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="present_price">Present Price</label>
                                    <input type="number" name="present_price" value="{{ isset($data->present_price) ? $data->present_price : old('present_price') }}" id="present_price" class="form-control" placeholder="Text two">
                                    <span class="text-danger">
                                        @error('present_price')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label>Publication Status</label><br>
                                    <input type="radio" {{ old('status') == 'Active' || isset($data->status) && $data->status == 'Active' ? 'checked' : '' }} name="status" id="active" value="Active" id="Active">
                                    <label for="active">Active</label>
                                    <input type="radio" {{ old('status') == 'Deactive' || isset($data->status) && $data->status == 'Deactive' ? 'checked' : '' }} name="status" id="deactive" value="Deactive" id="Deactive">
                                    <label for="deactive">Deactive</label><br>
                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                @if($page == 'edit')
                                <div class="col-md-6 mb-2">
                                    <input type="checkbox" name="old_images" id="oldImages">
                                    <label for="oldImages">Delete old Images</label><br>
                                    @foreach($data->productImages as $image)
                                        <img src="{{ asset('product_images/'.$image->image) }}" class="mt-1" style="height: 80px; width: auto;">
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">{{ $page == 'edit' ? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                @if($page == 'index')
                <div class="card-body" style="background-color: white;">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Product Name</th>
                                <th scope="col" style="width: 35%;">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                @foreach($product->productImages as $image)
                                    <img src="{{ asset('product_images/'.$image->image) }}" class="mt-1" style="height: 70px; width: auto;">
                                @endforeach
                                </td>
                                <td>
                                    <div class="badge badge-pill {{ $product->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $product->status }}</div>
                                </td>
                                <td>
                                    <a href="{{ route($route.'show', $product->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route($route.'edit', $product->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route($route.'destroy', $product->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    @if($data->hasPages())
                                        {{ $data->links() }}
                                    @endif
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @endif
                @if($page == 'show')
                <div class="card-body" style="background-color: white;">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Category Name</th>
                                <td>{{ $data->category->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Product Name</th>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Product Title</th>
                                <td>{{ $data->title }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Short Description</th>
                                <td>{{ $data->short }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Long Description</th>
                                <td>{{ $data->long }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Previous Price</th>
                                <td>{{ $data->past_price }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Present Price</th>
                                <td>{{ $data->present_price }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Status</th>
                                <td>
                                    <div class="badge badge-pill {{ $data->status == 'Active' ? 'badge-success' : 'badge-danger' }}">{{ $data->status }}</div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col" colspan="2">Image (s)</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    @foreach($data->productImages as $image)
                                        <img src="{{ asset('product_images/'.$image->image) }}" class="mt-1" style="height: auto; width: 40%;">
                                    @endforeach
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection