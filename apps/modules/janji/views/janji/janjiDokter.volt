{% extends "../../layout/base.volt" %}
{% block content %}
<div class="content">
    {{flashSession.output()}}
    <div class="block block-themed block-rounded">
        <div class="block-header bg-gd-sea">
            <h3 class="block-title">Janji Yang Belum</h3>
        </div>
        <!-- Bordered Table -->
        <div class="block">
            <div class="block-content">
                <table class="table table-bordered table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%;">#</th>
                            <th style="width: 30%;">Pasien</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                            <th class="text-center" style="width: 5%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% set no = 1 %}
                        {% for sekarang in janji_sekarang %}
                        <tr>
                            <th class="text-center" scope="row">{{no}}</th>
                            <td>{{sekarang.pasien.nama}}</td>
                            <td>{{sekarang.tgl}}</td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-warning">{{sekarang.status}}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="myupdate({{sekarang.id_janji}})">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <a href="{{url("/janji/janji_dokter/detail/"~sekarang.id_janji)}}"><button type="button" class="btn btn-sm btn-secondary">
                                        <i class="fa fa-book"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        {% set no = no + 1 %}
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Bordered Table -->
    </div>
    <div class="block block-themed block-rounded">
        <div class="block-header bg-gd-sea">
            <h3 class="block-title">Janji yang sudah</h3>
        </div>
        <!-- Bordered Table -->
        <div class="block">
            <div class="block-content">
                <table class="table table-bordered table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Pasien</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% set no = 1 %}
                        {% for sekarang in janji_sudah %}
                        <tr>
                            <th class="text-center" scope="row">{{no}}</th>
                            <td>{{sekarang.pasien.nama}}</td>
                            <td>{{sekarang.tgl}}</td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge badge-success">{{sekarang.status}}</span>
                            </td>
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
<form method="POST" action="{{url('/janji/update')}}" style="display:none" id="form_update">
    <input type="hidden" id="input_update" name="nomor_id">
    <input type="submit" style="display=none">
</form>
{% endblock %}
{% block morejs %} 
<script>
function myupdate(id){
    $('#input_update').val(id);
    $('#form_update').submit();
}
$( document ).ready(function() {
    $('#yakin').click(function(){
        event.preventDefault();
        $('#janji').submit();
    });
});
</script>
{% endblock %}