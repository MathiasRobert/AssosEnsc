@extends('layouts.front')

@section('content')

    <div class="section">
        <div class="container">
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            @if(Auth::guest())
                <a href="{{ route('logintest') }}" class="btn">Connexion test</a>
            @endif
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Réalisé par
                <a href="http://www.linkedin.com/in/mathias-robert-7a5589148" target="_blank">Mathias Robert</a>.
            </div>
        </div>
    </footer>

@endsection

