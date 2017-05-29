<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info" style="border: thin solid #dddddd">
            <div class="panel-heading">Permisos</div>
            <br/>
            <table class="table table-responsive table-condensed">
                <tr>
                    @for($i = 0; $i < $permissions->count(); $i++)
                        <td style="border: none; text-align: left">

                            <input type="checkbox" name="permissions[]" id="{{ $permissions[$i]->id }}"
                                   @if($permissions[$i]->has) checked @endif value="{{ $permissions[$i]->permission }}"/>

                            <label for="{{ $permissions[$i]->id }}">
                                {{ $permissions[$i]->description }}
                            </label>

                        </td>
                        @if(($i+1) % 5 == 0)
                </tr>
                <tr>
                    @endif
                    @endfor
                </tr>
            </table>
            <br/>
        </div>
    </div>
</div>
