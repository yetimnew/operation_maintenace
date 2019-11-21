{{-- <div class="row"> --}}
<div class="col-md-6 ">
    <div class="form-group mb-0 required">
        <label class="control-label">Place Name</label>

        <div class="input-group">
            <input name="name" type="text" id="name"
                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                value="{{ old('name') ?? $place->name}}" onfocusout="validateName()">
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
            <span class="invalid-feedback" role="alert">
        </div>
    </div>

    <div class="form-group mb-0 required">
        <label class="control-label">Region Name</label>

        <select name="region" id="region" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}"
            onfocusout="validateRegiono()">
            <option class="dropup" value=""> Select One</option>
            @foreach ($regions as $region)
            <option class="dropup" value="{{$region->id}}" {{$region->id == $place->region_id ? 'selected' : '' }}>
                {{$region->name}} </option>
            @endforeach

        </select>
        @if ($errors->has('region'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('region') }}</strong>
        </span>
        @endif
        <span class="invalid-feedback" role="alert"></span>
    </div>

    <div class="form-group">
        <label class="control-label">Comments</label>
        <textarea name="comment" rows="5" class="form-control" id="comment">{{$place->comment}}</textarea>

    </div>

</div>
@section( 'javascript' )
<script>
    const name = document.getElementById( 'name' );
	const region = document.getElementById( 'region' );
	const place_reg = document.getElementById( 'place_reg' );

	place_reg.addEventListener( 'submit', function ( event ) {
		event.preventDefault();
		if (
              validateName() && 
              validateRegiono()
		
		) {
			place_reg.submit();
		} else {
			return false;
		}
	} );
	// Validator functions
	function validateName() {
		if ( checkIfEmpty( name ) ) {
			return false;
		} else {
			return true;
		}
	}

	function validateRegiono() {
		if ( checkIfEmpty( region ) ) {
			return false;
		}else {
			return true;

		}

	}

	
</script>

@endsection