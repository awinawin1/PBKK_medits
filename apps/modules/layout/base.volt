{%include '../../layout/header.volt'%}
{%include '../../layout/sidebar.volt'%}
{%include '../../layout/navbar.volt'%}

<!-- Main Container -->
<main id="main-container">
    {% block content %}
    
    {% endblock %}
    
</main>
<!-- END Main Container -->

{%include '../../layout/footer.volt'%}
{% block morejs %} {% endblock %}

</body>
</html>

