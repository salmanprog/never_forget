@extends('layouts.website.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Translation Service') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('translation.translate') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="text">{{ __('Text to Translate') }}</label>
                            <textarea id="text" class="form-control @error('text') is-invalid @enderror" name="text" rows="4" required>{{ $originalText ?? '' }}</textarea>
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="target_language">{{ __('Target Language') }}</label>
                            <select id="target_language" class="form-control @error('target_language') is-invalid @enderror" name="target_language" required>
                                @foreach($languages as $code => $name)
                                    <option value="{{ $code }}" {{ isset($targetLanguage) && $targetLanguage == $code ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('target_language')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Translate') }}
                            </button>
                        </div>
                    </form>

                    @if(isset($translatedText))
                        <div class="mt-4">
                            <h5>{{ __('Translation Result') }}</h5>
                            <div class="card">
                                <div class="card-body">
                                    {{ $translatedText }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
