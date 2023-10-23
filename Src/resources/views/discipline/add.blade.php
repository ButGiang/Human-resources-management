@extends('layout')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST" class="w-4/5 h-4/5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
            @csrf
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Lý do kỷ luật</label>
                        <input type="text" name="name" required 
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter name" value="{{ old('name') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700" for="staff">kỷ luật nhân viên</label>
                        <select name="staff" required
                        class="block w-full px-2 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                          @foreach($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->first_name. ' '. $staff->last_name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700" for="message">Chi tiết</label>
                        <textarea name="describe" rows="4" 
                        class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">{{ old('describe') }}</textarea>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Tiền phạt (đồng)</label>
                        <input type="number" name="punish" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter reward" value="{{ old('reward') }}">
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
                        <input type="date" name="date" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" 
                        value="{{ $today }}">
                    </div>
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