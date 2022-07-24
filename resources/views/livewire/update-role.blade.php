<div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <div class="feature">
            <h3 class="feature__title">Choose your role</h3>
            <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                <form>
                    {{$role_id}}
                    <div class="sign__group">
                        <select wire:model="role_id" name="role_id" id="select" class="sign__select">
                            <option value="">Choose</option>
                            <option value="1">Customer</option>
                            <option value="2">Artist</option>

                        </select>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
