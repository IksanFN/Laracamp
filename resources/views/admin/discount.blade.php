@extends('layouts.app', ['title' => 'Discount'])

@section('content')
<section class="dashboard my-4">
    <div class="container">
        <div class="row text-left">
            <div class="col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                   MANAGEMENT DISCOUNT
                </p>
                <h2 class="primary-header ">
                    Data Discount
                </h2>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('admin.discount.create') }}" class="btn btn-primary">Add Discount</a>
                </div>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <thead>
                    <th>Name Discount</th>
                    <th>Code</th>
                    <th>Percentage</th>
                    <th>Description</th>
                </thead>
                <tbody>
                        <tr>
                        </tr>
                    {{-- @empty --}}
                        <tr>
                            <td>Belum ada data discount</td>
                        </tr>
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection