@extends('products.layout')
<html>

<head>
    <title>Lista de produtos</title>
</head>

<body>
    <div class='flex justify-center h-screen'>
        <div class='flex-col justify-center w-full lg:w-4/5 2xl:w-3/5'>
            <div class="flex flex-col justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <h1 class="text-[32px]">Produtos</h1>
                <h2 class="text-[18px]">
                    (Selecione os produtos abaixo para editar ou crie um novo.)
                </h2>
            </div>
            <div class="flex justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <div class="w-96">
                    <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Criar novo produto
                    </a>
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="flex justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <div class="w-96">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                </div>
            </div>
            @endif

            <div class="flex justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <div class="w-full">
                    <table class="table-auto border w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">Descrição</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="even:bg-gray-300 odd:bg-gray-100">
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->description }}</td>
                                <td class="border px-4 py-2 flex gap-2 justify-center items-center">
                                    <div>
                                        <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Editar
                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
