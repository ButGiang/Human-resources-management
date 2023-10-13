@extends('layout')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST" class="w-4/5 h-4/5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
            @csrf
            <div class="mb-4">
                <div class="col-span-1 ml-2">
                    <label class="block text-sm font-medium text-gray-700" for="staff">Thêm nhân viên cho phòng ban</label>
                    <div class="flex items-center mt-3">
                        <div class="min-w-[220px]">{{ $department->name }}</div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="flex items-center mt-3">
                        <select id="department" name="department" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Chọn phòng ban</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">
                </div>

                <div class="mt-8 flex justify-between">
                    <button type="button" onclick="goBack()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Back
                    </button>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Thêm
                    </button>
                </div>
            </div>  
        </form>
    </div>
@endsection