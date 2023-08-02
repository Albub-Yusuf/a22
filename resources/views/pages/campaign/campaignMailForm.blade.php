@extends('layouts.dashboardMaster')

@section('content')

<div class="card shadow-lg my-5 p-3 col-md-8">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3>{{$title}}</h3>
             <div class="row">
                <div class="col-md-10">
                <form class="form-control" action="{{route('send-campaign-email')}}" method="POST">
                    @csrf

                    <input type="hidden" name="campaignId" value="{{$campaignDetails->id}}">
                    <div class="mb-3">
                        <label for="status"><h5>Select Customer Group: </h5></label><br>
                        <select name="status" id="status" class="form-control">
                            <option value="subscribed">Subscribed</option>
                            <option value="unsubscribed">Unsubscribed</option>    
                            <option value="new">New</option>
                            <option value="all">All</option>  
                        </select>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Send Mail to the customers">
                    </div>
                    
                </form>
                </div>
             </div>

            </div>
        </div>
    </div>
</div>
<br><br>
<div class="row my-5">
    <div class="col-md-6">

    <div class="card text-center">
  <div class="card-header">
    <h4>{{$campaignDetails->title}}</h4>
  </div>
  <div class="card-body">
    <h5 class="card-title">
        <p class="card-text">{{$campaignDetails->details}}</p>
    </h5>
    <br><br><br><hr>
    <iframe src="{{$campaignDetails->url}}" height="500" width="700" title="Iframe Example"></iframe>
    
  </div>
  <div class="card-footer text-muted">
  <a href="{{$campaignDetails->url}}" target="_blank" class="btn btn-primary">Visit Link</a>
  </div>
</div>

    </div>
</div>
  


@endsection