@extends('layouts.app')

@section('title', 'Profile - Quantara')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

<section class="pf-page">

    <button class="pf-back-btn" onclick="history.back()">
        <i data-lucide="arrow-left"></i>
        <span>Kembali</span>
    </button>

    <div class="pf-center-wrap">

        {{-- Avatar --}}
        <div class="pf-avatar-wrap">
            <img src="https://i.pravatar.cc/120" alt="Avatar" class="pf-avatar">
            <div class="pf-avatar-badge">
                <i data-lucide="check"></i>
            </div>
        </div>

        {{-- Logout Button --}}
        <a href="{{ route('logout') }}" class="pf-logout-btn">
            <i data-lucide="log-out"></i>
            <span>Logout</span>
        </a>

    </div>

</section>

@endsection
