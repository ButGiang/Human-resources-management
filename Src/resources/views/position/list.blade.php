@extends('layout')

@section('content')
    <div class="w-full px-8 py-5">
        <div class="mx-auto mt-3 max-w-screen-lg">
            <div class="flex items-center justify-between">
                <p class="flex-1 text-base text-gray-900">Danh sách các chức vụ của phòng ban: <b>{{ $department->name }}</b> </p>

                <div class="mt-4 sm:mt-0">
                    <div class="flex items-center justify-start sm:justify-end">
                        <div class="flex items-center">
                            <a href="/department/detail/{{ $department->department_id }}/positions/add" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 mr-3 rounded-lg cursor-pointer">
                                Thêm
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 px-4 py-2 overflow-hidden rounded-lg border shadow">
                <table class="min-w-full">
                    <thead class="border-b">
                        <tr>
                            <td class="px-5 py-3 text-sm font-medium text-gray-500">ID</td>
                            <td class="px-5 py-3 text-sm font-medium text-gray-500">Tên chức vụ</td>
                            <td class="px-5 py-3 text-sm font-medium text-gray-500">Số lượng nhân viên</td>
                            <td class="px-5 py-3 text-sm font-medium text-gray-500">Option</td>
                        </tr>
                    </thead>

                    <tbody class="lg:border-gray-300">
                        {!! \App\Helpers\positionHelper::position_list($positions) !!}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection