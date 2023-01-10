<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Online Study Website Design Tutorial</title>

    <!-- google fonts cdn link  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<!-- header section starts  -->

<header>

    <div id="menu" class="fas fa-bars"></div>

    <!-- <a href="#" class="logo"><i class="fas fa-user-graduate"></i>LOGO</a> -->
    <a href="#" ><img src="{{ asset('img/Quizze.png') }}" height="50px" width="70px"></a>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#course">Quizzes</a></li>
            <!-- <li><a href="#teacher">teacher</a></li> -->
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <a href="{{ route('login.view') }}" style="font-size: 26px" class="fas fa-user-circle"></a>

</header>

<!-- header section ends -->

<!-- login form  -->

{{-- <div class="login-form">

    <form action="">
        <h3>login</h3>
        <input type="email" placeholder="username" class="box">
        <input type="password" placeholder="password" class="box">
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have an account? <a href="#">register now</a></p>
        <input type="submit" class="btn" value="login">
        <i class="fas fa-times"></i>
    </form>

</div> --}}

<!-- home section starts  -->

<section class="home" id="home">

    <h1>EDUCATION FROM HOME</h1>
    <p>IMPROVE YOUR PREPARATION
        FOR BCS & BANK JOB
        WITH QUIZZE</p>
    <a href="#course"><button class="btn">get started</button></a>

    <div class="shape"></div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="image">
        <img src="{{ asset('img/Studying-cuate.svg') }}" alt="">
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>A quiz website can help you gain a better understanding of your customers. It can strengthen your reputation as a brand and help you create stronger relationships by increasing your social media presence. Because quizzes and surveys can be taken from virtually anywhere, they can be very convenient marketing tools beyond typical classroom applications for students and teachers.</p>
        <p>  Personality quizzes are among the most popular types of tests that can engage users and help them learn more about themselves.</p>
        <a href="#"><button class="btn">learn more</button></a>
    </div>

</section>

<!-- about section ends -->

<!-- course section starts  -->

<section class="course" id="course">

<h1 class="heading">Our  Quizzes</h1>

<div class="box-container">

    @foreach ($quizzes as $item)
    <div class="box">
        <img src="{{ asset('img/quiz/'.$item->image) }}" alt="">
        <div class="content">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half"></i>
            </div>
            <a target="_blank" href="{{ route('join.quiz', $item->id) }}" class="title">{{ Str::substr($item->title, 0, 25) }}...</a>
            <p>{{ Str::substr($item->description, 0, 100) }}...</p>
            <div class="info">
                <h3> <i class="far fa-clock"></i> {{ $item->duration }} Minuties</h3>
                <h3> <i class="fas fa-book"></i> {{ App\Models\Question::where('quiz_id', $item->id)->count() }} questions </h3>
            </div>
        </div>
    </div>
    @endforeach

</div>

</section>

<!-- course section ends -->

<!-- teacher section starts  -->

<!-- <section class="teacher" id="teacher">

<h1 class="heading">our expert teachers</h1>

<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At non explicabo tempora modi, reprehenderit ratione sunt ea porro tenetur officiis alias sapiente praesentium voluptas cumque quo maiores dolores totam ex.</p>

<a href="#"><button class="btn">learn more</button></a>

</section>

teacher section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

<h1 class="heading">contact us</h1>

<div class="row">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <form action="{{ route('contact') }}" method="POST">
        @csrf
        <input type="text" placeholder="full name" name="name" class="box" required>
        <input type="email" placeholder="your email" name="email" class="box" required>
        <textarea cols="30" rows="10" name="description" class="box address" placeholder="your address" required></textarea>
        <input type="submit" class="btn" value="send now">
    </form>

    <div class="image">
        <img src="{{ asset('img//contact-img.png') }}" alt="">
    </div>

</div>

</section>

<!-- contact section ends -->

<!-- footer section starts  -->

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>branch locations</h3>
            <a href="#">Dhaka</a>
            <a href="#">Brahmanbaria</a>
            <a href="#">Kishoreganj</a>
            <a href="#">Chittagong</a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">course</a>
            <!-- <a href="#">teachers</a> -->
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <p> <i class="fas fa-map-marker-alt"></i> Dhaka, Mirpur-13. </p>
            <p> <i class="fas fa-envelope"></i> quizee@gmail.com </p>
            <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
        </div>

    </div>

    <h1 class="credit">created by <a href="#">ISTT 16-17 BATCH</a> all rights reserved. </h1>

</div>

<!-- footer section ends -->

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- custom js file link  -->
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
