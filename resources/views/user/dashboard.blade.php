@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Bootcampss
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <tbody>
                    @forelse ($checkouts as $checkout)
                    <tr class="align-middle">
                        <td width="18%">
                            <img src="{{ asset('assets/images/item_bootcamp.png') }}" height="120" alt="">
                        </td>
                        <td>
                            <p class="mb-2">
                                <strong>{{ $checkout->Camp->title }}</strong>
                            </p>
                            <p>
                                {{ $checkout->created_at->format('M d, Y') }}
                            </p>
                        </td>
                        <td>
                            <strong>{{ $checkout->Camp->price }}</strong>
                        </td>
                        <td>
                            @if ($checkout->payment_status == 'Paid')
                                <strong class="text-success">Payment Success</strong>
                            @else
                                <strong class="text-warning">Waiting for Payment</strong>
                            @endif
                        </td>
                        <td>
                            <a href="{{ $checkout->midtrans_url }}" target="_blank" class="btn btn-primary">Bayar</a>
                            <a href="https://wa.me/6283822658031?text=Hai, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}" class="btn btn-primary">
                                Contact Support
                            </a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                Kamu belum mempunyai bootcamp :(
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection