{% extends "../../layout/base.volt" %}
{% block content %}
<div class="content">
    <div class="block block-themed block-rounded">
        <div class="block-header bg-gd-sea">
            <h3 class="block-title">Detail</h3>
        </div>
        <!-- Bordered Table -->
        <div class="block">
            <form method="POST" action="{{ url('/janji/janji_dokter/add-detail') }}" enctype="multipart/form-data" id="jadwal-dokter">
            <div class="block-content">
                <input type="hidden" name="id_janji" value="{{details.id_janji}}">
                <div class="form-group row">
                    <div class="col-9">
                        <label for="signup-password">Nama</label>
                        <p>{{details.pasien.nama}}<p/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-9">
                        <label for="signup-password">Diagnosa</label>
                        <input type="text" class="form-control" id="signup-password" name="diagnosa" placeholder="Diagnosa ...">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-9">
                        <label for="signup-password">Resep</label>
                        <textarea class="js-maxlength form-control js-maxlength-enabled" name="resep" rows="5" maxlength="100" placeholder="Masukkan resep obat ..." data-always-show="true"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <button type="submit" class="btn btn-alt-success" id="yakin">
                        <i class="fa fa-check"></i> Submit
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
{% endblock %}