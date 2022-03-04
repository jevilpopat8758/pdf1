<div id="main">
	<div class="page-header">
		
		
		<h2>Customer List</h2>
        <a href="{{url('dynamic_pdf/pdf')}}" class="btn btn-danger">pdf</a>
	</div>
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				   
				    </div>
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="order_data_table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Postal Code</th>
                <th>Country</th>                 
            </tr>
            </thead>

            <tbody>
                    @foreach($customer_data as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->city}}</td>
                            <td>{{$customer->postalcode}}</td>
                            <td>{{$customer->country}}</td>
                        </tr>
                    @endforeach

                   <!--  foreach($customer_data as $customer)
                    {
                        $output .= '
                        <tr>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->name.'</td>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->city.'</td>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->postalcode.'</td>
                            <td style="border: 1px solid; padding: 12px;">'.$customer->country.'</td>
                        </tr>

                        ';
                    } -->
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>
