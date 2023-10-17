@extends('layout')

@section('content')
    <div class="w-full px-8 py-5">
        <div class="mx-auto mt-3 max-w-screen-lg">
            <div class="flex items-center justify-between">
                <p class="flex-1 text-base text-gray-900">Danh sách các chức vụ của phòng ban: <b>{{ $department->name }}</b> </p>

                <div class="flex lg:ml-40 ml-10 space-x-8">
                    <form action="/department/detail/{{ $department->department_id }}/positions/search" method="POST">
                        @csrf
                        <div class="flex items-center justify-between border border-black-50 rounded-md">
                            <div class="flex bg-gray-50 items-center p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                                <input class="bg-gray-50 outline-none ml-1 block " type="text" name="search" placeholder="Tìm kiếm...">
                            </div>
                        </div>
                    </form>
                
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