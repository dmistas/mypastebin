@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('store.paste')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="form-control-label">
                                {{__('Title')}}
                            </label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                   required value="{{old('title')}}">
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Textarea</label>
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                      id="content" required rows="4">{{old('content')}}</textarea>
                            @error('content')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="expiration_time">{{__('Expiration time')}}</label>
                                <select name="expiration_time" id="expiration_time"
                                        class="form-control select @error('expiration_time') is-invalid @enderror">
                                    <option value="{{\App\Models\Paste::NEVER}}" selected>{{__('Never')}}</option>
                                    <option value="{{\App\Models\Paste::TEN_MINUTES}}">{{__('10 minutes')}}</option>
                                    <option value="{{\App\Models\Paste::ONE_HOUR}}">{{__('1 hour')}}</option>
                                    <option value="{{\App\Models\Paste::THREE_HOURS}}">{{__('3 hours')}}</option>
                                    <option value="{{\App\Models\Paste::ONE_DAY}}">{{__('1 day')}}</option>
                                    <option value="{{\App\Models\Paste::ONE_WEEK}}">{{__('1 week')}}</option>
                                    <option value="{{\App\Models\Paste::ONE_MONTH}}">{{__('1 month')}}</option>
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="access">{{__('Access')}}</label>
                                <select name="access" id="access"
                                        class="form-control select @error('expiration_time') is-invalid @enderror">
                                    <option value="{{\App\Models\Paste::ACCESS_PUBLIC}}" selected>{{__('Public access')}}</option>
                                    <option value="{{\App\Models\Paste::ACCESS_UNLISTED}}">{{__('Access by link')}}</option>
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">{{__('Get link')}}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 p-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <ul>
                        @forelse($pastes as $paste)
                        <li>
                            <a href="{{route('show.paste', $paste->hash)}}">{{$paste->title}}</a>
                        </li>
                        @empty
                        <p>{{__('No pastes')}}</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

