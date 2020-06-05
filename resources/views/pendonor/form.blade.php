<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title" id="userCrudModal"></h4>
                        </div>
                        <div class="modal-body">
                                <form id="userForm" name="userForm" method="POST">
                                        <input type="hidden" name="pendonor_id" id="pendonor_id">
                                        @csrf
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Nama:</strong>
                                                                <input type="text" name="nama" id="nama"
                                                                        class="form-control" placeholder="Nama"
                                                                        required>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>No.Telp:</strong>
                                                                <input type="number" name="no_telp" id="no_telp"
                                                                        class="form-control" placeholder="No.telp"
                                                                        required>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Tanggal Lahir:</strong>
                                                                <input type="date" name="tgl_lahir" id="tgl_lahir"
                                                                        class="form-control" placeholder="Tangga Lahir"
                                                                        required>
                                                        </div>
                                                </div>


                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <label>Provinsi</label>
                                                                <select class="form-control select2"
                                                                        style="width: 100%;" name="provinsi"
                                                                        id="provinsi">
                                                                        <option value="">Pilih PROVINSI</option>
                                                                        @foreach ($provinsis as $id => $name)
                                                                        <option value="{{$id}}">{{$name}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <label>Regensi</label>
                                                                <select class="form-control select2"
                                                                        style="width: 100%;" name="regensi"
                                                                        id="regensi">
                                                                        <option value="">Pilih KAB/KOTA</option>
                                                                        @foreach ($regencies as $id => $name)
                                                                        <option value="{{$id}}">{{$name}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                </div>



                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <label>Golongan Darah</label>
                                                                <select class="form-control" name="gol_darah"
                                                                        id="gol_darah">
                                                                        <option value="">Pilih Gol Darah</option>
                                                                        <option value="A+">A+</option>
                                                                        <option value="A-">A-</option>
                                                                        <option value="B+">B+</option>
                                                                        <option value="B-">B-</option>
                                                                        <option value="O+">O+</option>
                                                                        <option value="O-">O-</option>
                                                                        <option value="AB+">AB+</option>
                                                                        <option value="AB-">AB-</option>
                                                                </select>
                                                        </div>
                                                </div>



                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <label>User</label>
                                                                <select class="form-control select2"
                                                                        style="width: 100%;" name="user_id"
                                                                        id="user_id">
                                                                        <option value="">Pilih User</option>
                                                                        @foreach ($users as $id => $email)
                                                                        <option value="{{$id}}">{{$email}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                </div>




                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" id="btn-save" name="btnsave"
                                                                class="btn btn-primary">Save</button>
                                                        <a href="{{ route('pendonor.index') }}"
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