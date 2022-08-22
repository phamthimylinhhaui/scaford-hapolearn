<div style="font-size: 16px; text-align: center; line-height: 2">
    <h2>Xin chào {{ $user->full_name }} !</h2>
    <div>
        <p>Email này giúp bạn lấy lại mật khẩu tài khoản đã bị quên</p>
        <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu</p>
        <p>
            <button>
                <a href="{{ route('password.reset', ['token'=>$user->remember_token, 'user_id'=>$user->id, ]) }}">
                    Đặt lại mật khẩu
                </a>
            </button>
        </p>
    </div>
</div>
