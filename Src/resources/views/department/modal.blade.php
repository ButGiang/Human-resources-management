@extends('layout')

@section('content') 
    <div class="flex items-center justify-center h-screen w-full bg-gray-200">
        <div id="department-modal" class="bg-white p-8 rounded shadow-lg w-[500px] h-[250px] relative">
            <div>
                <a href="{{ route('departmentList') }}" class="absolute top-0 right-0 mt-3 mr-4 text-gray-600 cursor-pointer">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <div class="text-xl mt-4">Phòng ban: <span class="font-bold ">{{ $department->name }}</span></div>
            <div class="flex justify-center items-center mt-12">
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2 flex items-center">
                    <i class="fas fa-user-tag mr-3"></i>
                    <p>Nhân viên thuộc phòng ban</p>
                </a>
                <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2 flex items-center">
                    <i class="fas fa-tag mr-3"></i>
                    <p>Các chức vụ của phòng ban</p>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Đóng modal detail của phòng ban khi nhấp chuột ra ngoài
        const modal = document.getElementById('department-modal');
        document.addEventListener('click', function(event) {
            // Kiểm tra xem người dùng đã nhấp vào phần tử bên ngoài modal hay không
            if(event.target !== modal) {
                window.location.href = "{{ route('departmentList') }}";
            }
        });
    </script>
@endsection

