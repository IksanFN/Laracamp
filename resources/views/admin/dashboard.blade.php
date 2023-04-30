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
                    <th class="text-center">Camp</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Register Date</th>
                    <th class="text-center">Status</th>
                    @if ($checkouts[0]->payment_status != '')
                        <th class="text-center">Action</th>
                    @endif
                </thead>
                <tbody>
                    @forelse ($checkouts as $checkout)
                        <tr>
                            {{-- <td>{{ $pembayaran_bulan_ini }}</td> --}}
                            <td>{{ $checkout->User->name }}</td>
                            <td class="text-center">{{ $checkout->Camp->title }}</td>
                            <td class="text-center">{{ $checkout->Camp->price }}</td>
                            <td class="text-center">{{ $checkout->created_at->format('M-d-Y') }}</td>
                            <td class="text-center">
                                @if ($checkout->payment_status == 'Paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning">Waiting</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($checkout->payment_status != 'Paid')
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