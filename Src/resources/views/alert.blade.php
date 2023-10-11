@if($errors->any())
    <div class="bg-red-500 text-white px-4 py-2 mb-4 rounded alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="bg-red-500 text-white px-4 py-2 mb-4 rounded alert">
        {{ Session::get('error') }}
    </div>
@endif

@if (Session::has('success'))
    <div class="bg-green-500 text-white px-4 py-2 mb-4 rounded alert">
        {{ Session::get('success') }}
    </div>
@endif

<script>
    // Hàm để ẩn thông báo sau thời gian nhất định
    function hideAlert(alertElement) {
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 4000);
    }

    // Ẩn các thông báo sau 4 giây khi trang tải xong
    document.addEventListener('DOMContentLoaded', function() {
        var alerts = document.getElementsByClassName('alert');

        for (var i = 0; i < alerts.length; i++) {
            hideAlert(alerts[i]);
        }
    });
</script>