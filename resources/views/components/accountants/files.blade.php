 {{-- DATA TABLES --}}
 <!-- Google Font: Source Sans Pro -->

 <div class="card">
     <div class="card-header">
         <h3 class="card-title">Table W with some informations about the files</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>File Name</th>
                     <th>Document Objective</th>
                     <th>Status</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @forelse ($files as $file )
                     <tr>

                         <td>{{ $file->filename }}</td>
                         <td>{{ $file->fileobjective }}</td>
                         <td>
                             @if ($file->filestatus == 'Not Aproved')
                                 <span class="badge bg-info text-dark"><i class="fas fa-times-circle text-xs"
                                         style="color: rgb(243, 242, 242)"></i>Waiting</span>
                             @else
                                 <i class="fas fa-check-circle text-xs"
                                     style="color: rgba(42, 185, 24, 0.76)">Aproved</i>

                             @endif

                             @if ($file->fileobjective == 'Request for payment')
                                 @if ($file->paymentstatus == 'Not Payed')
                                     <span class="badge bg-warning text-white">Not Payed</span>
                                 @else
                                     <span class="badge bg-success">Payed</span>
                                 @endif
                             @endif
                         </td>
                         <td>
                             @if ($file->paymentstatus == 'Not Payed')
                                 <a href="{{ route('customers.edit', $file->id) }}" class="btn btn-info btn-sm"><i
                                         class="fas fa-paper-plane" style="color: success"></i> Aprove the
                                     payment</a>
                             @else
                                 <button class="btn btn-success btn-sm"><i class="fas fa-check-circle"
                                         style="color: success"></i> Aproved</button>
                             @endif

                             <a href="{{ route('files.show', $file->id) }}" data-toggle="tooltip"
                                 data-placement="right" title="View the document"><i class="fas fa-eye">View</i></a>

                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td></td>
                         <td>
                         </td>
                         <td>
                             <p style="color: rgb(167, 14, 14)">No new Records</p>
                         </td>
                         <td> </td>
                         <td></td>
                     </tr>
                 @endforelse
             </tbody>

             <tfoot>
                 <tr>
                     <th>File Name</th>


                     <th>Document Objective</th>
                     <th>Status</th>
                     <th>Actions</th>
                 </tr>
             </tfoot>
         </table>
     </div>
     <!-- /.card-body -->


     <!-- /.card -->
