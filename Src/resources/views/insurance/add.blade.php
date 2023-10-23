@extends('layout')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST" class="w-4/5 h-4/5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
            @csrf
            <div class="mb-4">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-1 ml-2">
                        <label class="block text-sm font-medium text-gray-700" for="staff">Thuộc về nhân viên</label>
                        <div class="flex items-center mt-3">
                            <select name="staff" required
                            class="block w-4/5 p-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                                @foreach($staffs as $staff)
                                    <option value="{{ $staff->id }}">
                                        {{ $staff->first_name. ' '. $staff->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Mã bảo hiểm</label>
                        <input type="number" name="insurance_id" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter surname" value="{{ old('insurance_id') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Ngày đăng ký</label>
                        <input type="date" name="registration_date" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" value="{{ old('registration_date') }}">
                    </div>

                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Nơi đăng ký</label>
                        <input type="text" name="register_place" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter register place" value="{{ old('register_place') }}">
                    </div>

                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Nơi khám bệnh</label>
                        <input type="text" name="hospital" required
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter hospital" value="{{ old('hospital') }}">
                    </div>
                </div>

                <div class="mt-12 flex justify-between">
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