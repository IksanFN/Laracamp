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
                            <strong>
                                Rp. {{ number_format($checkout->total) }}
                                @if ($checkout->discount_id)
                                    <span class="badge bg-success">Disc {{ $checkout->discount_percentage }}%</span>
                                @endif
                            </strong>
                        </td>
                        <td>
                            @if ($checkout->payment_status == 'Paid')
                                <strong class="text-success">Payment Success</strong>
                            @elseif ($currentDate > $checkout->payment_expired)
                                <strong class="text-danger">Expired</strong>
                            @else 
                                <strong class="text-warning">Waiting for Payment</strong>
                            @endif
                        </td>
                        <td>
                            
                            @if ($currentDate > $checkout->payment_expired && $checkout->payment_status == 'Waiting')
                                <a href="" class="btn btn-primary">Resfresh Transaction</a>
                            @elseif ($checkout->payment_status == 'Paid')
                                <a href="" class="btn btn-primary">Detail Transaksi</a>
                            @else
                                <a href="{{ $checkout->midtrans_url }}" target="_blank" class="btn btn-primary">Pay Here</a>
                                {{-- <input type="hidden" id="snap-token" value="{{ $checkout->token }}" class="btn btn-primary"> --}}
                                {{-- <input type="submit" id="pay-button" value="Pay Now" class="btn btn-primary"> --}}
                                <a href="https://wa.me/6283822658031?text=Hai, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}" class="btn btn-primary">
                                    Contact Support
                                </a>
                            @endif
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

@section('js')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-61XuGAwQ8Bj8LxSS"></script>

<script type="text/javascript">
  var payButton = document.getElementById('pay-button');

  /* For example trigger on button clicked, or any time you need */
  payButton.addEventListener('click', function() {
    /* in this case, the snap token is retrieved from the Input Field */
    var snapToken = document.getElementById('snap-token').value;
    snap.pay(snapToken);
  });
</script>
@endsection