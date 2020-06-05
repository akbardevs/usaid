<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <h4 class="modal-title" id="userCrudModal"></h4>
                        </div>
                        <div class="modal-body">
                                <form id="userForm" name="userForm" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="berita_id" id="berita_id">
                                        @csrf
                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12" id="class-judul">
                                                        <div class="form-group">
                                                                <strong>Judul:</strong>
                                                                <input type="text" name="judul" id="judul"
                                                                        class="form-control" placeholder="Judul">
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12" id="class-foto">
                                                        <div class="form-group">
                                                                <strong>Foto:</strong>
                                                                <input type="file" name="foto" id="foto"
                                                                        class="form-control" placeholder="Foto">
                                                        </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12" id="class-deskripsi">
                                                        <div class="form-group">
                                                                <strong>Deskripsi:</strong>
                                                                <textarea name="deskripsi" id="deskripsi"
                                                                        class="form-control" cols="30"
                                                                        rows="10"></textarea>
                                                        </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12" id="class-waktu_posting">
                                                        <div class="form-group">
                                                                <strong>Waktu Posting:</strong>
                                                                <input type="datetime-local" name="waktu_posting"
                                                                        id="waktu_posting" class="form-control"
                                                                        placeholder="Waktu Posting">
                                                        </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                                        <button type="submit" id="btn-save" name="btnsave"
                                                                class="btn btn-primary">Save</button>
                                                        <a href="{{ route('berita.index') }}"
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