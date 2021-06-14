@extends('base')
@section('content')
    <main class="container">
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">The Quote Storage Database</h1>
                <p class="lead my-3">Never forget a quote again, store it here!</p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">Login Here.</a></p>
            </div>
        </div>

        <div style="max-height:289px;" class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Featured Quoter</strong>
                        <h3 class="mb-0">Albert Einstein</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">The German Scientist...</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img width="220" height="289" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Einstein_1921_by_F_Schmutzer_-_restoration.jpg/220px-Einstein_1921_by_F_Schmutzer_-_restoration.jpg" alt="">
                    </div>
                </div>
            </div>
            <div style="max-height:289px;" class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Quote of the Day</strong>
                        <h3 class="mb-0">Dulce et decorum est</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">Wilfred Owen's Epic poem...</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img width="220" height="289" src="http://blogs.bodleian.ox.ac.uk/archivesandmanuscripts/wp-content/uploads/sites/161/2018/10/Wilfred-Owen-Photo.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
