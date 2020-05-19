{% extends "../../layout/base.volt" %}
{% block content %}
<div class="content">
                {{flashSession.output()}}
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-gd-sea">
                        <h3 class="block-title">Riwayat Janji</h3>
                    </div>
                    <!-- Bordered Table -->
                    <div class="block">
                        <div class="block-content">
                            <div style="padding-bottom: 25px">
                                <a href="" data-toggle="modal" data-target="#modal-top4">
                                    <button type="button" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus mr-2"></i>Buat Janji
                                    </button>
                                </a>
                            </div>
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:50px;">#</th>
                                        <th>Poli</th>
                                        <th class="d-none d-sm-table-cell" style="width: 30%;">Dokter</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Tanggal</th>
                                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                        <th class="text-center" style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% set no = 1 %}
                                    {% for ri in riwayat %}
                                    <tr>
                                        <th class="text-center" scope="row">{{no}}</th>
                                        <td>{{ri.dokter.poli}}</td>
                                        <td>{{ri.dokter.nama}}</td>
                                        <td>{{ri.tgl}}</td>
                                        <td class="d-none d-sm-table-cell">
                                            {% if ri.status == 'Menunggu' %}
                                            <span class="badge badge-warning">{{ri.status}}</span>
                                            {% else %}
                                            <span class="badge badge-success">{{ri.status}}</span>
                                            {% endif %}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <!--
                                                <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                -->
                                                <a href="{{url("janji/delete/"~ri.id_janji)}}"><button type="button" class="btn btn-sm btn-secondary">
                                                    <i class="fa fa-times"></i>
                                                </button></a>
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
</div>
<div class="modal fade" id="modal-top4" tabindex="-1" role="dialog" aria-labelledby="modal-top4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
        <form method="POST" action="{{ url('/janji/add') }}" enctype="multipart/form-data" id="janji">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Buat Janji</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="example-select">Dokter</label>
                        <div class="col-md-12">
                            <select class="form-control" id="example-select" name="dokter">
                                {% for dokter in dokters %}
                                <option value="{{dokter.nama}}">{{dokter.nama}}</option>
                                {% endfor %}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="signup-username">Tanggal</label>
                            <input type="date" class="form-control" id="signup-username" name="tgl">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-masked-time">Waktu</label>
                        <div class="col-md-12">
                            <input type="time" class="js-masked-time form-control js-masked-enabled" id="example-masked-time" name="jam" placeholder="00:00">
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
        $('#janji').submit();
    });
});
</script>
{% endblock %}