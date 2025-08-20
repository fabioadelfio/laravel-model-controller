<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I miei film su Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body class="text-white">
    <header class="bg-primary py-5">
        <div class="container">
            <h2 class="home-title">I miei Film su Laravel</h2>
        </div>
    </header>

    <main>
        <div class="container mt-5">
            <div class="row">
                @foreach ($movies as $movie)
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title fs-4">{{ $movie->title }}</h5>
                            <p class="card-text text-body-secondary">Titolo originale: {{ $movie->original_title }}</p>
                            <p class="card-text text-body-secondary">Nazionalità: {{ $movie ->nationality }}</p>
                            <p class="card-text text-body-secondary">Data di uscita: {{ $movie->date }}</p>


                        </div>
                        <div class="rating-stars text-primary bg-primary bg-opacity-25 p-3">
                            @php
                            $vote = $movie->vote;
                            $fullStars = floor($vote); // Stelle piene (voto intero)
                            $hasHalfStar = ($vote - $fullStars) >= 0.5; // Mezza stella se decimale >= 0.5
                            $emptyStars = 10 - $fullStars - ($hasHalfStar ? 1 : 0); // Stelle vuote
                            @endphp

                            {{-- Stelle piene --}}
                            @for($i = 0; $i < $fullStars; $i++)
                                <i class="bi bi-star-fill"></i>
                                @endfor

                                {{-- Mezza stella --}}
                                @if($hasHalfStar)
                                <i class="bi bi-star-half"></i>
                                @endif

                                {{-- Stelle vuote --}}
                                @for($i = 0; $i < $emptyStars; $i++)
                                    <i class="bi bi-star"></i>
                                    @endfor
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>

</html>