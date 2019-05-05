@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


$Typhoid = [
    "Follow strict food and water precautions while traveling.",
    "Ensure all food is well cooked - especially meat and seafood.",
    "Consume only canned or commercially bottled drinks.",
    "Ensure ice cubes are made from purified water.",
    "Eat only fruits and vegetables that you wash and peel yourself."
];

$General Health tips = [
    "Don't Drink Sugar Calories",
    "Avoid Processed Junk Food (Eat Real Food Instead)",
    "Get Enough Sleep",
    "Drink Some Water, Especially Before Meals",
    "Don't Eat a Lot of Refined Carbohydrates"
]

