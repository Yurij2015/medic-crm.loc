<div class="form-group">
    <div class="input-group date" id="datetimepicker2">
        <input type="text" class="form-control" />
        <span class="input-group-addon">
      <span class="glyphicon glyphicon-calendar"></span>
    </span>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        //Установим для виджета русскую локаль с помощью параметра language и значения ru
        $('#datetimepicker2').datetimepicker(
            {language: 'ru'}
        );
    });
</script>