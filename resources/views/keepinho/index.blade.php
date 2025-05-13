<h1>💡Keepinho</h1>
<p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>

<hr>

<h2>Gravar uma nova nota</h2>
{{-- Se tiver qualquer erro ele mostra a seguinte mensagem: --}}
@if ($errors->any()) 
    <div style="color: red">
        <h3>Erro!</h3>
    </div>
@endif
<form action="{{route('keep.gravar')}}" method="POST">
    @csrf

    <label for="">Título:</label>
    <input type="text" name="titulo" id="">
    <br>
    <textarea name="texto" id="" cols="30" rows="5"></textarea>
    <br>
    <br>
    <input type="submit" value="Gravar nota">
</form>

<hr>
<div class="body" style="display: flex; flex-direction: row; flex-wrap: wrap;">
    @foreach ($notas as $nota)
        <div style="border: 2px dashed rgb(236, 139, 156); padding: 5px; width: 200px; height: 200px; margin: 5px;">
            {{$nota->titulo}}
            <br>
            {{$nota->texto}}
            <br>
            <a href="{{route('keep.editar', $nota->id)}}">Editar</a>
            <br>
            <form action="{{route('keep.apagar', $nota->id)}}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" value="Apagar">
            </form>
        </div>
    @endforeach
</div>
