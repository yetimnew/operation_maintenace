<div class="row">
    <div class="col-md-6">
        <div class="form-group 	required">
            <label class="control-label">ID Number</label>
            <div class="input-group">
                <input name="did" type="text" id="did"
                    class="form-control select {{ $errors->has('did') ? ' is-invalid' : '' }}"
                    value="{{old('did') ?? $driver->driverid}}" onfocusout="validateDid()">
                @if ($errors->has('did'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('did') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label">Full Name</label>

            <div class="input-group">
                <input name="name" type="text" id="name"
                    class="form-control select {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{old('name') ?? $driver->name}}" onfocusout="validateName()">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label">Sex</label>

            <select name="sex" class="form-control select" id="sex" required>
                {{-- <option class="dropup" value="">Select </option> --}}
                <option class="dropup" value="1" selected> Male </option>
                <option class="dropup" value="0"> Female </option>
            </select>

            <small class="form-text text-danger" id="error_sex"></small>

        </div>

        <div class="form-group required">
            <label class="control-label">Birth Date</label>

            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="bdate" type="date" id="bdate"
                    class="form-control select {{ $errors->has('bdate') ? ' is-invalid' : '' }}"
                    value="{{old('bdate') ?? $driver->birthdate}}" onfocusout="validateBdate()">
                @if ($errors->has('bdate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('bdate') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label">Zone</label>

            <div class="input-group">
                <input name="zone" type="text" id="zone"
                    class="form-control select {{ $errors->has('zone') ? ' is-invalid' : '' }}"
                    value="{{old('zone') ?? $driver->zone}}" onfocusout="validateZone()">
                @if ($errors->has('zone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('zone') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Worda</label>

            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="woreda" type="text" id="woreda"
                    class="form-control select {{ $errors->has('woreda') ? ' is-invalid' : '' }}"
                    value="{{old('woreda') ?? $driver->woreda}}" onfocusout="validateWoreda()">
                @if ($errors->has('woreda'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('woreda') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <!--                                          the right side begins here-->
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label"> Kebele</label>

            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="kebele" type="text" id="kebele"
                    class="form-control select {{ $errors->has('kebele') ? ' is-invalid' : '' }}"
                    value="{{old('kebele') ?? $driver->kebele}}" onfocusout="validateKebele()">
                @if ($errors->has('kebele'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kebele') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label"> House Number</label>

            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="hn" type="text" id="hn"
                    class="form-control select {{ $errors->has('hn') ? ' is-invalid' : '' }}"
                    value="{{old('hn') ?? $driver->housenumber}}" onfocusout="validateHn()">
                @if ($errors->has('hn'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('hn') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label"> Mobile Number</label>

            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="mob" type="text" id="mob"
                    class="form-control select {{ $errors->has('mob') ? ' is-invalid' : '' }}"
                    value="{{old('mob') ?? $driver->mobile}}" onfocusout="validateMob()">
                @if ($errors->has('mob'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mob') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
            <small class="form-text text-danger" id="error_mob"></small>

        </div>
        <div class="form-group required">
            <label class="control-label"> Hired Date</label>

            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="hd" type="date" id="hd"
                    class="form-control select {{ $errors->has('hd') ? ' is-invalid' : '' }}"
                    value="{{old('hd') ?? $driver->hireddate}}" onfocusout="validateHd()">

                @if ($errors->has('hd'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('hd') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span> </div>
        </div>
        @section( 'javascript' )
        <script>
            const did = document.getElementById( 'did' );
                            const name = document.getElementById( 'name' );
                            const bdate = document.getElementById( 'bdate' );
                            const zone = document.getElementById( 'zone' );
                            const woreda = document.getElementById( 'woreda' );
                            const kebele = document.getElementById( 'kebele' );
                            const hn = document.getElementById( 'hn' );
                            const mob = document.getElementById( 'mob' );
                            const hd = document.getElementById( 'hd' );
                            // const bdate = document.getElementById( 'bdate' );
                           
                            const driver_reg = document.getElementById( 'driver_reg' );
                    
                            driver_reg.addEventListener( 'submit', function ( event ) {
                                event.preventDefault();
                                if ( 
                                    validateDid() &&
                                    validateName() &&
                                    validateBdate() &&
                                    validateMob() &&
                                    validateHd()
                                ) {
                                    driver_reg.submit();
                                } else {
                                    return false;
                                }
                            } );
                    
                            
                            function validateDid() {
                                if ( checkIfEmpty( did ) ) {
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                            function validateName() {
                                if ( checkIfEmpty( name ) ) {
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                    
                            function validateBdate() {
                                if ( checkIfEmpty( bdate ) ) {
                                    return false;
                                } else {
                                    return true;
                                }
                            }

                            function validateMob() {
                                if ( checkIfEmpty( mob ) ) {
                                    return false;
                                }
                                if ( !meetLength( mob, 10, 11 ) ) {
                                    return false;
                                } else {
                                    return true;
                    
                                }
                            }
                            function validateHd() {
                                if ( checkIfEmpty( hd ) ) {
                                    return false;
                                }else {
                                    return true;
                    
                                } 
                            }
                    
                    //*******************************************************************
                    // Validator functions
                    //*******************************************************************
                    
        </script>

        @endsection