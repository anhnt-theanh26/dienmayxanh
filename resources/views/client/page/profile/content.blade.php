 <div class="tab-content" id="myTabUserContent">
     <div class="tab-pane fade show active bg-white" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
         tabindex="0">
         <div class="p-5">
             <h4>Hồ sơ của tôi</h4>
             <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
             <hr>
             <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="mb-3">
                     <input type="text" class="form-control" id="name" name="name"
                         value="{{ Auth::check() ? Auth::user()->name : '' }}" placeholder="Tên...">
                 </div>
                 <div class="mb-3">
                     <input type="email" class="form-control" id="email" name="email"
                         value="{{ Auth::check() ? Auth::user()->email : '' }}" placeholder="Email...">
                 </div>
                 <div class="mb-3">
                     <input type="text" class="form-control" id="phone" name="phone"
                         value="{{ Auth::check() ? Auth::user()->phone : '' }}" placeholder="Số điện thoại...">
                 </div>
                 <div class="mb-3">
                     <input type="date" class="form-control" id="birthday"
                         value="{{ Auth::check() ? Auth::user()->birthday : '' }}" name="birthday"
                         placeholder="Ngày sinh...">
                 </div>
                 <div class="mb-3">
                     <input type="text" class="form-control" id="address" name="address"
                         value="{{ Auth::check() ? Auth::user()->address : '' }}" placeholder="Địa chỉ...">
                 </div>
                 <div class="mb-3">
                     <input type="file" class="form-control" id="image"name="image"
                         placeholder="Ảnh đại diện...">
                     <img src="{{ Auth::check() ? asset(Auth::user()->image) : '' }}" alt="" width="50px"
                         id="img" class="py-1">
                 </div>
                 <button type="submit" class="btn btn-primary">Lưu</button>
             </form>
         </div>
     </div>
     <div class="tab-pane fade bg-white" id="change-password-tab-pane" role="tabpanel"
         aria-labelledby="change-password-tab" tabindex="0">
         <form action="{{ route('profile.password') }}" method="post">
             @csrf
             <div class="p-5">
                 <div class="mb-3">
                     <div class="form-password-toggle">
                         <label class="form-label" for="basic-default-password12">
                             Mật khẩu cũ
                         </label>
                         <div class="input-group">
                             <input type="password" class="form-control" id="basic-default-password12" value=""
                                 placeholder="············" aria-describedby="basic-default-password2"
                                 name="old_password">
                             <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                     <path
                                         d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                     <path
                                         d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                     <path
                                         d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                 </svg>
                             </span>
                         </div>
                     </div>
                 </div>
                 <div class="mb-3">
                     <div class="form-password-toggle">
                         <label class="form-label" for="basic-default-password12">
                             Mật khẩu mới
                         </label>
                         <div class="input-group">
                             <input type="password" class="form-control" id="basic-default-password12" value=""
                                 placeholder="············" aria-describedby="basic-default-password2"
                                 name="new_password">
                             <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                     <path
                                         d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                     <path
                                         d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                     <path
                                         d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                 </svg>
                             </span>
                         </div>
                     </div>
                 </div>
                 <div class="mb-3">
                     <div class="form-password-toggle">
                         <label class="form-label" for="basic-default-password12">
                             Xác nhận mật khẩu
                         </label>
                         <div class="input-group">
                             <input type="password" class="form-control" id="basic-default-password12"
                                 value="" placeholder="············" aria-describedby="basic-default-password2"
                                 name="confirm_password">
                             <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                     fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                     <path
                                         d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                                     <path
                                         d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                                     <path
                                         d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                                 </svg>
                             </span>
                         </div>
                     </div>
                 </div>
                 <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
             </div>
         </form>
     </div>
 </div>
