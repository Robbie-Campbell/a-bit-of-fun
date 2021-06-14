@extends('base')
@section('content')
    <div class="container">
        <div style="max-height:289px;" class="row mb-2">
            @foreach($quotes as $quote)
                <div style="max-height:289px;" class="col-md-6 mt-4">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success">Saved quote from {{  $quote->user_id  }}</strong>
                            <h3 class="mb-0">{{  $quote->quote  }}</h3>
                            <div class="mb-1 text-muted">{{  $quote->author  }}</div>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img width="220" height="289" src="{{  asset($quote->image_src)  }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
