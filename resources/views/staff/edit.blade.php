@extends('layout')

@section('content')

<div class="flex items-center justify-center h-screen">
    <form action="" method="POST" class="w-4/5 h-4/5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
        @csrf
        <div class="mb-4">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Họ và tên đệm</label>
                    <input type="text" name="first_name" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter surname" value="{{ $staff->first_name }}">
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Tên</label>
                    <input type="text" name="last_name" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter name" value="{{ $staff->last_name }}">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-8">
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Ngày sinh</label>
                    <input type="date" name="birthday" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $staff->birthday }}">
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Giới tính</label>
                    <select name="gender" class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="" disabled selected>Chọn giới tính</option>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-8">
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Căn cước công dân</label>
                    <input type="number" name="CCCD" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter CCCD" value="{{ $staff->CCCD }}">
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter email" value="{{ $staff->email }}">
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                    <input type="number" name="phone" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter phone number" value="{{ $staff->phone }}">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-8">
                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                    <input type="text" name="address" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter address" value="{{ $staff->address }}">
                </div>

                <div class="col-span-1">
                    <label class="block text-sm font-medium text-gray-700">Ngày tuyển dụng</label>
                    <input type="date" name="recruit_day" 
                    class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" 
                    value="{{ $staff->recruit_day }}">
                </div>
            </div>

            <div class="mt-8 flex justify-between">
                <button type="button" onclick="goBack()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Back
                </button>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Sửa
                </button>
            </div>
        </div>  
    </form>
</div>

@endsection