@extends('layouts.dashboardMaster')

@section('content')

<div class="card shadow-lg my-5 p-3 col-md-10">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3>{{$title}}</h3>

             <div class="row">
                <div class="col-md-10">
                <form class="form-control" action="{{route('customerUpdate',$customerDetails->id)}}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="name" id="name"><h5>Customer Name: </h5></label>
                        <br>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter customer name" value="{{$customerDetails->name}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" id="email"><h5>Customer Email: </h5></label>
                        <br>
                        <input class="form-control" type="email" id="email" name="email" value="{{$customerDetails->email}}" placeholder="Enter customer email" required>
                    </div>

                    <div class="mb-3">
                        <label for="Address" id="address"><h5>Customer Address: </h5></label>
                        <br>
                        <input class="form-control" type="text" id="address" name="address" value="{{$customerDetails->address}}" placeholder="Enter customer address" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" id="phone"><h5>Customer Contact Number: </h5></label>
                        <br>
                        <input class="form-control" type="text" id="phone" name="phone" value="{{$customerDetails->phone}}" placeholder="Enter customer phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="status"><h5>Select Customer Status: </h5></label><br>
                        <select name="status" id="status" class="form-control">
                            @if($customerDetails->status == 'subscribed')
                                <option value="subscribed" selected>Subscribed</option>
                                <option value="unsubscribed">Unsubscribed</option>
                                <option value="new">New</option>   
                            @endif

                            @if($customerDetails->status == 'unsubscribed')
                                <option value="unsubscribed" selected>Unsubscribed</option>
                                <option value="subscribed">Subscribed</option>
                                <option value="new">New</option>   
                            @endif

                            @if($customerDetails->status == 'new')
                                 <option value="new" selected>New</option>   
                                <option value="unsubscribed">Unsubscribed</option>
                                <option value="subscribed">Subscribed</option>
                            @endif
                            
                              
                        </select>
                    </div>

                    <div class="mb-3">
                        <input class="btn btn-primary" type="submit" value="Create Customer">
                    </div>
                    



                </form>
                </div>
             </div>

            </div>
        </div>
    </div>
</div>

@endsection