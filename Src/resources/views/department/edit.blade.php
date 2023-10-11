@extends('layout')

@section('content')
    <div class="flex items-center justify-center h-screen">
        <form action="" method="POST" class="w-4/5 h-4/5 p-8 bg-white shadow-md border border-gray-300 rounded-lg">
            @csrf
            <div class="mb-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Tên phòng ban</label>
                        <input type="text" name="name" 
                        class="p-1 mt-3 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter name" value="{{ $department->name }}">
                    </div>

                    <div class="col-span-1 ml-2">
                        <label class="block text-sm font-medium text-gray-700" for="staff">Trưởng phòng</label>
                        <div class="flex items-center mt-3">
                            <div class="min-w-[220px]">{{ $department->manager->first_name. ' '. $department->manager->last_name }}</div>
                            <div class="ml-7 relative">
                                <div id="submenu-button" onclick="displaySubMenu()"
                                class="bg-skyblue text-white py-1 px-2 rounded cursor-pointer">
                                    Thay đổi
                                </div>
                                <div id="submenu" 
                                class="absolute min-w-[170px] h-[200px] w-auto left-13 top-0 p-1 bg-white border border-black rounded shadow-md hidden">
                                    <ul>
                                        @php
                                            foreach($staffs as $staff) {
                                                echo '<li onclick="changeManager()" value="'. $staff->id. '"
                                                     class="px-3 py-2 hover:bg-gray-200 border-b border-gray-100 cursor-pointer rounded">'. 
                                                        $staff->first_name. ' '. $staff->last_name. 
                                                     '</li>';
                                            }
                                        @endphp
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700" for="message">Mô tả</label>
                        <textarea id="message" name="describe" rows="4" 
                        class="block w-full px-4 py-2 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                            {{ $department->describe }}
                        </textarea>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">
                </div>

                <div class="mt-8 flex justify-between">
                    <button type="button" onclick="goBack()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                        Back
                    </button>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Cập nhật
                    </button>
                </div>
            </div>  
        </form>
    </div>


    <script>
        const submenu = document.getElementById('submenu');

        // ẩn hiện sub-menu thay đổi trưởng phòng
        function displaySubMenu() {
            submenu.classList.toggle('hidden');
        }

        // cập nhật trưởng phòng
        const liElements = document.querySelectorAll('#submenu li');
        liElements.forEach(li => {
            li.addEventListener('click', function() {
                const value = this.getAttribute('value');
                var current_url = window.location.href;
                var departmentId = current_url.substring(current_url.lastIndexOf('/') + 1)
                
                const url = '/department/changeManager'
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        department_id: departmentId,
                        manager_id: value
                    })
                })
                .then(response => response.text())
                .then(data => {
                    location.reload(); 
                })
                .catch(error => {
                    console.error(error); 
                });
            });
        });


    </script>
@endsection