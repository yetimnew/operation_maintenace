<div class="row">
    <div class="col-md-6">
        <div class="form-group required">
            <label class="control-label">Load Type</label>
            <select name="chinet" class="form-control select  {{ $errors->has('chinet') ? ' is-invalid' : '' }}"
                id="chinet" onfocusout="validateChinet()">
                @if ($performance->LoadType == 0)
                <option class="dropup" value="0" selected> Return Load </option>
                <option class="dropup" value="1"> Main Load</option>
                @endif
                @if ($performance->LoadType == 1)
                <option class="dropup" value="1" selected> Main Load</option>
                <option class="dropup" value="0">Return Load</option>
                @endif
            </select>
            @if ($errors->has('chinet'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('chinet') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group required">
            <label class="control-label">FO Number</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="fo" type="text" required class="form-control {{ $errors->has('fo') ? ' is-invalid' : '' }}"
                    id="fo" placeholder="Fright order number" value="{{ old('fo') ?? $performance->FOnumber }}"
                    onfocusout="validateFo()">
                @if ($errors->has('fo'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fo') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label">Operation ID</label>
            <select name="operation" class="form-control {{ $errors->has('operation') ? ' is-invalid' : '' }} select"
                id="operation" value="{{ old('operation') }} " onfocusout="validateOperation()">
                <option class="dropup" value="" selected> Select One</option>
                @foreach ($operations as $operation)
                <option class="dropup" value="{{$operation->id}}"
                    {{ $operation->id == $performance->operation_id ? 'selected' : '' }}> {{$operation->operationid}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('operation'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('operation') }}</strong>
            </span>
            @endif

            <span class="invalid-feedback" role="alert"></span>


        </div>
        <div class="form-group required">
            <label class="control-label">Driver and Truck</label>
            <select name="truck" class="form-control {{ $errors->has('truck') ? ' is-invalid' : '' }} select" id="truck"
                onfocusout="validateTruck()">
                <option class="dropup" value="" selected> Select One</option>
                @foreach ($trucks as $truck)
                <option class="dropup" value="{{$truck->id}}"
                    {{$truck->id == $performance->driver_truck_id ? 'selected' : '' }}>
                    {{$truck->plate}}-{{$truck->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('truck'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('truck') }}</strong>
            </span>
            @endif

            <span class="invalid-feedback" role="alert"></span>
        </div>

        <div class="form-group required">
            <label class="control-label">Date Dispach</label>
            <div class="input-group">
                <input name="ddate" type="text" class="form-control {{ $errors->has('ddate') ? ' is-invalid' : '' }}"
                    id="ddate" value="{{ old('ddate' ) ?? $performance->DateDispach}}" onfocusout="validateDdate()">
                <div class="input-group-append">
                    <button type="button" id="toggle" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if($errors->has('ddate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ddate') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group required">
            <label class="control-label">Origion Place</label>
            <select name="origion" class="form-control{{ $errors->has('origion') ? ' is-invalid' : '' }} select"
                id="origion" onfocusout="validateOrigion()">
                <option class="dropup" value="" selected> Select One</option>
                @foreach ($place as $operation)
                <option class="dropup" value="{{$operation->id}}"
                    {{$operation->id == $performance->orgion_id ? 'selected' : '' }}> {{$operation->name}} </option>
                @endforeach
            </select>
            @if ($errors->has('origion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('origion') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>
        <div class="form-group required">
            <label class="control-label">Destination Place</label>
            <select name="destination"
                class="form-control {{ $errors->has('destination') ? ' is-invalid' : '' }} select" id="destination"
                onfocusout="validateDestination()">
                <option class="dropup" value="" selected> Select One</option>
                @foreach ($place as $operation)
                <option class="dropup" value="{{$operation->id}}"
                    {{$operation->id == $performance->destination_id ? 'selected' : '' }}> {{$operation->name}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('destination'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('destination') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert"></span>
        </div>

        <div class="form-group required">
            <label class="control-label">Distance with cargo</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="diswc" type="number" class="form-control {{ $errors->has('diswc') ? ' is-invalid' : '' }}"
                    id="diswc" value="{{ old('diswc') ?? $performance->DistanceWCargo}}" onfocusout="validateDisw()">
                @if ($errors->has('diswc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('diswc') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">Distance without cargo</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="diswoc" type="number"
                    class="form-control {{ $errors->has('diswoc') ? ' is-invalid' : '' }}" id="diswoc"
                    value="{{ old('diswoc') ?? $performance->DistanceWOCargo}}" onfocusout="validateDiswoc()">
                @if($errors->has('diswoc'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('diswoc') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">Cargo Volume In Tone</label>
            <div class="input-group"> <span class="input-group-addon"></span>

                <input name="cargovol" type="number"
                    class="form-control {{ $errors->has('cargovol') ? ' is-invalid' : '' }}" id="cargovol"
                    value="{{ old('cargovol') ?? $performance->CargoVolumMT}}" onfocusout="validateCargovol()">
                @if($errors->has('cargovol'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cargovol') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <legend> Expenses</legend>
        <div class="form-group">
            <label class="control-label"> Fuel In Litter</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="fuell" type="number" class="form-control {{ $errors->has('fuell') ? ' is-invalid' : '' }}"
                    id="fuell" value="{{ old('fuell') ?? $performance->fuelInLitter}}" onfocusout="validateFuell()">
                @if($errors->has('fuell'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fuell') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label"> Fuel In Birr</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="fuelb" type="number" class="form-control{{ $errors->has('fuelb') ? ' is-invalid' : '' }}"
                    id="fuelb" value="{{ old('fuelb') ?? $performance->fuelInBirr}}" onfocusout="validateFuelb()">
                @if($errors->has('fuelb'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fuelb') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label"> Perdiem</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="perdiem" type="number"
                    class="form-control {{ $errors->has('perdiem') ? ' is-invalid' : '' }}" id="perdiem"
                    value="{{ old('perdiem') ?? $performance->perdiem}}" onfocusout="validatePerdiem()">
                @if($errors->has('perdiem'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('perdiem') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">Operational Expense</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="wog" type="number" class="form-control {{ $errors->has('wog') ? ' is-invalid' : '' }}"
                    id="wog" value="{{ old('wog') ?? $performance->workOnGoing}}" onfocusout="validateWog()">
                @if($errors->has('wog'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('wog') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label"> Other</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="other" type="number" class="form-control {{ $errors->has('other') ? ' is-invalid' : '' }}"
                    id="other" value="{{ old('other') ?? $performance->other}}" onfocusout="validatOther()">
                @if($errors->has('other'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('other') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <fieldset>
            <div class="form-group">
                <label class="control-label">Comment</label>
                <textarea name="comment" rows="5"
                    class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                    id="comment">{{$performance->comment}}</textarea>
                @if ($errors->has('comment'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </fieldset>

        @section( 'javascript' )
        <script>
            jQuery.datetimepicker.setDateFormatter('moment');
                 $("#ddate").datetimepicker({
                timepicker:true,
                datepicker:true,        
                // format: "Y-M-d"
                format: "YYYY-MM-DD H:mm:ss"
                // autoclose: true,
                // todayBtn: true,
                // startDate: "2013-02-14 10:00",
                // minuteStep: 10
                // step: 30,
            });
            $('#toggle').on('click', function(){
                $("#ddate").datetimepicker('toggle');
            })
            jQuery.datetimepicker.setDateFormatter('moment');
		 $("#r_date").datetimepicker({
		timepicker:true,
		datepicker:true,        
		// format: "Y-M-d"
		format: "YYYY-MM-DD H:mm:ss"
		// autoclose: true,
		// todayBtn: true,
		// startDate: "2013-02-14 10:00",
		// minuteStep: 10
		// step: 30,
	});
	$('#toggle2').on('click', function(){
		$("#r_date").datetimepicker('toggle');
	})
        </script>
        <script>
            const chinet = document.getElementById( 'chinet' );
                const fo = document.getElementById( 'fo' );
                const operation = document.getElementById( 'operation' );
                const truck = document.getElementById( 'truck' );
                const ddate = document.getElementById( 'ddate' );
                const origion = document.getElementById( 'origion' );
                const destination = document.getElementById( 'destination' );
                const diswc = document.getElementById( 'diswc' );
                const diswoc = document.getElementById( 'diswoc' );
                const cargovol = document.getElementById( 'cargovol' );
                const fuell = document.getElementById( 'fuell' );
                const fuelb = document.getElementById( 'fuelb' );
                const perdiem = document.getElementById( 'perdiem' );
                const wog = document.getElementById( 'wog' );
                const other = document.getElementById( 'other' );
                const comment = document.getElementById( 'comment' );
                const performance_edit_form = document.getElementById( 'performance_edit_form' );

	performance_edit_form.addEventListener( 'submit', function ( event ) {
		event.preventDefault();
		if ( validateChinet() &&
			validateFo() &&
			validateOperation() &&
			validateTruck() &&
			validateDdate() &&
			validateOrigion() &&
			validateDestination() &&
			validateDisw() &&
			validateDiswoc() &&
			validateCargovol() &&
			validateFuell() &&
			validateFuelb() &&
			validatePerdiem() &&
			validateWog() &&
			validatOther()
		) {
			performance_edit_form.submit();
		} else {
			return false;
		}
	} );
	// Validator functions
	function validateChinet() {
		if ( checkIfEmpty( chinet ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateFo() {
		if ( checkIfEmpty( fo ) ) {
			return false;
		}
		if ( !meetLength( fo, 2, 50 ) ) {
			return false;
		} else {
			return true;

		}

	}

	function validateOperation() {
		if ( checkIfEmpty( operation ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateTruck() {
		if ( checkIfEmpty( truck ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateDriver() {
		if ( checkIfEmpty( driver ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateDdate() {
		if ( checkIfEmpty( ddate ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateOrigion() {
		if ( checkIfEmpty( origion ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateDestination() {
		if ( checkIfEmpty( destination ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateDisw() {
		if ( checkIfEmpty( diswc ) ) {
			return false;
		}
		if ( !minmax( diswc, 10, 1500 ) ) {
			return false;
		} else {
			return true;

		}

	}

	function validateDiswoc() {
		if ( checkIfEmpty( diswoc ) ) {
			return false;
		}
		if ( !minmax( diswoc, 10, 1500 ) ) {
			return false;
		} else {
			return true;

		}

	}

	function validateCargovol() {
		if ( checkIfEmpty( cargovol ) ) {
			return false;
		}
		if ( !minmax( cargovol, 5, 60 ) ) {
			return false;
		} else {
			return true;

		}
	}


	function validateFuell() {
		if ( checkIfEmpty( fuell ) ) {
			return false;
		}
		if ( !minmax( fuell, 10, 150 ) ) {
			return false;
		} else {
			return true;

		}
	}

	function validateFuelb() {
		if ( checkIfEmpty( fuelb ) ) {
			return false;
		}
		if ( !minmax( fuelb, 100, 10000 ) ) {
			return false;
		} else {
			return true;

		}
	}

	function validatePerdiem() {
		if ( checkIfEmpty( perdiem ) ) {
			return false;
		}
		if ( !minmax( perdiem, 10, 10000 ) ) {
			return false;
		} else {
			return true;

		}
	}

	function validateWog() {
		if ( checkIfEmpty( wog ) ) {
			return false;
		}
		if ( !minmax( wog, 10, 10000 ) ) {
			return false;
		} else {
			return true;

		}
	}

	function validatOther() {
		if ( checkIfEmpty( other ) ) {
			return false;
		}
		if ( !minmax( other, 10, 10000 ) ) {
			return false;
		} else {
			return true;

		}
	}


        </script>

        @endsection