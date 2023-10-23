<?php

namespace App\Helpers;

class MessagesHelper {
    public static string $REGISTER_SUCCESS = 'Đăng ký tài khoản thành công.';
    public static string $REGISTER_FAIL = 'Thông tin đăng ký không hợp lệ, hãy thử lại.';
    public static string $LOGIN_FAIL = 'Email hoặc Password không đúng! Vui lòng thử lại.';
    public static string $INACTIVE_FAIL = 'Nhân viên hiện đang là trưởng phòng ban, không thể in-active.';
    public static string $REMOVE_FAIL = 'Nhân viên hiện đang là trưởng phòng ban, không thể remove.';
    public static string $CREATE_SUCCESS = 'Thêm mới thành công.';
    public static string $EDIT_SUCCESS = 'Chỉnh sửa thành công.';
    public static string $UPDATE_SUCCESS = 'Cập nhật thành công.';
    public static string $ERROR = 'Đã xảy ra lỗi, vui lòng thử lại.';
    public static string $DELETE_CONFIRM = 'Bạn có chắc muốn xóa không, hành động này không thể khôi phục được!';
}