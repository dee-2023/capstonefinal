@extends('layouts.app')
@section('title', "Packages")
@section('content')
<div class="container">
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                <h3>Travel Packages</h3>
                <h4>Get out there!</h4>
            </div>
            <div class="row mb-5 cstm-height-card">
            @foreach($packages as $package)
            
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/'.$package->image)}}" class="card-img-top" alt="...">
                        <div class="card-title-overlay">
                            <h5 class="card-title">{{ $package->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">8,390 accommodations</p>
                            <a href="{{ route('booknow') }}" class="btn btn-sm btn-primary">Book Now</a>
                            <a href="#" class="btn btn-sm btn-primary learn-more-button"
                                data-modal="modal1"
                                data-title="{{ $package->title }}"
                                data-description="{{ $package->description }}">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="modal" id="modal1">
            <div class="modal-content">
                <h2 id="modalTitle1"></h2>
                <p id="modalDescription1"></p>
                <span class="modal-close-button" id="closeModalButton1">
                    <div class="close-button-box">Close</div>
                </span>
            </div>
        </div>
    </div>
</div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const learnMoreButtons = document.querySelectorAll('.learn-more-button');
            
                learnMoreButtons.forEach(button => {
                    button.addEventListener('click', openModal);
                });
            
                function openModal(event) {
                    const modalId = event.target.getAttribute('data-modal');
                    const modal = document.getElementById(modalId);
                    const modalTitle = modal.querySelector('h2');
                    const modalDescription = modal.querySelector('p');
            
                    const title = event.target.getAttribute('data-title');
                    const description = event.target.getAttribute('data-description');
            
                    modalTitle.textContent = title;
                    modalDescription.textContent = description;
                    modal.style.display = 'block';
            
                    const closeModalButton = modal.querySelector('.modal-close-button');
                    closeModalButton.addEventListener('click', closeModal);
                }
            
                function closeModal() {
                    const modal = this.closest('.modal');
                    modal.style.display = 'none';
                }
            });
        </script>
@endsection