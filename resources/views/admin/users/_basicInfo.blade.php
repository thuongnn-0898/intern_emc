<div class="col-lg-6 col-xl-6">
    <div class="card">
        <div class="card-header bg-white">
            <h4 class="card-title">{{ trans('user.baseInf') }}</h4>
        </div>
        <div class="card-body">
            <div class="form-group row ">
                @isset($user)
                    <img src="{{ asset($user->imageDefault()) }}" class="img-fluid m-auto default-img-lg"/>
                @endisset
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="name">{{ trans('user.form.name.title') }}
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           id="name" name="name"
                           placeholder="{{ trans('user.form.name.holder') }}"
                           value="{{ isset($user) ? $user->name : old('name') }}"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="email">{{ trans('user.form.email.title') }}
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="{{ trans('user.form.email.holder') }}"
                           value="{{ isset($user) ? $user->email : old('email') }}"
                    >
                </div>
            </div>
            @if(!isset($user)))
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label" for="password">{{ trans('user.form.password.title') }}
                    </label>
                    <div class="col-lg-10">
                        <input type="password"
                               class="form-control"
                               id="password"
                               name="password"
                               placeholder="{{ trans('user.form.password.holder') }}"
                               value="{{ old('password') }}"
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label" for="password_confirmation">{{ trans('user.form.password_confirm.title') }}
                    </label>
                    <div class="col-lg-10">
                        <input type="password"
                               class="form-control"
                               id="password_confirmation"
                               name="password_confirmation"
                               placeholder="{{ trans('user.form.password_confirm.holder') }}"
                               value="{{ old('password_confirmation') }}"
                        >
                    </div>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="role">{{ trans('user.form.role') }}
                </label>
                <div class="col-lg-10">
                    <select class="form-control" id="role" name="role">
                        <option value="">---</option>
                        @foreach(\App\Enums\UserRole::toArray() as $k => $val)
                            <option value="{{$val}}" {{ selectedInput($val, isset($user) ? $user->role : old('role')) }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="status">{{ trans('user.form.status') }}
                </label>
                <div class="col-lg-10">
                    <select class="form-control" id="status" name="status">
                        <option value="">---</option>
                        @foreach(\App\Enums\UserStatus::toArray() as $k => $val)
                            <option value="{{$val}}" {{ selectedInput($val, isset($user) ? $user->status : old('status')) }}>{{ $k }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
