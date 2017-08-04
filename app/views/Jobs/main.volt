{% extends "Templates/index.volt" %}
{% block title %}{{ customTitle }}{% endblock %}
{% block content %}
    <div class="hidden alert alert-danger">

    </div>
    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-10" style="margin-bottom: 20px;">
        <select id="actionSelector" class="form-control" name="actionSelector" >
            <option> Action </option>
            <option value="delete">delete</option>
            <option value="disable">disable</option>
            <option value="enable">enable</option>
        </select>
    </div>
    <div class="col-lg-10 col-md-8 col-sm-6 col-xs-2 text-right" style="margin-bottom: 20px;">
        <button class="btn btn-primary js-job-adder">New</button>
    </div>
    <table class="table table-primary table-striped table-hover table-bordered">
        <tr>
            <th class="bg-primary text-center"><input id="globalSelector" type="checkbox"></th>
            <th class="bg-primary" style="width: 60px;">Status</th>
            <th class="bg-primary">#</th>
            <th class="bg-primary">name</th>
            <th class="bg-primary">Creation date</th>
            <th class="bg-primary">lastExecution</th>
            <th class="bg-primary">lastStatus</th>
            <th class="bg-primary">benchMark enabled</th>
            <th class="bg-primary">Max PE</th>
            <th class="bg-primary"></th>
        </tr>

        {% for job in jobs %}
        <tr>
            <td class="text-center"><input class="js-jobSelector" type="checkbox"></td>
            <td class="text-center">{{ link_to(["Jobs/toogleLock/", job['uid']]|join('') ,'<i class="fa fa-unlock fa-2x"></i>', "title" : "lock") }}</td>
            <td>{{ job['uid'] }}</td>
            <td>{{ job['jobName'] }}</td>
            <td>{{ job['createDate'] }}</td>
            <td>{{ job['lastExecution']['startDate'] }}</td>
            <td>{{ job['lastExecution']['status'] }}</td>
            <td>{{ job['benchmark'] }}</td>
            <td>{{ job['maxParallelExecution'] }}</td>
            <td class="text-center " >
                {{ link_to(["Jobs/edit/", job['uid']]|join('') ,'<i class="fa fa-pencil fa-2x"></i>', "title" : "edit") }}
                {{ link_to(["Jobs/delete/", job['uid']]|join('') ,'<i class="fa fa-close fa-2x text-danger"></i>', "title" : "delete") }}
            </td>
        </tr>
        {% endfor %}

    </table>
    <div class="col-xs-12 text-right">
        <button class="btn btn-primary js-job-adder">New</button>
    </div>
    {{ partial("Jobs/partials/listTemplates") }}
{% endblock %}