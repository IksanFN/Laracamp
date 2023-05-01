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
                    Create Discount
                </h2>
            </div>
        </div>
        <hr>
        <div class="row my-5 justify-content-center">
           <div class="col-lg-8">
                <form action="{{ route('admin.discount.store') }}" method="post">
                @csrf
                <div class="row mx-1 justify-content-center">
                    <div class="col">
                      <label class="form-label">Name Discount</label>
                      <input type="text" name="name" class="form-control" placeholder="Name Discount" aria-label="First name" autofocus>
                    </div>
                    <div class="col">
                      <label class="form-label">Code Discount</label>
                      <input type="text" name="code" class="form-control" placeholder="Cth: GAJIAN" aria-label="Last name">
                    </div>
                    <div class="col">
                        <label class="form-label">Percentage Discount</label>
                        <input type="text" name="percentage" min="1" max="100" class="form-control" placeholder="Cth: 10" aria-label="Last name">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Description Discount</label>
                        <textarea name="description" class="form-control"></textarea>
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