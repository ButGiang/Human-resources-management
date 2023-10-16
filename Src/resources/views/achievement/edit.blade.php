@extends('layout')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST" class="w-4/5 h-4/5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
            @csrf
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Tên thành tựu</label>
                        <input type="text" name="name" 
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-md" placeholder="Enter name" value="{{ $achievement->name }}">
                    </div>

                    <div class="col-span-1 ml-3">
                        <label class="block text-sm font-medium text-gray-700" for="staff">thuộc về nhân viên</label>
                        <div class="mt-3">{{ $achievement->staff->first_name. ' '. $achievement->staff->last_name }}</div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700" for="message">Mô tả</label>
                        <textarea id="message" name="describe" rows="4" 
                        class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                            {{ $achievement->describe }}
                        </textarea>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Phần thưởng (đồng)</label>
                        <input type="text" name="reward" 
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-md" placeholder="Enter reward" value="{{ $achievement->reward }}">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Hình ảnh</label>
                        <div class="form-group col-span-4 md:col-span-4">
                            <input type="file" id="upload" name="image" 
                            class="block w-full px-2 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Ngày</label>
                        <input type="date" name="date" 
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-md" 
                        value="{{ $achievement->date }}">
                    </div>
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