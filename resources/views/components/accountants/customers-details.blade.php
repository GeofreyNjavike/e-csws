 {{-- DATA TABLES --}}
 <!-- Google Font: Source Sans Pro -->

 <div class="card">
     <div class="card-header">
         <h3 class="card-title">Table with all informations about the users</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>Customer Name</th>
                     <th>Service person</th>
                     <th>Email</th>
                     <th>File</th>
                     <th>Payed Amount</th>

                 </tr>
             </thead>
             <tbody>
                 @forelse ($customers as $customer )
                     <tr>
                         <td>
                             {{ $customer->names }}

                         </td>
                         <td>{{ $customer->lastname }} {{ $customer->lastname }}
                         </td>
                         <td> {{ $customer->email }}</td>
                         <td> {{ $customer->filename }}</td>
                         <td>{{ $customer->amountpayed }}</td>
                     </tr>
                 @empty
                     <tr>
                         <td></td>
                         <p>No records</p>
                         <td></td>
                     </tr>
                 @endforelse
             </tbody>

             <tfoot>
                 <tr>
                     <th>Customer Name</th>
                     <th>Service person</th>
                     <th>Email</th>
                     <th>File</th>
                     <th>Payed Amount</th>

                 </tr>
             </tfoot>
         </table>
     </div>
     <!-- /.card-body -->


     <!-- /.card -->
