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
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </thead>
                <tbody>
                @forelse($discounts as $discount)
                    <tr>
                        <td>{{ $discount->name }}</td>
                        <td class="text-primary fw-bold">
                            <span class="badge bg-primary">{{ $discount->code }}</span> 
                        </td>
                        <td>{{ $discount->percentage }}%</td>
                        <td>{{ $discount->description }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.discount.edit', $discount->id) }}" class="btn btn-warning text-white">Edit</a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.discount.destroy', $discount->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                <div class="alert alert-warning" role="alert">
                    <strong>Belum ada data discount</strong>
                </div>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection