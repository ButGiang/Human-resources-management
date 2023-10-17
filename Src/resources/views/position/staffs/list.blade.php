@extends('layout')

@section('content')
    <div class="w-full px-8 py-5">
        <div class="mx-auto mt-3 max-w-screen-lg">
            <div class="flex items-center justify-between">
                <p class="flex-1 text-base text-gray-900">Danh sách nhân viên của chức vụ: <b>{{ $position->name }}</b> </p>

                <div class="mt-4 sm:mt-0">
                    <div class="flex items-center justify-start sm:justify-end">
                        <div class="flex items-center">
                            <a href="/department/detail/{{ $department }}/positions/detail/{{ $position->position_id }}/add" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 mr-3 rounded-lg cursor-pointer">
                                Thêm NV
                            </a>
                        </div>

                        <a href="/department/detail/{{ $department }}/positions/detail/{{ $position->position_id }}/exportExcel"
                        class="inline-flex cursor-pointer items-center rounded-lg border border-gray-400 bg-white py-2 px-3 text-center text-sm font-medium text-gray-800 shadow hover:bg-gray-100 focus:shadow">
                            <svg class="mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" class=""></path>
                            </svg>
                            Xuất file excel
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-4 px-4 py-2 overflow-hidden rounded-lg border shadow">
                <table class="min-w-full">
                    <thead class="border-b">
                        <tr>
                            <td class="px-5 py-3 text-sm font-medium text-gray-500">ID</td>

                            <td width="30%" class="px-5 py-3 text-sm font-medium text-gray-500">Họ & tên</td>

                            <td class="px-5 py-3 text-sm font-medium text-gray-500">Trình độ</td>

                            <td class="px-5 py-3 text-sm font-medium text-gray-500">Option</td>
                        </tr>
                    </thead>

                    <tbody class="lg:border-gray-300">
                        {!! \App\Helpers\positionHelper::staff_list($staffs, $department, $position) !!}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection