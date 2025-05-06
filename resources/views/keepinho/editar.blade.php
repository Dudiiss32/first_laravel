<h1>💡Keepinho</h1>
<form action="{{route('keep.editarGravar')}}" method="post">
    @method('PUT')
    @csrf

    <input type="hidden" name="id" value="{{$nota->id}}">
    <textarea name="texto" id="" cols="30" rows="5">{{$nota->texto}}</textarea>
    <br>
    <br>
    <input type="submit" value="Editar nota">
</form>