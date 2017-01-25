@extends('layouts.backend')

@section('content')

    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <div class="nav-item">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <router-link to="/" class="nav-item is-tab" exact>Home</router-link>
                <router-link to="/posts" class="nav-item is-tab">Posts</router-link>
            </div>
        </div>
    </nav>

    <div id="container-views" class="container">

        <router-view></router-view>

    </div>

@endsection

