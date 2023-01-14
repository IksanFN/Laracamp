@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                   ADMIN DASHBOARD
                </p>
                <h2 class="primary-header ">
                    Data Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <thead>
                    <th>User</th>
                    <th>Camp</th>
                    <th>Price</th>
                    <th>Register Data</th>
                    <th class="text-center">Paid Status</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($checkouts as $checkout)
                        <tr>
                            <td>{{ $checkout->User->name }}</td>
                            <td>{{ $checkout->Camp->title }}</td>
                            <td>{{ $checkout->Camp->price }}</td>
                            <td>{{ $checkout->created_at->format('M-d-Y') }}</td>
                            <td class="text-center">
                                @if ($checkout->is_paid)
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning">Waiting</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if (!$checkout->is_paid)
                                <form action="{{ route('admin.update.paid', $checkout->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">Set to Paid</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Belum ada data checkout bootcamp</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection