@extends('layouts.app')

@section('title', 'Register - Delany Dessert')

@section('content')
{{-- <div class="header-section">
    <h1>Daftar Akun Baru</h1>
    <p>Bergabung dengan Delany Dessert untuk pengalaman berbelanja yang lebih baik</p>
</div> --}}

<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i>Daftar Akun Baru</h4>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Username ini akan digunakan untuk login</small>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Minimal 8 karakter</small>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" 
                                   id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Sudah punya akun? 
                                <a href="{{ route('login') }}" class="text-primary">Login di sini</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
    border: none;
    margin-top: 40px;
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    border: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.form-control {
    border-radius: 10px;
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(139, 115, 85, 0.25);
}
</style>
@endsection