@extends('layouts.dashboardMaster')

@section('content')

<div class="card shadow-lg my-5 p-3 col-md-10">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3>{{$title}}</h3>

             <div class="row">
                <div class="col-md-10">
                <form class="form-control" action="{{route('campaignUpdate',$campaignDetails->id)}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" id="title"><h5>Title: </h5></label>
                        <br>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Enter campaign title" value="{{$campaignDetails->title}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="details" id="details"><h5>Details: </h5></label>
                        <br>
                        <textarea rows="10" cols="30" class="form-control" id="details" name="details" placeholder="Enter campaign details" required>{{$campaignDetails->details}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="url" id="url"><h5>Campaign URL Link: </h5></label>
                        <br>
                        <input class="form-control" type="text" id="url" name="url" value="{{$campaignDetails->url}}" placeholder="Enter campaign url link" required>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Update Campaign">
                    </div>
                    
                </form>
                </div>
             </div>

            </div>
        </div>
    </div>
</div>

@endsection