{% extends "../../layout/base.volt" %}
{% block content %}
<!-- Page Content -->

    <div class="content">
        <div class="row gutters-tiny invisible" data-toggle="appear">
            <!-- Row #4 -->
            {% for poli in daftar_poli %}
            {% if antri[poli] is defined %}
            <div class="col-md-4">
                <div class="block block-transparent bg-default">
                    <div class="block-content block-content-full">
                        <div class="py-20 text-center">
                            
                                <div class="font-size-h4 font-w600 text-white">{{poli}}</div><br>
                                <div class="text-white-op" style="font-size : 17px";>Antrian Sekarang</div>
                                <div class="text-white-op" style="font-size : 25px">{{antri[poli]['sekarang']}}</div><br>
                                {% if antri[poli]['kita'] is defined %}
                                    <div class="text-white-op" style="font-size : 17px">Antrian Anda</div>
                                    <div class="text-white-op" style="font-size : 25px">{{antri[poli]['kita']}}</div>
                                {% else %}
                                    <div class="text-white-op" style="font-size : 17px">Antrian Anda</div>
                                    <div class="text-white-op">-</div>
                                {% endif %}
                            
                        </div>
                    </div>
                </div>
            </div>
            {% endif %}
            {% endfor %}
    </div>
    <!-- END Page Content -->
{% endblock %}