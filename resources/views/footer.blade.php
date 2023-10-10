<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // xử lý @csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function goBack() {
        window.history.back();
        }

    function reloadPage() {
        location.reload();
    }

    // xóa 1 dòng trg database 
    function RemoveRow(id, url) {
        if(confirm('Xóa danh mục này? hành động này không thể hoàn tác!')) {
            $.ajax({
                type: 'delete',
                datatype: 'JSON',
                data: {id},
                url: url,

                success: function(result) {
                    if(!result.error) {
                        alert(result.message)
                        location.reload()
                    }
                    else {
                        alert('Có lỗi xảy ra! Vui lòng thử lại')
                    }
                }
            })
        }
    }

</script>