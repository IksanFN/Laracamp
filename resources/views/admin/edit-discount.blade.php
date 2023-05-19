@extends('layouts.app', ['title' => 'Discount'])

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                   MANAGEMENT DISCOUNT
                </p>
                <h2 class="primary-header ">
                    Edit Discount
                </h2>
            </div>
        </div>
        <hr>
        <div class="row my-5 justify-content-center">
           <div class="col-lg-8">
                <form action="{{ route('admin.discount.update', $discount) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mx-1 justify-content-center">
                    <div class="col">
                    {{-- Input ini di kirim untuk unvalidasi di request --}}
                    <input type="hidden" name="id" value="{{ $discount->id }}">
                      <label class="form-label">Name Discount</label>
                      <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" placeholder="Name Discount" value="{{ old('name', $discount->name) }}" autofocus>
                      @if ($errors->has('name'))
                          <p class="text-danger">{{ $errors->first('name') }}</p>
                      @endif
                    </div>
                    <div class="col">
                      <label class="form-label">Code Discount</label>
                      <input type="text" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" value="{{ old('name', $discount->code) }}" placeholder="Cth: GAJIAN" aria-label="Last name">
                      @if ($errors->has('code'))
                          <p class="text-danger">{{ $errors->first('code') }}</p>
                      @endif  
                    </div>
                    <div class="col">
                      <label class="form-label">Percentage Discount</label>
                      <input type="text" name="percentage" min="1" max="100" class="form-control {{ $errors->has('percentage') ? 'is-invalid' : ''}}" value="{{ old('name', $discount->percentage) }}" placeholder="Cth: 10" aria-label="Last name">
                      @if ($errors->has('percentage'))
                          <p class="text-danger">{{ $errors->first('percentage') }}</p>
                      @endif 
                    </div>
                    <div class="mt-3">
                      <label class="form-label">Description Discount</label>
                      <textarea name="description" class="form-control {{ $errors->has('description') }}">{{ old('name', $discount->description) }}</textarea>
                      @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                      @endif
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-primary px-5">Save</button> 
                    </div>  
                  </div>
                </form>
           </div>
        </div>
    </div>
</section>
@endsection