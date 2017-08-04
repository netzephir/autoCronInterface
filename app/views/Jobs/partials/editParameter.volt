<tr data-stepUid="{{ stepUid }}">
    <td align="center" valign="middle"><input type="text" class="form-control" name="paramKey" placeholder="Key" value="{{ parameter['paramKey'] }}" readonly></td>
    <td align="center" valign="middle"><input type="text" class="form-control" name="paramValue" placeholder="Value" value="{{ parameter['value'] }}" readonly></td>
    <td valign="middle">
        <div class="switch">
            <input id="param-enabled-{{ parameter['uid'] }}" class="cmn-toggle cmn-toggle-round-flat cm-toggle-2x js-param-enabler" data-paramUid="{{ parameter['uid'] }}" type="checkbox" {% if parameter['enabled'] == 1 %}checked{% endif  %}>
            <label for="param-enabled-{{ parameter['uid'] }}" data-on="On" data-off="Off"></label>
        </div>
    </td>
    <td align="center" valign="middle">
        <a id="paramRemover-{{ parameter['uid'] }}" class="js-param-remover" href="#" data-uid="{{ parameter['uid'] }}"><i class="fa fa-close fa-2x text-danger" style="line-height: 40px;"></i></a>
        <a id="paramRemover-{{ parameter['uid'] }}" class="js-param-saver hidden" href="#" data-uid="{{ parameter['uid'] }}"><i class="fa fa-save fa-2x text-warning:" style="line-height: 40px;"></i></a>
    </td>
</tr>