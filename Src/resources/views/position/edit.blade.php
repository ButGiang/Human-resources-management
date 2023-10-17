@extends('layout')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST" class="w-1_5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
            @csrf
            <div class="mb-4">
                    <div class="w-full">
                        <label class="block text-sm font-medium text-gray-700">Tên chức vụ</label>
                        <input type="text" name="name" 
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $position->name }}">
                    </div>

                <div class="mt-8 flex justify-between">
                    <button type="button" onclick="goBack()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Back
                    </button>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Cập nhật
                    </button>
                </div>
            </div>  
        </form>
    </div>
@endsection