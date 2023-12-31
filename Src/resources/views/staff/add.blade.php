@extends('layout')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST" enctype="multipart/form-data"
        class="w-4/5 h-4/5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
            @csrf
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Họ và tên đệm</label>
                        <input type="text" name="first_name" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter surname" value="{{ old('first_name') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Tên</label>
                        <input type="text" name="last_name" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter name" value="{{ old('last_name') }}">
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Ngày sinh</label>
                        <input type="date" name="birthday" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('birthday') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Giới tính</label>
                        <div class="mt-3">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="1" class="form-radio border-gray-300 shadow-sm">
                                <span class="ml-2">Nam</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" name="gender" value="0" class="form-radio border-gray-300 shadow-sm">
                                <span class="ml-2">Nữ</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Avatar</label>
                        <div class="form-group col-span-4 md:col-span-4">
                            <input type="file" name="image" 
                            class="block w-full px-2 py-2 mt-1 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Căn cước công dân</label>
                        <input type="number" name="CCCD" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter CCCD" value="{{ old('CCCD') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter email" value="{{ old('email') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                        <input type="number" name="phone" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter phone number" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                        <input type="text" name="address" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter address" value="{{ old('address') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Ngày tuyển dụng</label>
                        <input type="date" name="recruit_day" required
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