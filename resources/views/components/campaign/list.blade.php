<div class="card shadow-lg my-5 p-3 col-md-10">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12 d-flex justify-content-between">
                <h3>{{$title}}</h3>
                <a class="btn btn-primary" href="{{route('campaign.create')}}">Create Campaign</a>
            </div>
        </div>
        <br>

        <table class="table table-striped table-hover" id="campaign_list">
            <thead>
                <th>Serial</th>
                <th>Title</th>
                <th>URL</th>
                <th>Action</th>
            </thead>
            <tbody id="tableList">
                @foreach($campaigns as $campaign)
                    <tr>
                        <td>{{$serial++}}</td>
                        <td>{{$campaign->title}}</td>
                        <td>{{$campaign->url}}</td>
                        <td>
                           <div class="action-container d-flex" >
                           <div><a  href="{{route('campaign.edit',$campaign->id)}}" class="btn btn-sm btn-warning">Edit</a></div>&nbsp;&nbsp; |  &nbsp;&nbsp;
                            <div>
                                <form action="{{route('campaignDelete',$campaign->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                           </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
 $(function() {
   $('#campaign_list').DataTable();
 });
</script>