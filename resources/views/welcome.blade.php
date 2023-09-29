@extends('layouts.app')
@section('content')
<header class="site-header">
    <h1 class="header-title">Welcome to Our Travel Website</h1>
</header>

    <section class="featured-destinations">
    <h2>Featured Destinations</h2>
    <div class="carousel-container">
        <div class="carousel-slides">
            <div class="carousel-slide">
                <img src="./img/carousel1.jpg">
            </div>
            <div class="carousel-slide">
                <img src="../img/carousel2.jpg">
            </div>
            <div class="carousel-slide">
                <img src="../img/carousel3.jpg">
            </div>
            <div class="carousel-slide">
                <img src="../img/carousel4.jpg">
            </div>
            <div class="carousel-slide">
                <img src="../img/carousel5.jpg">
            </div>">
            </div>

        </div>
    </div>
</section>

<section class="popular-tours">
    <h2 class="section-title">Enhance your trip the way you like it</h2>
    <div class="tour-cards">
        <div class="tour-card">
            <a href="#" data-description="Description for Tours and Attraction">
                <img src="{{ asset('../img/tagaytay.png') }}" alt="package 1">
                <h3>Tours and Attraction</h3>
            </a>
        </div>
        <div class="tour-card">
            <a href="#" data-description="Description for Fun activities">
                <img src="{{ asset('../img/kyoto.png') }}" alt="package 2">
                <h3>Fun activities</h3>
            </a>
        </div>
        <div class="tour-card">
            <a href="#" data-description="Description for Travel Insurance">
                <img src="{{ asset('/img/insurance.png') }}" alt="package 3">
                <h3>Travel Insurance</h3>
            </a>
        </div>
    </div>
</section>

<div id="tourModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <div id="modalContent">

        </div>
    </div>
</div> 
<section class="booking">
    <h2 class="section-book">Book Your Travel Package</h2>
    <div class="booking-form">
        <form action="{{ url('packages') }}" method="GET">
            <div class="form-group">
                <label for="package">Select a Package:</label>
                <select name="package" id="package">
                    <option value="package1">Package 1</option>
                    <option value="package2">Package 2</option>
                    <option value="package3">Package 3</option>
                    <option value="package4">Package 4</option>
                    <option value="package5">Package 5</option>
                    <option value="package6">Package 6</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Book Now</button>
            </div>
        </form>
    </div>
</section>

<script>
    // Tours modal functionality
    document.addEventListener("DOMContentLoaded", function () {
        const tourCards = document.querySelectorAll(".tour-card a");
        const tourModal = document.querySelector("#tourModal");
        const closeModalButton = document.querySelector("#closeModal");
        const modalContent = document.querySelector("#modalContent");

        function openTourModal(event) {
            event.preventDefault();
            const tourLink = event.currentTarget;
            const tourTitle = tourLink.querySelector("h3").textContent;
            const tourDescription = tourLink.getAttribute("data-description");

            modalContent.innerHTML = `<h2>${tourTitle}</h2><p>${tourDescription}</p>`;

            tourModal.style.display = "block";
        }

        function closeTourModal() {
            tourModal.style.display = "none";
        }

        tourCards.forEach((tourCard) => {
            tourCard.addEventListener("click", openTourModal);
        });

        closeModalButton.addEventListener("click", closeTourModal);
    });

   
//carousel-slides
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-slide');
const totalSlides = slides.length;

function showSlide(n) {
    if (n < 0) {
        n = totalSlides - 1;
    } else if (n >= totalSlides) {
        n = 0;
    }
    const transformValue = -n * 100 + '%';
    document.querySelector('.carousel-slides').style.transform = `translateX(${transformValue})`;
    currentSlide = n;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

showSlide(0);

setInterval(nextSlide, 3000);
    </script>
</div>



@endsection


