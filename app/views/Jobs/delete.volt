{% extends "Templates/index.volt" %}
{% block title %}{{ customTitle }}{% endblock %}
{% block content %}
    {% if success %}
        <div class="alert alert-success" role="alert">Job created successfully <a href="/" class="alert-link">Return to the job list</a></div>
    {% else %}
        <div class="alert alert-danger" role="alert">Job creation failed (" {{ error }} ") <a href="/" class="alert-link">Return to the job list</a></div>
    {% endif %}
{% endblock %}