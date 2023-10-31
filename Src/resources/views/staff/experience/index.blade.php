@extends('layout')

@section('content')
    <div class="bg-white p-8 rounded-md w-full h-full">
        <div class=" flex items-center justify-between pb-6">
            <h2 class="text-gray-600 font-semibold">Kinh nghiệm làm việc - {{ $staff->first_name. ' ' . $staff->last_name }}</h2>
        </div>
        
        <div class="w-full flex justify-center bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            STT
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Loại
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tên
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Ngày hoàn thành
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            
                        </th>
                    </tr>
                </thead>
        
                <tbody class="bg-white divide-y divide-gray-200">
                        {!! \App\Helpers\experienceHelper::experience_list($experiences) !!}
                </tbody>
            </table>
        </div>
    </div>

@endsection