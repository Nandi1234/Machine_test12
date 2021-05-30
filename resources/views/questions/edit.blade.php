@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Question Edit
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("questions.update",$question->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="question">Question</label>
                <input class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}" type="text" name="question" id="question" value="{{ old('question', $question->question) }}" required>
                @if($errors->has('question'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question') }}
                    </div>
                @endif
                
            </div>
            @for ($i = 1; $i <= 4; $i++)
				<div class="row">			
					<div class="col-md-4">
						<div class="form-group">
							<label for="multiple_choice{{ $i }}">Answer of Option {{ $i }}</label>
                            @php
                            $index = 'option'.$i;
                            $opt = $question[$index];
                            @endphp
							<input class="form-control" type="text" name="option{{ $i }}" id="question" value="{{$opt}}" required>

						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<div class="form-check pt-3">
								
								<input class="form-check-input" type="radio" name="answer" value="{{$i}}" {{$question->answer == $i ? 'checked': ''}}>
								<label class="form-check-label">Is Correct Answer?</label>
							</div>
						</div>		
					</div>
				</div>
				@endfor	
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>



@endsection