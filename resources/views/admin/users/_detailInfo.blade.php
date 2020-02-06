<div class="col-lg-6 col-xl-6">
    <div class="card">
        <div class="card-header bg-white">
            <h4 class="card-title">{{ trans('user.detailInf') }}</h4>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="country">{{ trans('user.form.country.title') }}
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           id="country" name="profile[country]"
                           placeholder="{{ trans('user.form.country.holder') }}"
                           value="{{ old("profile.country") }}"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="phone">{{ trans('user.form.phone.title') }}
                </label>
                <div class="col-lg-10">
                    <input type="text"
                           class="form-control"
                           id="phone"
                           name="profile[phone]"
                           placeholder="{{ trans('user.form.phone.holder') }}"
                           value="{{ old("profile.phone") }}"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="state">{{ trans('user.form.state.title') }}
                </label>
                <div class="col-lg-10">
                    <input type="password"
                           class="form-control"
                           id="state"
                           name="profile[state]"
                           placeholder="{{ trans('user.form.state.holder') }}"
                           value="{{ old("profile.state") }}"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="address">{{ trans('user.form.address.title') }}
                </label>
                <div class="col-lg-10">
                    <textarea
                        name="profile[address]"
                        class="form-control"
                        id="address"
                        placeholder="{{ trans('user.form.address.holder') }}"
                        value="{{ old("profile.address") }}"
                    >
                        {{ old("profile.address") }}
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="address">{{ trans('user.form.image.title') }}
                </label>
                <div class="custom-file col-lg-10">
                    <input type="file" class="custom-file-input" name="profile[avatar]">
                    <label class="custom-file-label">{{ trans('user.form.image.holder') }}</label>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
