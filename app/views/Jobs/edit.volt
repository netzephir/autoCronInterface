{% extends "Templates/index.volt" %}
{% block title %}{{ customTitle }}{% endblock %}
{% block content %}
    <!-- main config -->
    {{ partial("Jobs/partials/jobInformations", ['job': job]) }}

    <!-- sup config -->
    {{ partial("Jobs/partials/jobConfiguration", ['job': job]) }}

    <!-- Steps part -->
    <div class="col-xs-12">
        <h2>Steps</h2>
        <hr/>
        {% for step in job['steps'] %}
            {{ partial("Jobs/partials/editStep", ['step': step]) }}
        {% endfor  %}
        <button type="button" id="step-adder" class="btn btn-block btn-lg btn-success-o" data-jobUid="{{ job['uid'] }}">Add step</button>
    </div>
    {{ partial("Jobs/partials/editTemplates") }}
{% endblock %}