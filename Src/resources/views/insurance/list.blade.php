@extends('layout')

@section('content') 
    <div class="h-screen flex">
        <div class="bg-white p-8 rounded-md w-4 h-full">
            <div class="flex items-center justify-between pb-6">
                <div>
                    <h2 class="text-gray-600 mt-3 font-semibold">Những nhân viên chưa có bảo hiểm:</h2>
                </div>
            </div>

            <div>
                <div class="-mx-4 px-4 mt-2 py-4 overflow-x-auto">
                    <div class="inline-block w-full shadow rounded-lg overflow-hidden">
                        {{-- staff list --}}
                        <table class="w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-yellow text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        STT
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-yellow text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Mã nhân viên
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-yellow text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Họ & Tên
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                {!! \App\Helpers\insuranceHelper::notHaveInsurance_list($notHaveInsurance) !!}
                            </tbody>
                        </table>

                        {{-- footer --}}
                        <div
                            class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                            <span class="text-xs xs:text-sm text-gray-900">
                                Showing 1 to 10 of 50 Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l-full">
                                    Prev
                                </button>
                                &nbsp; &nbsp;
                                <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r-full">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray"></div>

        <div class="bg-white p-8 rounded-md w-6 h-full">
            <div class=" flex items-center justify-between pb-6">
                <div>
                    <h2 class="text-gray-600 font-semibold">Bảo hiểm</h2>
                </div>

                {{-- navbar --}}
                <div class="flex lg:ml-40 ml-10 space-x-8">
                    {{-- search --}}
                    <form action="/insurance/search" method="POST">
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

                    {{-- add --}}
                    <form action="/insurance/add" method="get">
                        @csrf
                        <button type="submit" class="bg-blue-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                            Thêm
                        </button>
                    </form>

                    {{-- reload --}}
                    <button onclick="reloadPage()" class="bg-green-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
                        <i class="fas fa-sync"></i>
                    </button>
                </div>
            </div>

            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        {{-- staff list --}}
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-skyblue text-left text-xs font-semibold text-white uppercase tracking-wider">
                                        STT
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-skyblue text-left text-xs font-semibold text-white uppercase tracking-wider">
                                        Họ & Tên
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-skyblue text-left text-xs font-semibold text-white uppercase tracking-wider">
                                        Mã bảo hiểm
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-skyblue text-left text-xs font-semibold text-white uppercase tracking-wider">
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                {!! \App\Helpers\insuranceHelper::insurance_list($insurances) !!}
                            </tbody>
                        </table>

                        {{-- footer --}}
                        <div
                            class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                            <span class="text-xs xs:text-sm text-gray-900">
                                Showing 1 to 10 of 50 Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l-full">
                                    Prev
                                </button>
                                &nbsp; &nbsp;
                                <button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r-full">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection