@extends('layouts.admin-layout')

@section('content')
<div class="row">
    <div class="col-sm-8 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2">
                    <h5>Add Doctor Type</h5>
                </div>

                <div class="theme-form theme-form-2 mega-form">
                    <form action="{{ route('doctor-types.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label-title mb-0">Name</label>
                            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                                @class(['form-control', 'is-invalid'=> $errors->first('name')]) maxlength="75">
                            @if ($errors->has('name'))
                            <div class="invalid-feedback d-block`">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label-title">Image</label>
                            <div class="form-group">
                                <input type="file" name="image" accept="image/*" @class(['form-control', 'is-invalid'=>
                                $errors->first('image')])>
                                @if ($errors->has('image'))
                                <div class="invalid-feedback d-block">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-title mb-0">Description</label>
                            <textarea name="description" placeholder="Enter Description" @class([ 'form-control'
                                , 'is-invalid'=> $errors->first('description'),
                                ])>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <div class="invalid-feedback d-block">{{ $errors->first('description') }}</div>
                            @endif
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