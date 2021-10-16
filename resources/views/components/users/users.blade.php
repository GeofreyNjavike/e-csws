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
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Role(s)</th>
                     <th>Email</th>
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 @forelse ($users as $user )
                     <tr>
                         <td>
                             {{ $user->firstname }}

                         </td>
                         <td>{{ $user->lastname }}
                         </td>
                         <td>{{ $user->role_id }}</td>
                         <td> {{ $user->email }}</td>
                         <td>
                             @if ($user->role_id == 1)
                             @else
                                 <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                     @csrf
                                     @method('post')
                                     <input type="hidden" name="_method" value="DELETE">
                                     <button value="submit" type="buttom" class="btn btn-default btn-sm"
                                         onclick="return confirm('Are you sure you want to delete this user?');"><i><i
                                                 class="fas fa-trash" style="color: red"></i></button>
                                 </form>
                             @endif

                             <a href="{{ route('user.show', $user->id) }}"><i class="fas fa-eye"
                                     style="color: green"></i></a>
                             @if ($user->status == 1)
                                 <i class="fas fa-circle justify-content-end"
                                     style="color: rgb(51, 177, 51); font-size:12px">Active</i>
                             @else
                                 <i class="fas fa-circle justify-content-end"
                                     style="color: rgb(177, 80, 51); font-size:12px">Deactivated</i>
                             @endif
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td>Trident</td>
                         <td>Internet
                             Explorer 4.0
                         </td>
                         <td>Win 95+</td>
                         <td> 4</td>
                         <td>X</td>
                     </tr>
                 @endforelse
             </tbody>

             <tfoot>
                 <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Role(s)</th>
                     <th>Email</th>
                     <th>Actions</th>
                 </tr>
             </tfoot>
         </table>
     </div>
     <!-- /.card-body -->


     <!-- /.card -->
