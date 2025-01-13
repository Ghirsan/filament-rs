{{-- @dd($Promo) --}}
@extends('masterlayout.masterlayout')

@section('main')
    {{-- ini halaman utama. isi konten utama ada disini --}}
    <h2> Promo Tersedia </h2>
    <p>Promo yang tersedia dapat dilihat dibawah ini</p>
    <div class="container d-flex flex-wrap justify-content-start">
        @foreach ($Promo as $Column)
            <div class="card me-2 mb-2" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $Column -> name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Rp {{ $Column -> price }}</h6>
                    <p class="card-text">Lihat Detail</p>
                    <a type="button" class="btn btn-info" href="{{ route('promo.detail', $Column->id) }}">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
