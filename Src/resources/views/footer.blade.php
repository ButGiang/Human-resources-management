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
        if(confirm('{{ \App\Helpers\MessagesHelper::$DELETE_CONFIRM }}')) {
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
                        alert('{{ \App\Helpers\MessagesHelper::$ERROR }}')
                    }
                }
            })
        }
    }

    // upload file
    $('#upload').change(function() {
        const form = new FormData()
        form.append('file', $(this)[0].files[0])

        $.ajax({
            processData: false,
            contentType: false,
            type: 'post',
            datatype: 'JSON',
            data: form,
            url: url,

            success: function(result) {
                if(!result.error) {
                    $('#image_show').html(
                        '<a href="' + result.url + '" target="_blank">' +
                            '<img src="' + result.url + '" width="100px"></img></a>')

                    $('#file').val(result.url);
                }
                else {
                    alert('Upload file thất bại!')
                }
            }
        })
    })
</script>