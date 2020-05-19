{% extends "../../layout/base.volt" %}
{% block content %}
<div class="content">
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Data Apoteker</h3>
                    </div>
                    <!-- Bordered Table -->
                    <div class="block"> 
                        <div class="block-content">
                            <div style="padding-bottom: 25px">
                                <a href="" data-toggle="modal" data-target="#modal-top2">
                                    <button type="button" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus mr-2"></i>Tambah Data Apoteker
                                    </button>
                                </a>
                            </div>
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Nama</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Email</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Jenis Kelamin</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal Lahir</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% set no = 1 %}
                                    {% for apoteker in apotekers %}
                                    <tr>
                                        <th class="text-center" scope="row">{{ no }}</th>
                                        <td>{{apoteker.nama}}</td>
                                        <td>{{apoteker.email}}</td>
                                        <td>
                                            {% if apoteker.jenis_kelamin == 'l' %}
                                                Laki-laki
                                            {% else %}
                                                Perempuan
                                            {% endif %}
                                        </td>
                                        <td>{{apoteker.tgl_lahir}}</td>
                                        <td>{{apoteker.alamat}}</td>
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
<div class="modal fade" id="modal-top2" tabindex="-1" role="dialog" aria-labelledby="modal-top2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <form method="POST" action="{{ url('/tambah_apoteker') }}" enctype="multipart/form-data" id="tambah_apoteker">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Tambah Data Apoteker</h3>
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
                            <input type="text" class="form-control" id="signup-username" name="nama" placeholder="Nama ...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="signup-email">Email</label>
                            <input type="email" class="form-control" id="signup-email" name="email" placeholder="Email ...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="signup-password">Password</label>
                            <input type="password" class="form-control" id="signup-password" name="password" placeholder="Password ...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12">Jenis Kelamin</label>
                        <div class="col-12">
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="jk" id="example-inline-radio1" value="l" checked="">
                                <label class="custom-control-label" for="example-inline-radio1">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline mb-5">
                                <input class="custom-control-input" type="radio" name="jk" id="example-inline-radio2" value="p">
                                <label class="custom-control-label" for="example-inline-radio2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="signup-username">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="signup-username" name="tgl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="signup-username">Alamat</label>
                            <input type="text" class="form-control" id="signup-username" name="alamat" placeholder="Alamat">
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
        $('#tambah_apoteker').submit();
    });
});
</script>
{% endblock %}