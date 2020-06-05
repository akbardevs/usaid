<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title" id="userCrudModal"></h4>
                        </div>
                        <div class="modal-body">
                                <form id="userForm" name="userForm" method="POST">
                                        <input type="hidden" name="donor_id" id="donor_id">
                                        @csrf
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Jumlah(Kantong):</strong>
                                                                <input type="number" name="jumlah" id="jumlah"
                                                                        class="form-control" placeholder="Jumlah"
                                                                        required>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Tanggal Donor:</strong>
                                                                <input type="date" name="tgl_donor" id="tgl_donor"
                                                                        class="form-control" placeholder="Tanggal Donor"
                                                                        required>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <strong>Point:</strong>
                                                                <input type="number" name="points" id="points"
                                                                        class="form-control" placeholder="Point"
                                                                        required>
                                                        </div>
                                                </div>



                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                                <label>Pendonor</label>
                                                                <select class="form-control select2"
                                                                        style="width: 100%;" name="pendonor_id"
                                                                        id="pendonor_id">
                                                                        <option value="">Pilih Pendonor</option>
                                                                        @foreach ($pendonors as $value)
                                                                        <option value="{{$value->id}}">
                                                                                [{{$value->gol_darah}}]{{$value->nama}}
                                                                        </option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                </div>




                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" id="btn-save" name="btnsave"
                                                                class="btn btn-primary">Save</button>
                                                        <a href="{{ route('donor.index') }}"
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