{% extends "../../layout/base.volt" %}
{% block content %}
<div class="content">
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Jadwal Dokter</h3>
                    </div>
                    <!-- Bordered Table -->
                    <div class="block">   

                        <div class="block-content">
                            {% if session.get('user_aktif')['jenis_user'] == 2 %}
                            <div style="padding-bottom: 25px">
                                <a href="" data-toggle="modal" data-target="#modal-top3">
                                    <button type="button" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus mr-2"></i>Tambah Jadwal Dokter
                                    </button>
                                </a>
                            </div>
                            {% endif %}
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Poli</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Nama</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Hari</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Jam</th>
                                        <!-- <th class="text-center" style="width: 100px;">Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    {% set no = 1 %}
                                    {% for jad in jadwal %}
                                    <tr>
                                        <th class="text-center" scope="row">{{ no }}</th>
                                        <td>{{jad.dokter.poli}}</td>
                                        <td>{{jad.dokter.nama}}</td>
                                        <td>{{jad.hari}}</td>
                                        <td>{{date('H:i',strtotime(jad.jam_mulai))}} - {{date('H:i',strtotime(jad.jam_selesai))}}</td>
                                        <!--
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                        -->
                                    </tr>
                                    {% set no = no + 1 %}
                                    {% endfor %}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Bordered Table -->
                </div>
</div>
<div class="modal fade" id="modal-top3" tabindex="-1" role="dialog" aria-labelledby="modal-top3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <form method="POST" action="{{ url('/jadwal-dokter/add') }}" enctype="multipart/form-data" id="jadwal-dokter">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Tambah Jadwal Dokter</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="signup-username">Nama</label>
                            <input type="text" class="form-control" id="signup-username" name="nama" placeholder="Nama ..." disabled="" value="{{ session.get('user_aktif')['nama'] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-select">Hari</label>
                        <div class="col-md-12">
                            <select class="form-control" id="example-select" name="hari">
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-masked-time">Jam praktek</label>
                        <div class="col-lg-5">
                            <input type="time" class="js-masked-time form-control js-masked-enabled" id="example-masked-time" name="jam_mulai" placeholder="00:00">
                        </div>
                        <div class="col-lg-2">
                            <h7>Sampai</h7>
                        </div>
                        <div class="col-lg-5">
                            <input type="time" class="js-masked-time form-control js-masked-enabled" id="example-masked-time" name="jam_selesai" placeholder="00:00">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-alt-success" id="yakin">
                    <i class="fa fa-check"></i> Submit
                </button>
            </div>
        </div>
        </form>
    </div>
</div>
{% endblock %}

{% block morejs %} 
<script>
$( document ).ready(function() {
    $('#yakin').click(function(){
        event.preventDefault();
        $('#jadwal-dokter').submit();
    });
});
</script>
{% endblock %}