<link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Carrinho
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    

                    @if (count($carrinho) > 0)
                        <h1>Seus Produtos do carrinho</h1>
                        <div class="produtos" style="display: flex; flex-direction: column; gap: 20px;">
                           
                            @foreach ($carrinho as $id => $produto)
                                <div class="produto" style="border: 1px white solid">
                                    <ul>
                                        <li><h2>{{$produto['nome']}}</h2></li>
                                        <li><img src="{{asset('storage/'. $produto['imagem'])}}" alt="Imagem de {{$produto['nome']}}" ></li>
                                        <li>{{$produto['preco']}}</li>
                                        <li>{{$produto['descricao']}}</li>
                                      
                                        <form action="{{route('carrinho.delete', $produto['id'])}}" method="get">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="Remover item">
                                        </form>
                                  
                                    </ul>
                                    
                                </div>    
                            @endforeach
                            
                        </div>
                    @else
                        <h1>Ainda não há produtos no seu carrinho.</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>  
</x-app-layout>
