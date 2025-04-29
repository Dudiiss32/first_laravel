<h1>💡Keepinho</h1>
<p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o Google).</p>

<hr>

<h2>Gravar uma nova nota</h2>
<form action="{{route('keep.gravar')}}" method="POST">
    @csrf

    <textarea name="texto" id="" cols="30" rows="5"></textarea>
    <br>
    <br>
    <input type="submit" value="Gravar nota">
</form>

<hr>

@foreach ($notas as $nota)
    <div style="border: 2px dashed rgb(236, 139, 156); padding: 5px; width: 200px; height: 200px; margin: 5px;">
        {{$nota->texto}}
    </div>
@endforeach