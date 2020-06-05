<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title" id="userCrudModal"></h4>
                        </div>
                        <div class="modal-body">
                                <form id="userForm" name="userForm" method="POST">
                                        <input type="hidden" name="user_id" id="user_id">
                                        @csrf
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Name:</strong>
                                                                <input type="text" name="name" id="name"
                                                                        class="form-control" placeholder="Name"
                                                                        required>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Email:</strong>
                                                                <input type="email" name="email" id="email"
                                                                        class="form-control" placeholder="Email"
                                                                        required>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <label>Select Role</label>
                                                                <select class="form-control" name="role" id="role">
                                                                        <option value="admin">Admin</option>
                                                                        <option value="staff">Staff</option>
                                                                        <option value="user">User</option>
                                                                </select>
                                                        </div>
                                                </div>




                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" id="btn-save" name="btnsave"
                                                                class="btn btn-primary">Save</button>
                                                        <a href="{{ route('user.index') }}"
                                                                class="btn btn-danger">Cancel</a>
                                                </div>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>
</div>



<!-- Ganti Password user modal -->
<div class="modal fade" id="crud-modal-pass" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title" id="userCrudModal-pass"></h4>
                        </div>
                        <div class="modal-body">
                                <form name="userForm" action="{{ route('user.gPassword') }}" method="POST">
                                        <input type="hidden" name="guser_id" id="guser_id">
                                        @csrf
                                        <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Password:</strong>
                                                                <input type="password" name="gpassword" id="gpassword"
                                                                        class="form-control" placeholder="Password"
                                                                        required>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Confirm Password:</strong>
                                                                <input type="password" name="gcpassword" id="gcpassword"
                                                                        class="form-control"
                                                                        placeholder="Confirm Password" required>
                                                        </div>
                                                </div>


                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" id="btn-ganti" name="btnganti"
                                                                class="btn btn-primary">Ganti</button>
                                                        <a href="{{ route('user.index') }}"
                                                                class="btn btn-danger">Cancel</a>
                                                </div>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>
</div>




{{-- <!-- Show user modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title" id="userCrudModal-show"></h4>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2"></div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 ">

                                                <table class="table-responsive ">
                                                        <tr height="50px">
                                                                <td><strong>Name:</strong></td>
                                                                <td id="sname"></td>
                                                        </tr>
                                                        <tr height="50px">
                                                                <td><strong>Email:</strong></td>
                                                                <td id="semail"></td>
                                                        </tr>

                                                        <tr>
                                                                <td></td>
                                                                <td style="text-align: right "><a
                                                                                href="{{ route('user.index') }}"
class="btn btn-danger">OK</a> </td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div> --}}