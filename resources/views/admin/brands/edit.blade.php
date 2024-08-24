@extends('layouts.admin-layout')

@section('content')
    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="card-header-2">
                        <h5>Edit Brand</h5>
                    </div>

                    <div class="theme-form theme-form-2 mega-form">
                        <form action="{{ route('brands.update', [$brand->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label-title mb-0">Brand Name</label>
                                <input type="text" name="name" placeholder="Category Name"
                                    value="{{ old('name', $brand->name) }}" @class(['form-control', 'is-invalid' => $errors->first('name')])>
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback d-block`">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label-title">Brand Logo</label>
                                <div class="form-group">
                                    <input type="file" name="image" accept="image/*" @class(['form-control', 'is-invalid' => $errors->first('image')])>
                                    @if ($errors->has('image'))
                                        <div class="invalid-feedback d-block">{{ $errors->first('image') }}</div>
                                    @endif

                                    @if ($brand->image)
                                        <img src="{{ asset('storage/' . $brand->image) }}" alt=""
                                            style="width: 100px; height: auto;">
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label-title mb-0">Description</label>
                                <textarea name="description" placeholder="Enter Description" @class([
                                    'form-control',
                                    'is-invalid' => $errors->first('description'),
                                ])>{{ old('description', $brand->description) }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="invalid-feedback d-block">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                            <div class="mb-3 d-flex align-items-center gap-4">
                                <label class="form-label-title">Show On Homepage</label>
                                <label class="switch">
                                    <input type="checkbox" name="flag" value="SHOW_ON_HOMEPAGE" @checked($brand->flag == 'SHOW_ON_HOMEPAGE')>
                                    <span class="switch-state"></span>
                                </label>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn w-100 theme-bg-color text-white">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
