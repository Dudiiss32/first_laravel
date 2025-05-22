<link rel="stylesheet" href="{{ asset('css/style.css')}}">
<a href="{{route('keep')}}">◀️ Voltar para o início</a>
<h1>💡Keepinho</h1>
<h2>🗑️ Lixeira</h2>
<hr>
@if(session('success'))
<div style="background-color:rgb(46, 216, 103); border: 1px solid green; padding:4px; font-size: :25px; font-weight:bold">
    {{session('success')}}
</div>
@endif
<div class="body" style="display: flex; flex-direction: row; flex-wrap: wrap;">
    @foreach ($notasApagadas as $na)
        <div style="border: 2px dashed rgb(236, 139, 156); padding: 5px; width: 200px; height: 200px; margin: 5px;">
            {{$na->titulo}}
            <br>
            {{$na->texto}}
            <br>
            <a href="{{route('keep.restaurar', $na->id)}}">♻️ Restaurar</a>
        </div>
    @endforeach
</div>




