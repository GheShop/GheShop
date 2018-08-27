@extends('admin.dashboard')
@section('pageContent')
    <div class="row">
        <div class="col-md-4 col-sm-3"></div>
        <div class="col-md-4 col-sm-6 change_password">
            <h3>CHANGE PASSWORD</h3>
            @if(isset($message) && $message === 'success')
                <div>Doi mat khau thanh cong</div>
            @else
                <form action="{{route('user.post.changePassword')}}" method="POST">
                    @csrf
                    <div class="form-group pass_show">
                        <input type="password" value="" class="form-control" placeholder="Current Password" name="currentPassword">
                        @if($errors->has('currentPassword'))
                            <p style="color:red;font-size: 0.8em;margin: 3px auto">{{$errors->first('currentPassword')}}</p>
                        @elseif ($errors->has('equal'))
                            <p style="color:red;font-size: 0.8em;margin: 3px auto">{{$errors->first('equal')}}</p>
                        @endif
                    </div>
                    <span class="erro_miss curent_password"></span>
                    <div class="form-group pass_show">
                        <input id="curent_password" type="password" value="" class="form-control" placeholder="New Password" name="newPassword">
                        @if($errors->has('currentPassword'))
                            <p style="color:red;font-size: 0.8em;margin: 3px auto">{{$errors->first('currentPassword')}}</p>
                        @endif
                    </div>
                    <span class="erro_miss new_password">Mat khau chua chinh xac</span>
                    <div class="form-group pass_show">
                        <input id="new_password" type="password" value="" class="form-control" placeholder="Confirm Password" name="confirmPassword">
                        @if($errors->has('confirmPassword'))
                            <p style="color:red;font-size: 0.8em;margin: 3px auto">{{$errors->first('confirmPassword')}}</p>
                        @endif
                    </div>
                    <span class="erro_miss confirm_password"></span>
                    <div>
                        <input id="confirm_password" type="submit" class="submit_change_password">
                    </div>
                </form>
            @endif
        </div>
        <div class="col-md-4 col-sm-3"></div>
    </div>
@endsection