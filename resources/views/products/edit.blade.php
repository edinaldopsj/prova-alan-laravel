@extends('products.layout')
<html>

<head>
    <title>Edição de produto</title>
</head>

<body>
    <div class='flex justify-center h-screen'>
        <div class='flex-col justify-center w-full lg:w-4/5 2xl:w-3/5'>
            <div class="flex flex-col justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <h1 class="text-[32px]">Editar produto</h1>
                <h2 class="text-[18px]">
                    (Preencha os dados abaixo para editar o produto)
                </h2>
            </div>

            @if ($errors->any())
            <div class="flex justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <div class="w-96">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <div class="flex justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <form action="{{ route('products.update', $product->id) }}" method="POST" class="w-full">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col justify-center">
                        <div class="flex flex-col justify-center">
                            <label for="name" class="text-[18px]">Nome</label>
                            <input type="text" name="name" id="name" class="border border-gray-400 p-2 rounded-lg mt-2" placeholder="Nome do produto" value="{{ $product->name }}" required>
                        </div>
                        <div class="flex flex-col justify-center mt-4">
                            <label for="description" class="text-[18px]">Descrição</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="border border-gray-400 p-2 rounded-lg mt-2" placeholder="Descrição do produto" required>{{ $product->description }}</textarea>
                        </div>
                        <div class="flex justify-center mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Editar produto
                            </button>
                        </div>
                    </div>
            </div>
            <div class="flex justify-center mt-8 pt-4 px-4 md:px-16 md:text-center">
                <div class="w-96">
                    <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
