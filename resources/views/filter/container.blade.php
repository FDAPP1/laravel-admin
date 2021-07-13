<?php
  // $current_action_name = explode('.', Route::currentRouteName())[1];
  // $session_key_name = $current_action_name . "_search_condition";
  $andOr = array_key_exists('andor', $_REQUEST) ? $_REQUEST['andor'] : null;
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
                <div class="col-md-12 text-center">
                    <!-- AND/OR -->
                    <div class="col-md-5 text-right">
                    <label for="sel01" text-md-right">各項目間の検索方法：</label>
                    </div>
                    <div class="col-md-1 text-left">
                       <select class="form-select form-select-lg mb-3" id="andor" name="andor">
                         <option value="AND" @if ($andOr == "AND")selected @endif >AND</option>
                         <option value="OR" @if ($andOr == "OR")selected @endif>OR</option>
                       </select>
                    </div>
                    <div class="col-md-6 text-left">
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
