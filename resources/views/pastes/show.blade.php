@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <label for="link" class="form-control-label">
                                {{__('Link')}}
                            </label>
                            <input type="text" name="link" class="form-control" value="{{route('show.paste', $paste->hash)}}">
                        </div>
                        <div class="form-group">
                            <label for="title" class="form-control-label">
                                {{__('Title')}}
                            </label>
                            <input type="text" name="title" class="form-control" value="{{$paste->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Textarea</label>
                            <textarea name="content" class="form-control"
                                      id="content" rows="4">{{$paste->content}}</textarea>
                        </div>

                </div>
            </div>
            <a href="{{route('index.paste')}}" class="btn btn-sm btn-primary mb-3 mt-3">{{__('return Home page')}}</a>
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
