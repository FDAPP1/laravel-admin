<?php
  $current_action_name = explode('.', Route::currentRouteName())[1];
  $session_key_name = $current_action_name . "_search_condition";
?>
<div class="box-header with-border {{ $expand?'':'hide' }} filter-box" id="{{ $filterID }}">
    <form action="{!! $action !!}" class="form-horizontal" pjax-container method="get">

        <div class="row">
            @foreach($layout->columns() as $column)
            <div class="col-md-{{ $column->width() }}">
                <div class="box-body">
                    <div class="fields-group">
                        @foreach($column->filters() as $filter)
                            {!! $filter->render() !!}
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <div class="row">
                <div class="col-md-10">
                  <div class="col-md-2"></div>
                  <div class="col-md-4">
                    <!-- AND/OR -->
                    <label for="sel01" class="col-md-4 text-md-right">各項目を</label>
                    <div class="col-md-4">
                       <select class="form-control" id="andor" name="andor">
                         <option value="AND" @if (session($session_key_name) && session($session_key_name) == "AND")selected @endif >AND</option>
                         <option value="OR" @if (session($session_key_name) && session($session_key_name) == "OR")selected @endif>OR</option>
                       </select>
                    </div>
                    <label for="sel01" class="col-md-4 text-md-right">で</label>
                  </div>
                    <div class="col-md-4">
                        <div class="btn-group pull-left">
                            <button class="btn btn-info submit btn-sm"><i
                                        class="fa fa-search"></i>&nbsp;&nbsp;{{ trans('admin.search') }}</button>
                        </div>
                        <div class="btn-group pull-left " style="margin-left: 10px;">
                            <a href="{!! $action !!}" class="btn btn-default btn-sm"><i
                                        class="fa fa-undo"></i>&nbsp;&nbsp;{{ trans('admin.reset') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
