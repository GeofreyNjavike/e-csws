 {{-- DATA TABLES --}}
 <!-- Google Font: Source Sans Pro -->

 <div class="card">
     <div class="card-header">
         <h3 class="card-title">Table with all informations about the files</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>File Name</th>
                     <th>Sender</th>
                     <th>Department</th>
                     <th>Document Objective</th>
                     <th>Status</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @forelse ($files as $file )
                     <tr>

                         <td>{{ $file->filename }}</td>
                         <td>Mr/Mrs <span style="font-weight: 700">{{ $file->lastname }}</span>
                         </td>
                         <td>{{ $file->role }}</td>
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
                             <form action="{{ route('fileaprove', $file->id) }}" method="POST">
                                 @csrf
                                 @method('post')

                                 @if ($file->filestatus == 'Not Aproved')
                                     <button class="btn btn-success btn-sm" value="submit" type="buttom"
                                         data-toggle="tooltip" data-placement="right" title="Aprove the document"
                                         onclick="return confirm('Are you sure you want to aprove this Document?');">
                                         <i><i class="fas fa-check-circle"
                                                 style="color: rgb(252, 252, 252)">Aprove</i></button>

                                 @else
                                     <button class="btn btn-danger btn-sm" value="submit" type="buttom"
                                         data-toggle="tooltip" data-placement="right" title="Decline the document"
                                         onclick="return confirm('Are you sure you want to decline the aprove of the Document?');">
                                         <i><i class="fas fa-times-circle"
                                                 style="color: rgb(238, 235, 235)">Decline</i></button>

                                 @endif
                             </form>
                             @if ($file->fileobjective == 'Request for payment')
                                 @if ($file->toPmu == 0)
                                     <form action="{{ route('toPmu', $file->id) }}" method="POST"
                                         enctype="multipart/form-data">
                                         @csrf
                                         <input type="hidden" name="_method" value="POST">
                                         <button class="btn btn-info btn-sm" value="submit"><i
                                                 class="fas fa-arrow-alt-circle-right" style="color: wheat"></i>To
                                             PMU</button>

                                     </form>
                                 @else
                                     <a class="btn btn-info btn-sm"><i class="fa fas-times-circle"></i>Sent</a>

                                 @endif
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
                     <th>Sender</th>
                     <th>Department</th>
                     <th>Document Objective</th>
                     <th>Status</th>
                     <th>Actions</th>
                 </tr>
             </tfoot>
         </table>
     </div>
     <!-- /.card-body -->


     <!-- /.card -->
