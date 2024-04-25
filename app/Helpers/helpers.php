<?php
use Illuminate\Support\Facades\Auth;
function permission_check($permission){
    if (!Auth::user()->hasPermissionTo($permission)) {
        flash()->addError('Something wrong!');
        return redirect()->back();
    }
}