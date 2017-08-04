<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{% block title %}{% endblock %}</title>
        <link rel="stylesheet" href="{{ static_url("css/lib/bootstrap.min.css") }}" />
        <link rel="stylesheet" href="{{ static_url("css/lib/font-awesome.min.css") }}" />
        <link rel="stylesheet" href="{{ static_url("css/main.css") }}" />
        {{ assets.outputCss() }}
        <script src="{{ static_url("js/lib/jquery-3.2.1.min.js") }}"></script>
        <script src="{{ static_url("js/lib/bootstrap.min.js") }}"></script>
        <script src="{{ static_url("js/main.js") }}"></script>
    </head>
    <body>
        <div class="row">
                <nav class="navbar navbar-default navbar-fixed-top navbar-custom-centered col-xs-6 col-xs-offset-3">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        </button>
                        {{ link_to("" , 'Dev',"class": "navbar-brand") }}
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active">{{ link_to("" , 'list <span class="sr-only">(current)</span>') }}</li>
                            <li>{{ link_to("Monitoring" , 'Monitoring') }}</li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
        </div>
        <div id="main" class="container-fluid" style="padding-top: 100px;min-height: 800px;">
            {% block content %}{% endblock %}
        </div>
        <hr/>
        <div id="footer" class="footer">

        </div>
        {{ assets.outputJs() }}
    </body>
<html>