<!-- resources/views/landing.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero is-fullheight is-bold" style="background-image: linear-gradient(to bottom, #2E4053, #1A1D23);">
        <div class="container">
            <div class="hero-body">
                <h1 class="title is-1" style="color: #fff;">The Importance of Agriculture in Cameroon</h1>
                <p class="subtitle is-4" style="color: #fff;">Agriculture is the backbone of Cameroon's economy, providing employment opportunities and food for the population.</p>
                <p class="subtitle is-4" style="color: #fff;">By investing in agricultural projects, you are contributing to the growth and development of Cameroon's economy.</p>
                <button class="button is-primary is-large" style="background-color: #FFC107; color: #fff;">Learn More</button>
                <div class="buttons">
                    <a href="{{ route('login') }}" class="button is-primary">Login</a>
                    <a href="{{ route('register') }}" class="button is-primary">Register</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Invest Section -->
    <section class="section" style="background-color: #F7F7F7; padding: 60px 0;">
        <div class="container">
            <h2 class="title is-2">Why Invest in Cameroon?</h2>
            <div class="columns is-multiline">
                <div class="column is-one-third">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title is-4">Diversify Your Portfolio</h3>
                            <p>Investing in agricultural projects in Cameroon provides a unique opportunity to diversify your portfolio and reduce risk.</p>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title is-4">Support Local Farmers</h3>
                            <p>By investing in agricultural projects, you are supporting local farmers and contributing to the growth of Cameroon's agricultural sector.</p>
                        </div>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="card">
                        <div class="card-content">
                            <h3 class="title is-4">High Returns on Investment</h3>
                            <p>Agricultural projects in Cameroon offer high returns on investment, making it a lucrative opportunity for investors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ongoing Projects Section -->
    <section class="section projects" style="background-color: #F7F7F7; padding: 60px 0;">
        <div class="container">
            <h2 class="title is-2">Ongoing Projects</h2>
            <div class="columns is-multiline">
                @foreach ($projects as $project)
                    <div class="column is-one-third">
                        <div class="card">
                            <div class="card-content">
                                <h3 class="title is-4">{{ $project->title }}</h3>
                                <p>{{ $project->description }}</p>
                                @if (!Auth::check())
                                    <button class="button is-primary">Donate</button>
                                @else
                                    <button class="button is-primary">Invest</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="section" style="background-color: #2E4053; padding: 60px 0;">
        <div class="container">
            <h2 class="title is-2" style="color: #fff;">Get Started Today!</h2>
            <p style="color: #fff;">Invest in agricultural projects in Cameroon and contribute to the growth and development of the country's economy.</p>
            <button class="button is-primary is-large" style="background-color: #FFC107; color: #fff;">Invest Now</button>
        </div>
    </section>
@endsection