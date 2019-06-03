@extends('main')

@section('title', '| Contact')

@section('content')

    {{-- <div class="box">
        <article class="media">
          <div class="media-content">
            <div class="content">
              <p>
                <strong>Reza Hadzri</strong> <small>@re-juan-hardy</small><small>31m</small>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
              </p>
              <a class="button is-primary">Primary</a>
            </div>
          </div>
        </article>
    </div> --}}
    <div class="columns is-centered">
        <div class="column is-half">
            <div class="card is-medium">
                <header class="card-header">
                    <p class="card-header-title">
                        Contact Us
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        For more info, you cn click on the links below.
                    </div>
                </div>
                <footer class="card-footer">
                    <a href="https://github.com/reyhardy" class="card-footer-item">
                        <i class="fab fa-github fa-lg"></i>Reyhardy
                    </a>
                    <a href="https://www.facebook.com/reza.hadzri" class="card-footer-item">
                        <span style="color:#428cf4">
                            <i class="fab fa-facebook-square fa-lg"></i>
                        </span>
                        Reza Hadzri
                    </a>
                </footer>
            </div>
        </div>
    </div>


@endsection

