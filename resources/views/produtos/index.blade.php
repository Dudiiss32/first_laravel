<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Produtos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <x-link-button href="{{route('produtos.create')}}">
                        + Produto
                    </x-link-button>

                    <h3>Filtrar por categoria</h3>
                    <form action="" method="get">
                        <select name="id_categoria" id="">
                            @foreach ($categorias as $cat)
                                <option value="{{$cat->id}}">{{$cat->nome}}</option>
                            @endforeach
                        </select>
                        <button type="submit">Filtrar</button>
                    </form>
                    
                    <br>

                    <h1>Seus Produtos</h1>
                    <div class="produtos" >
                        @foreach ($produtos as $produto)
                            <div class="produto">
                                <ul>
                                    <li><h2>{{$produto->nome}}</h2></li>
                                    <li><img src="{{asset('storage/'. $produto->imagem)}}" alt="Imagem de {{$produto->nome}}" ></li>
                                    <li>R${{$produto->preco}},00</li>
                                    <li>Categoria: {{$produto->categoria->nome}}</li>
                                    <li>Descrição: {{$produto->descricao}}</li>
                                    <li><a href="{{route('carrinho.store', $produto->id)}}">Adicionar ao carrinho</a></li>
                                    <form action="{{route('produtos.destroy', $produto->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Remover item">
                                    </form>
                                </ul>
                                
                            </div>    
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>
