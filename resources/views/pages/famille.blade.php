@extends('layouts.front')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 classement-familles">
                    <h2 class="title">Classements des familles</h2>
                    <div id="chart">
                        <img src="/images/crown.png" class="crown">
                        @foreach($familles as $f)
                            <div class="bar {{ $f->nom }}" style="width: 50px; height: {{ $f->pourcentage }}%; left: {{ $f->id * 70 }}px;"></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <h4 class="title">Dernières actions</h4>
                <table class="table table-shopping table-center">
                    <tbody>
                    @foreach ($actions as $a)

                        <tr data-date="{!! $a->quand !!}" class='clickable-row'>
                            <td class="text-date text-center ">
                                {!! $a->quand !!}
                            </td>
                            <td>
                                {!! $a->qui !!}
                            </td>
                            <td class="td-name">
                                {!! $a->quoi !!}
                            </td>
                            <td class="td-number">
                                {!! $a->points !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
                </script>
                , Réalisé par
                <a href="http://www.linkedin.com/in/mathias-robert-7a5589148" target="_blank">Mathias Robert</a>.
            </div>
        </div>
    </footer>

@endsection

