<div class="card shadow-lg my-5 p-3 col-md-10">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="col-md-12 d-flex justify-content-between">
                <h3>{{$title}}</h3>
                <a class="btn btn-primary" href="{{route('customer.create')}}">Add Customer</a>
            </div>
        </div>
        <br>

        <table class="table table-striped" id="customer_list">
            <thead>
                <th>Serial</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody id="tableList">
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$serial++}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->status}}</td>
                        <td>
                           <div class="action-container d-flex" >
                           <div><a  href="{{route('customer.edit',$customer->id)}}" class="btn btn-sm btn-warning">Edit</a></div>&nbsp;&nbsp; |  &nbsp;&nbsp;
                            <div>
                                <form action="{{route('customerDelete',$customer->id)}}" method="POST">
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
   $('#customer_list').DataTable();
 });
</script>